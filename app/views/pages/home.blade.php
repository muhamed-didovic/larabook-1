@extends('layouts.default')

@section('meta-title', 'Welcome Foo!')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to Larabook!</h1>
        <p>Welcome to Larabook foo!</p>
        {{{ link_to_route('register.create', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary']) }}}
@stop
