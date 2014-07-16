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
                <li>{{{ link_to_route('logout', 'Logout')}}}</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{ $currentUser->username }}}<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li><img class="gravatar pull-left" src="http://www.gravatar.com/avatar/8a1346829a164648a4507019f3dc3875.png?s=50"></li>
            @else
                <li>{{{ link_to_route('login.create', 'Login') }}}</li>
                <li>{{{ link_to_route('register.create', 'Register') }}}</li>
            </ul>
            @endif
        </div>
    </div>
</nav>
