<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdateColumnsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('last_commit')->after('location')->nullable();
            $table->dateTime('last_update_check')->after('last_commit')->nullable();
            $table->dateTime('last_update_code')->after('last_update_check')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('last_commit');
            $table->dropColumn('last_update_check');
            $table->dropColumn('last_update_code');
        });
    }
}
