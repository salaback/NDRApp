@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$party->name}}</h1>
        <h2>{{$party->district->name }}</h2>

        <div class="col-4">
            <div class="panel">
                <div class="panel-heading">
                    Current Memebers
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        {{dd($party->ever_memebers)}}
                        @foreach($party->current_members as $member)
                            <div class="list-group-item">
                                {{$member->name}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
