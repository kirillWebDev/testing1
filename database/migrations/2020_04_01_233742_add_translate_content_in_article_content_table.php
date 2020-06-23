<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslateContentInArticleContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_contents', function (Blueprint $table) {

            $table->longText('content_uk')->nullable();
            $table->longText('html_content_uk')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_contents', function (Blueprint $table) {
            $table->dropColumn(['content_uk']);
            $table->dropColumn(['html_content_uk']);
        });
    }
}
