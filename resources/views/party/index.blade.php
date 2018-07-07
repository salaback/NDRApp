@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">District</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parties as $party)
        <tr>
            <th>{{$party->name}}</th>
            <th>{{$party->district}}</th>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
