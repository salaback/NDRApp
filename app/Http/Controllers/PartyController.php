<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index()
    {
        $parties = Party::all();

        return view('party.index', compact('parties'));
    }

    public function show(Party $party)
    {
        return view('party.show', compact('party'));
    }

}
