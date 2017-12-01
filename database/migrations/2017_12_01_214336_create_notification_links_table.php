<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationLinksTable extends Migration
{
    public function up()
    {
        Schema::create('notification_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('notification_id');
            $table->integer('sales_person_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notification_links');
    }
}
