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
            $table->integer('client_id');
            $table->string('name');
            $table->integer('interval')->default(1000); //msec
            $table->integer('running')->default(0);
            $table->boolean('keep');
            $table->mediumText('data')->nullable();
            $table->boolean('error')->default(0);
            $table->integer('error_log_id')->nullable();
            $table->timestamps();
            $table->index(['running', 'keep', 'name', 'error']);
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
