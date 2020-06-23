<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagUkToTags extends Migration
{
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {

            $table->string('name_uk', 512)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn(['name_uk']);
        });
    }
}
