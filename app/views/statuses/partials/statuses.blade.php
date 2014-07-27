@if($statuses->count())
    @foreach($statuses as $status)
        @include('statuses.partials.status')
    @endforeach
@else
    <p>This user is a 'Follow Whore'. They set up an account and follow to get follows but never post any statuses.</p>
@endif
