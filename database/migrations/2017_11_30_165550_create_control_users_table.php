<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlUsersTable extends Migration
{
    public function up()
    {
        Schema::create('control_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password', 32);
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('token', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('control_users');
    }
}
