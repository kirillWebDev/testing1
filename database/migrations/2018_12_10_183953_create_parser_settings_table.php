<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parser_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parser_id')->nullable(false);

            $table->string('rule_article_links');
            $table->string('rule_keywords')->nullable();
            $table->string('rule_description')->nullable();
            $table->string('rule_image')->nullable();
            $table->string('rule_comment')->nullable();
            $table->string('rule_comment_username')->nullable();
            $table->string('rule_comment_content')->nullable();
            $table->string('rule_content_delete')->nullable();
            $table->string('rule_title');
            $table->string('rule_content');

            $table->boolean('white_list')->default(false);
            $table->boolean('black_list')->default(false);
            $table->integer('rescan_seconds')->nullable();
            $table->boolean('is_publish')->default(false);
            $table->boolean('is_translate')->default(false);
            $table->boolean('is_has_image')->default(false);
            $table->boolean('is_delete_links')->default(false);
            $table->integer('min_chars')->nullable();

            //relation
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
        Schema::dropIfExists('parser_settings');
    }
}
