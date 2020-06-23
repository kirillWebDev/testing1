<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_monitoring', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('article_id')->index();
			$table->string('source_link', 512)->nullbale();
			$table->timestamps();
			
			$table->foreign('article_id')
                ->references('id')
                ->on('articles')
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
        Schema::dropIfExists('articles_monitoring');
    }
}
