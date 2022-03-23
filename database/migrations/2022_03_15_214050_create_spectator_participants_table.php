<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpectatorParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spectator_participants', function (Blueprint $table) {
            $table->id();
            $table->integer('participants_teamId');
            $table->integer('participants_spell1Id');
            $table->integer('participants_spell2Id');
            $table->integer('participants_championId');
            $table->integer('participants_profileIconId');
            $table->string('participants_summonerName', 35);
            $table->boolean('participants_bot');
            $table->string('participants_summonerId', 100);
            $table->integer('participants_perks_perkStyle');
            $table->integer('participants_perks_perkSubStyle');

            //$table->foreignId('match_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spectator_participants');
    }
}
