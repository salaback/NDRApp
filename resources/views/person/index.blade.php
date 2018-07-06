@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Party</th>
                <th scope="col">District</th>
            </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                    <tr>
                        <th>{{$person->first_name}}</th>
                        <td>{{$person->last_name}}</td>
                        <td>@if(isset($person->current_party)) {{$person->current_party->party->name}} @else Unaffiliated @endif</td>
                        <td>{{$person->district->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
