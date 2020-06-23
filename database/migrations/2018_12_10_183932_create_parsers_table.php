<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->string('parse_url');
            $table->boolean('status')->default(false)->index();
            $table->unsignedInteger('user_id')->nullable(true)->index();
            $table->unsignedInteger('category_id')->nullable(true)->index();
            //datetimes
            $table->timestamps();
            $table->timestamp('start_at')->nullable()->index();
            $table->timestamp('finish_at')->nullable()->index();

            //relations
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('parsers');
    }
}
