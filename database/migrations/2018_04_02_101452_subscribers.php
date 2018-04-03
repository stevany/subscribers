<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subscribers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_address');
            $table->string('name');
            $table->enum('state',['active','unsubscribed','junk', 'bounced', 'unconfirmed']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
