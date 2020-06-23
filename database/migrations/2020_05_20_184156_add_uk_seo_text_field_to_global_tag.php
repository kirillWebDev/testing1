<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUkSeoTextFieldToGlobalTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_tags', function (Blueprint $table) {
           $table->text('seo_text_uk')->nullable();
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
           $table->dropColumn(['seo_text_uk']);
       });
    }
}
