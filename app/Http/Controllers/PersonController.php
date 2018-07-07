<?php

namespace App\Http\Controllers;

use App\Person;
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
        return view('person.show', compact('person'));
    }
}
