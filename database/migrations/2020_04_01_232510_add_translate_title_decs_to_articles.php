<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslateTitleDecsToArticles extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {

            $table->string('title_uk', 512)->nullable();
            $table->string('description_uk', 512)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['title_uk']);
            $table->dropColumn(['description_uk']);
        });
    }
}
