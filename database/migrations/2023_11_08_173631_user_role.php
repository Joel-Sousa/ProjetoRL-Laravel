<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            // $table->foreignId('roles_id')->nullable()->after('id')->references('id')->on('roles');
            $table->foreignId('roles_id')->nullable()->after('id')->references('id')->on('roles');
            // $table->integer('roles_id')->after('id')->nullable();
            // $table->foreign('roles_id')->references('id')->on('roles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign(['roles_id']);
            $table->dropColumn('roles_id');
        });
    }
}
