@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$person->name}}</h1>
        <h2><a href="{{route('party.show', [$person->current_party->party_id])}}"><strong>{{$person->current_party->party->name}}</strong></a> - {{$person->district->name }}</h2>

        <div class="col-sm-6">
            @include('snipits.timeline')
        </div>
    </div>
@endsection
