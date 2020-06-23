<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parser_id')->nullable(false)->index();
            $table->enum('type', ['info','error','warning', 'success'])->default('info');
            $table->string('text', 256);
            $table->timestamps();

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
        Schema::dropIfExists('parser_logs');
    }
}
