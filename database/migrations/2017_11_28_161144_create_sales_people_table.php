<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 64);
            $table->string('middle_name', 32);
            $table->string('last_name', 32);
            $table->string('email')->unique();
            $table->string('password', 32);
            $table->integer('quota_id');
            $table->string('token', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_people');
    }
}
