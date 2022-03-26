<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('comments',function(Blueprint $table){

            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->longText('content');
            $table->unsignedInteger('replies_id')->nullable();
            $table->boolean('is_reply');
            $table->timestamps();
            $table->foreign('post_id')
                  ->references("id")
                  ->on('posts')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references("id")
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
