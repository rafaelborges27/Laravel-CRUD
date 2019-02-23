<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name', 45);
            $table->text('description');
            $table->enum('color', ['ORANGE', 'PURPLE', 'GREY', 'GREEN', 'BLUE', 'BLACK', 'NONE']);
            $table->datetime('created_at');
            $table->datetime('updated_at')->nullable();
            $table->datetime('deleted_at')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
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
        Schema::dropIfExists('categories');
    }
}
