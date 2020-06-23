<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMetaTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('meta_tags', function (Blueprint $table) {
           $table->text('metatable_type')->change();
           $table->text('seo_title')->nullable()->change();
           $table->text('seo_keywords')->nullable()->change();
           $table->text('seo_description', 512)->nullable()->change();
           $table->text('seo_img_alt')->nullable()->change();
           $table->text('seo_img_title')->nullable()->change();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
