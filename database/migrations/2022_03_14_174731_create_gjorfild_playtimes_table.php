<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGjorfildPlaytimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gjorfild_playtime', function (Blueprint $table) {
            $table->id();
            $table->string('member', 100);
            $table->integer('playtime_duration')->unsigned();
            $table->boolean('is_online');
            $table->dateTime('last_online');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gjorfild_playtime');
    }
}
