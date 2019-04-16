<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->string('image');
            $table->integer('user_id');
          

            $table->integer('category_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->timestamp('published_at')->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
