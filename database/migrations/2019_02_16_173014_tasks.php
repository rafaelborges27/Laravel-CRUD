<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->enum('priority', ['HIGH', 'MEDIUM', 'LOW']);
            $table->text('description');
            $table->enum('done', ['YES', 'NO']);
            $table->date('end_forecast_date');
            $table->datetime('created_at');
            $table->datetime('updated_at')->nullable();
            $table->datetime('deleted_at')->nullable();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
