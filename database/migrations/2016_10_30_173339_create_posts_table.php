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
            //mandatory fields
            $table->increments('id');
            //foreign id of user
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title');
            $table->string('description');
            $table->string('titleImage');
            $table->string('type');// although search will mainly be done by filters we need another search by types like, sports gear, electronic, food, clothes, shoes etc
            $table->double('currentPrice', 15, 8);
            $table->integer('discount');
            $table->integer('duration');

            //optional fields
            $table->string('postUrl')->nullable();
            $table->string('filters')->nullable();// it is important that values of this field must be separated by comma so we can filter fast via angular later

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
