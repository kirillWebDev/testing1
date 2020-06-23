<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParserLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_links', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parser_id')->nullable(false)->index();
            $table->string('link');
            $table->boolean('status')->default(false);
            $table->timestamp('finish_at')->nullable();

            //relations
            $table->foreign('parser_id')
                ->references('id')
                ->on('parsers')
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
        Schema::dropIfExists('parser_links');
    }
}
