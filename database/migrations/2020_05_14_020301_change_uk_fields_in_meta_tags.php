<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUkFieldsInMetaTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meta_tags', function (Blueprint $table) {
           $table->text('seo_title_uk')->nullable()->change();
           $table->text('seo_keywords_uk')->nullable()->change();
           $table->text('seo_description_uk', 512)->nullable()->change();
           $table->text('seo_img_alt_uk')->nullable()->change();
           $table->text('seo_img_title_uk')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meta_tags', function (Blueprint $table) {
            $table->dropColumn(['seo_title_uk']);
            $table->dropColumn(['seo_keywords_uk']);
            $table->dropColumn(['seo_description_uk']);
            $table->dropColumn(['seo_img_alt_uk']);
            $table->dropColumn(['seo_img_title_uk']);
        });
    }
}
