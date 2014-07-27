 @include('layouts.partials.form_errors')

<div class="status-post">
    {{{ Form::open(['route' => 'status.store']) }}}
        <div class="form-group">
            {{{ Form::label('Status', 'Status:', ['class' => 'sr-only sr-only-focusable']) }}}
            {{{ Form::textarea('body', null, ['rows' => 3, 'class' => 'form-control', 'placeholder' => 'What up fool!?']) }}}
        </div>

        <div class="form-group status-post-submit">
            {{{ Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}}
        </div>
    {{{ Form::close() }}}
</div>
