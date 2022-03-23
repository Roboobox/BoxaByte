<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpectatorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spectator_data', function (Blueprint $table) {
            $table->id();
            $table->boolean('live_game_data');
            $table->string('gameId', 25);
            $table->string('mapId', 15);
            $table->string('gameMode', 100);
            $table->string('gameType', 100);
            $table->dateTime('gameStartTime');
            $table->string('gameLength', 50);
            $table->string('gameQueueConfigId', 15);
            $table->string('platformId', 10);
            $table->string('observers_encryptionKey', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spectator_data');
    }
}
