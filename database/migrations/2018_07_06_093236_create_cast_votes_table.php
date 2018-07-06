<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCastVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cast_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_id');
            $table->integer('person_id')->unsigned();
            $table->string('vote');  // yes, no, abstain, none
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
        Schema::dropIfExists('cast_votes');
    }
}
