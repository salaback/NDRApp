<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $district = \App\District::create([
            'name' => 'Hamburg',
            'state' => true
        ]);

        $party = \App\Party::create([
            'name' => 'SDP',
            'district_id' => $district->id
        ]);

        $person = factory(\App\Person::class)->create();

        //  Create party affiliation
        \App\PartyAffiliation::create([
            'party_id' => $party->id,
            'person_id' => $person->id,
            'start' => \Carbon\Carbon::yesterday()
        ]);

        $promises = factory(\App\Promise::class)->create();
    }
}
