<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyAffiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party_affiliations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('party_id');
            $table->integer('person_id');
            $table->date('start');
            $table->date('end')->nullable();
            $table->string('end_type')->nullable();
            $table->json('sources')->nullable();
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
        Schema::dropIfExists('party_affiliations');
    }
}
