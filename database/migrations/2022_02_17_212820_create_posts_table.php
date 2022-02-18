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
            $table->string('title', 100);
            $table->string('description', 255);
            $table->text('content');

            # relationships one to many with users table
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            # relationships one to many with posts_type table
            $table->unsignedBigInteger('post_type_id')->nullable();
            $table->foreign('post_type_id')
            ->references('id')
                ->on('posts_type')
                ->onDelete('set null');

            # relationship with teams table (one to many)
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('set null');
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
