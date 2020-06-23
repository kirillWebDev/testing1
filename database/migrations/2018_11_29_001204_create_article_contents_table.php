<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id')->index();
            $table->string('slug',512)->unique();
            $table->string('source_link', 512)->nullbale();
            $table->string('video')->nullable();
            $table->string('image',512)->nullable();
            $table->longText('content')->nullable(false);
            $table->longText('html_content')->nullable(false);

            //relation
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
        Schema::dropIfExists('article_contents');
    }
}
