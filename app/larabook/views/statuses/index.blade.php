@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-3">fooey</div>
    <div class="col-md-6">
        @include('statuses.partials.publish-status-form')

        @include('statuses.partials.statuses')
    </div>
    <div class="col-md-3">fooey</div>
</div>
@stop

