<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->unsignedInteger('category_id')->index()->nullable();
            $table->string('title', 512)->nullable(false);
            $table->string('description', 512)->nullable();
            $table->string('path', 512)->unique();
            $table->tinyInteger('status')->default(0);
            $table->integer('view_count')->unsigned()->default(0);
            $table->string('cover_img')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable()->index();
            $table->softDeletes();

            //relation
            $table->foreign('user_id')
                ->references('id')
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
        Schema::dropIfExists('articles');
    }
}
