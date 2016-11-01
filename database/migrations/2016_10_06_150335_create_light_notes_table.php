<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLightnotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('light_notes', function (Blueprint $table) {

            $table->increments('id');
            $table->tinyInteger('uid');
            $table->enum('level', ['Red', 'Yellow','Green']);
            $table->date('hap_time');
            $table->string('title');
            $table->string('content');
            $table->dateTime('created_at');
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('light_notes');
    }
}
