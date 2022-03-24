<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotepadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notepads', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 20)->unique();
            $table->boolean('is_default')->default(false);
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('bg_color', 10)->default('#ffffff');
            $table->string('txt_color', 10)->default('#000000');
            $table->dateTime('shared_until')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notepads');
    }
}
