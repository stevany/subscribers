<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubscribersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('subscribers_fields', function(Blueprint $table){
            $table->increments('id');
            $table->integer('subscriber_id')->unsigned()->nullable();
            $table->integer('field_id')->unsigned();
            $table->foreign('subscriber_id') 
                ->references('id')->on('subscribers');
               
            $table->foreign('field_id') 
                ->references('id')->on('fields');
                
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
