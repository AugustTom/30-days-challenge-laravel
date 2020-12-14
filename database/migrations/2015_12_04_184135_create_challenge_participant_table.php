<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_participants', function (Blueprint $table) {
            $table->primary(['challenge_id','participant_id']);
            $table->timestamps();

//            $table->BigInteger('challenge_id') ->unsigned()->index();
//            $table->BigInteger('participant_id')->unsigned()->index();

            $table->foreignId('challenge_id')->references('id')->on('challenges')
                ->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('participant_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenge_user');
    }
}
