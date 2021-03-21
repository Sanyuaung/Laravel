<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            // foreinID
            // first way
            // $table->foreignId('user_id');
            // $table->foreign('user_id')->references('id')->on("users");

            // second way
            $table->foreignId("user_id")->constrained()->onDelete('cascade'); // user table->id
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->timestamps();
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
