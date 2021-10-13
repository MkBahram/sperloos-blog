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
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('thumbnail');
            $table->unsignedInteger('user_id')->index('user_id');
            $table->foreign('user_id')->refrences('id')->on('users')->onDelete('casacade');
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
        $table->dropForeign('posts_user_id_foreign');
        $table->dropIndex('posts_user_id_index');
        $table->dropColumn('user_id');
        Schema::dropIfExists('posts');
    }
}
