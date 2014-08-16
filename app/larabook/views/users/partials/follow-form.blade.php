@if($signedIn)
    @if($user->isFollowedBy($currentUser))
        {{{ Form::open(['route' => 'follows.destroy', 'method' => 'DELETE']) }}}
            {{{ Form::hidden('userIdToUnFollow', $user->id) }}}
            <button type="submit" class="btn">Stop Following</button>
        {{{ Form::close() }}}
    @else
        {{{ Form::open(['route' => 'follows.store']) }}}
            {{{ Form::hidden('userIdToFollow', $user->id) }}}
            <button type="submit" class="btn btn-primary">Follow</button>
        {{{ Form::close() }}}
    @endif
@endif
