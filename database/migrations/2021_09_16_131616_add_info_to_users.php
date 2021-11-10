<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users', function (Blueprint $table) {
                $table->string('role')->default('client');
                $table-> string('address')->nullable();
                $table-> integer('age')->nullable();
                $table-> string('city')->nullable();
                $table-> string('country')->nullable();
                $table-> string('telephone')->nullable();
                $table-> integer('balance')->default(1000);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'users', function (Blueprint $table) {
                $table->dropColumn(['role']);
                $table->dropColumn(['address']);
                $table->dropColumn(['age']);
                $table->dropColumn(['city']);
                $table->dropColumn(['country']);
                $table->dropColumn(['telephone']);
                $table->dropColumn(['balance']);
            }
        );
    }
}
