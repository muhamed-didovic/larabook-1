<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{{ link_to_route('home', 'Larabook', null, ['class' => 'navbar-brand']) }}}
        </div>

        <div class="collapse navbar-collapse" id="bs-example">


            <ul class="nav navbar-nav navbar-right">
            @if( $currentUser)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="top-nav-gravatar" src="{{ $currentUser->present()->gravatar(35) }}" alt="{{ $currentUser->username }}">
                        {{{ $currentUser->username }}}<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><i class="glyphicon glyphicon-cog"></i>{{{ link_to_route('user.settings', 'Settings', ['username' => $currentUser->username])}}}</li>
                        <li class="divider"></li>
                        <li><i class="glyphicon glyphicon-off"></i>{{{ link_to_route('logout', 'Logout')}}}</li>
                    </ul>
                </li>
            @else
                <li>{{{ link_to_route('login.create', 'Login') }}}</li>
                <li>{{{ link_to_route('register.create', 'Register') }}}</li>
            </ul>
            @endif
        </div>
    </div>
</nav>
