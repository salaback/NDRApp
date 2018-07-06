<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table){
            $table->removeColumn('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->json('location')->nullable();
            $table->json('picture')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table){
           $columns = [
               'name',
               'first_name',
               'last_name',
               'gender',
               'birthdate',
               'education',
               'profession',
               'email',
               'twitter',
               'location',
               'picture'
           ];

           foreach($columns as $column) $table->removecolumn($column);
        });
    }
}
