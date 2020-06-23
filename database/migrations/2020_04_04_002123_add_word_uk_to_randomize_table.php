<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWordUkToRandomizeTable extends Migration
{
    public function up()
    {
        Schema::table('randomize_words', function (Blueprint $table) {
            $table->string('word_uk', 512)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('randomize_words', function (Blueprint $table) {
            $table->dropColumn(['word_uk']);
        });
    }
}
