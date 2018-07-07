<?php

namespace App\Http\Controllers;

use App\Entity;
use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();

        return view('person.index', compact('people'));
    }

    public function show(Person $person)
    {
        $timeline = $this->timeline($person);

        return view('person.show', compact('person', 'timeline'));
    }

    private function timeline($person)
    {
        $timeline = [];
        // add votes
        $timeline = $this->addVotes($timeline, $person->votes);
        // add promises
        $timeline = $this->addPromises($timeline, $person->id);

        // add statements


        $timeline = $this->sortTimeline($timeline);

        return $timeline;
    }

    private function addVotes($timeline, $votes)
    {
        $return = [];

        foreach($votes as $vote)
        {
            if($vote->vote == 'yes' or $vote->vote == 'no')
            {
                $return[$vote->created_at->year][$vote->created_at->month][$vote->created_at->day][] = [
                    'type' => 'vote',
                    'vote' => $vote->vote, // yes, no
                    'poll' => $vote->poll->name, // poll title
                    'poll_id' => $vote->poll->id
                ];
            }

        }

        return $return;
    }

    private function addPromises($timeline, $id)
    {
        $promises = Entity::where('entitiable_id', $id)->first()->promises;

        foreach($promises as $promise)
        {
            $timeline[$promise->created_at->year][$promise->created_at->month][$promise->created_at->day][] = [
                'type' => 'promise',
                'promise_made' => $promise->promise_made
            ];

        }

        return $timeline;


    }

    private function sortTimeline($timeline)
    {

        $months = [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December"];

        foreach($timeline as $yearKey => $year)
        {
            krsort($year);

            foreach($year as $monthKey => $month)
            {
                krsort($month);

                foreach($month as $day)
                {
                    krsort($day);

                    foreach($day as $dayKey => $item)

                        $newTimeline[$yearKey][$months[$monthKey]][$dayKey][] = $item;
                }
            }

        }

        krsort($newTimeline);

        return $newTimeline;
    }
}
