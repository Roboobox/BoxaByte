<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_commands', function (Blueprint $table) {
            $table->id();
            $table->string('command', 50);
            $table->string('arguments', 50);
            $table->string('author', 50);
            $table->string('channel', 50);
            $table->dateTime('time_sent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_commands');
    }
}
