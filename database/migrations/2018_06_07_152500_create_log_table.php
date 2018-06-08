<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('type',['info', 'warning', 'error']);
            $table->string('source');
            $table->string('system');
            $table->integer('system_id')->nullable();
            $table->string('event');
            $table->longText('message');
            $table->longText('debug_info')->nullable();
            $table->longText('user_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log');
    }
}
