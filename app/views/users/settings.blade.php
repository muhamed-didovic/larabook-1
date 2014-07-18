@extends('layouts.default')

@section('content')
    <h1>Hello {{ $currentUser->username }}</h1>
    <p>Here are your stupid settings ;-b</p>
    <ul>
        @foreach($settings as $setting)
            <li>{{ $setting }}</li>
        @endforeach
    </ul>
@stop
