<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTypeMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('meta_tags', function (Blueprint $table) {
            $table->string('metatable_type', 255)->nullable()->change();
            $table->string('seo_title', 255)->nullable()->change();
            $table->string('seo_keywords', 255)->nullable()->change();
            $table->string('seo_description', 512)->nullable()->change();
            $table->string('seo_img_alt', 255)->nullable()->change();
            $table->string('seo_img_title', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('meta_tags', function (Blueprint $table) {
            $table->string('metatable_type')->on('meta_tags')->change();
            $table->string('seo_title')->on('meta_tags')->change();
            $table->string('seo_keywords')->on('meta_tags')->change();
            $table->string('seo_description')->on('meta_tags')->change();
            $table->string('seo_img_alt')->on('meta_tags')->change();
            $table->string('seo_img_title')->on('meta_tags')->change();
        });
    }
}
