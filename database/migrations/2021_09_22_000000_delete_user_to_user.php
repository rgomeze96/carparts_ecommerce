<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class deleteUserToUser extends Migration
{
    public function up()
    {
Schema::table('users', function (Blueprint $table) {
    $table->dropColumn('user');
});
    }
}