<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = new Faker();
        $issues = [
            'Economy', 'Immigration', 'Military', 'Welfare', 'Environment', 'Small Business', 'Health Care'
        ];

        foreach($issues as $key => $issue)
        {
            \App\Issue::create(['name' => $issue, 'description' => 'hvhj hblhv hj ghvckgv jh k']);
        }

        $people = \App\Person::all();

        $votes = factory(\App\Vote::class, 50)->create(['district_id' => 1]);


        $authors = ['NDR', 'Spiegel', 'New York Times'];

        foreach($authors as $author)
        {
            factory(\App\SourceAuthor::class, 500)->create(['name' => $author, 'type' => 'Newspaper']);
        }

        $sourceAuthors = \App\SourceAuthor::all();

        foreach($sourceAuthors as $sourceAuthor)
        {
            \Illuminate\Support\Facades\DB::table('sources')->insert([
                'source_author_id' => $sourceAuthor->id,
                'url' => "http://www.google.com",
                'type' => 'article',
                'raw_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

        $sourceCount = \App\Source::all()->count();

        $vote_types = [
            'yes', 'no',
            'yes', 'no',
            'yes', 'no',
            'absent',
            'none'
        ];

        $votes_cast = [];
        $entity_promises = [];
        $entity_statements = [];



        foreach($people as $person)

        {
            foreach($votes as $vote)
            {



                $votes_cast[] = [
                    'vote_id' => $vote->id,
                    'person_id' => $person->id,
                    'vote' => $vote_types[random_int(0,7)],
                    'created_at' => $vote->created_at,
                    'updated_at' => $vote->created_at,
                ];


                $promise = factory(\App\Promise::class)->create();

                $entity_promises[] = [
                    'entity_id' => $person->id,
                    'promise_id' => $promise->id
                ];

                $statement = factory(\App\Statement::class)->create(['source_id' => random_int(0, $sourceCount)]);


                $entity_statements[] = [
                'statement_id' => $statement->id,
                'entity_id' => $person->id]
                ;
            }



        }

        \Illuminate\Support\Facades\DB::table('entity_statement')->insert($entity_statements);

        \Illuminate\Support\Facades\DB::table('entity_promise')->insert($entity_promises);

        \Illuminate\Support\Facades\DB::table('cast_votes')->insert($votes_cast);

        $castVotes = \App\CastVote::all();

        $voteTotals = [];

        foreach($castVotes as $item)
        {
            if(isset($voteTotals[$item->vote_id][$item->vote]))
            {
                $voteTotals[$item->vote_id][$item->vote] = $voteTotals[$item->vote_id][$item->vote] + 1;
            }
            else{
                $voteTotals[$item->vote_id][$item->vote] = 0;
            }
        }

        foreach(\App\Vote::all() as $vote)
        {
            $vote->results = $voteTotals[$vote->id];
            $vote->save();
        }

    }
}
