<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nationality');
            $table->smallInteger('height');
            $table->smallInteger('weight');
            $table->timestamp('date_of_birth');
            $table->string('position');

            // Athletic
            $table->tinyInteger('jump');
            $table->tinyInteger('speed');
            $table->tinyInteger('quickness');
            $table->tinyInteger('strength');
            $table->tinyInteger('stamina');
            $table->tinyInteger('hustle');
            $table->tinyInteger('durability');
            $table->tinyInteger('screening');
            $table->tinyInteger('catching');
            // Rebounding
            $table->tinyInteger('off_reb');
            $table->tinyInteger('def_reb');
            $table->tinyInteger('boxout');
            // Defense
            $table->tinyInteger('help_defense');
            $table->tinyInteger('shot_contest');
            $table->tinyInteger('stealing');
            $table->tinyInteger('blocking');
            $table->tinyInteger('fouling');
            // Offense
            $table->tinyInteger('finishing');
            $table->tinyInteger('mid_range_shot');
            $table->tinyInteger('three_point_shot');
            $table->tinyInteger('free_throws');
            $table->tinyInteger('ball_handling');
            $table->tinyInteger('passing');
            $table->tinyInteger('off_ball_movement');

            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id')->references('id')->on('teams');

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
        Schema::dropIfExists('players');
    }
}
