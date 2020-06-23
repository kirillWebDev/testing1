<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUkFieldsToGlobalTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_tags', function (Blueprint $table) {
           $table->text('seo_title_uk')->nullable();
           $table->text('seo_keywords_uk')->nullable();
           $table->text('seo_description_uk', 512)->nullable();
           $table->text('seo_img_alt_uk')->nullable();
           $table->text('seo_img_title_uk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('global_tags', function (Blueprint $table) {
           $table->dropColumn(['seo_title_uk']);
           $table->dropColumn(['seo_keywords_uk']);
           $table->dropColumn(['seo_description_uk']);
           $table->dropColumn(['seo_img_alt_uk']);
           $table->dropColumn(['seo_img_title_uk']);
       });
    }
}
