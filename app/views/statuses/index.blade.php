@extends('layouts.default')

@section('content')
    <h1>Post a status</h1>

    @include('layouts.partials.form_errors')

    {{{ Form::open(['route' => 'status.store']) }}}
        <div class="form-group">
            {{{ Form::label('Status', 'Status:') }}}
            {{{ Form::textarea('body', null, ['class' => 'form-control']) }}}
        </div>

        <div class="form-group">
            {{{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}}
        </div>
    {{{ Form::close() }}}

    <h2>Statuses</h2>
    @foreach($statuses as $status)
        <article>
            {{ $status->body }}
        </article>
    @endforeach
@stop

