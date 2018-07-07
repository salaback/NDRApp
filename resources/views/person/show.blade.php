@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img src="https://placekitten.com/200/200" width="100%" alt="" style="margin:15px">
            </div>
            <div class="col-sm-6">
                <h1>{{$person->name}}</h1>
                <h2><a href="{{route('party.show', [$person->current_party->party_id])}}"><strong>{{$person->current_party->party->name}}</strong></a> - {{$person->district->name }}</h2>
            </div>
        </div>

        <div class="col-sm-6">
            <h2>Timeline</h2>
            @include('snipits.timeline')
        </div>
    </div>
@endsection
