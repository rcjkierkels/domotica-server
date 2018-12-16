<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
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
            $table->string('client_id')->unique();
            $table->string('name');
            $table->integer('interval')->default(1000); //msec
            $table->integer('running')->default(0);
            $table->boolean('keep');
            $table->mediumText('data')->nullable();
            $table->dateTime('last_error_at');
            $table->timestamps();
            $table->index('running', 'keep', 'name');
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
