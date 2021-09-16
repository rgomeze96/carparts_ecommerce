<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('client');
            $table-> string('user');
            $table-> string('address');
            $table-> integer('age');
            $table-> string('city');
            $table-> string('country');
            $table-> string('telephone');
            $table-> integer('balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role']);
            $table->dropColumn(['user']);
            $table->dropColumn(['address']);
            $table->dropColumn(['age']);
            $table->dropColumn(['city']);
            $table->dropColumn(['country']);
            $table->dropColumn(['telephone']);
            $table->dropColumn(['balance']);
        });
    }
}