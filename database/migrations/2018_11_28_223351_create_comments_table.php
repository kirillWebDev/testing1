<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->nullable(true);
            $table->unsignedInteger('commentable_id')->index();
            $table->text('content')->nullable(false);
            $table->text('html_content')->nullable(false);
            $table->string('commentable_type')->index();
            $table->string('username');
            $table->string('email');
            $table->string('ip_id', 128)->nullable()->index();
            $table->tinyInteger('status')->default(0)->index();
            $table->unsignedInteger('reply_id')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();

            //relation
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('comments');
    }
}
