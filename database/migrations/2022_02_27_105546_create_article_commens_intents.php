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
        Schema::create('article_comment_intents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('article_id')->nullable(false);
            $table->integer('content_size');

            $table->string('session_id')->nullable(false);
            $table->timestamps();

            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
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
        Schema::table('article_comments', function (Blueprint $table) {
            $table->dropForeign('article_id');
        });

        Schema::dropIfExists('article_comment_intents');
    }
};
