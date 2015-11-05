<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
             <li {{ Request::is('/') ? 'class=active' : null }}><a href=" 
        @if(Auth::check())
        /home
        @else
        /
        @endif
        " class='navbar-brand'>Migraine Tracker</a></li>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li {{ Request::is('/') ? 'class=active' : null }}><a href="
        @if(Auth::check())
        /home
        @else
        /
        @endif
        ">Home</a></li>
        <li>{!! link_to_action('PagesController@about', 'About') !!}</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())
          <?php $user = Auth::user() ?>
          <span class="navbar-text navbar-right">
          Signed in as {!! link_to_action('UserController@show', $user->name, $user->id ) !!}
          |
          {!! link_to_action('Auth\AuthController@getLogout', 'Sign Out') !!}</span>
        @else
          <li {{ Request::is('login') ? 'class=active' : null }}>{!! link_to_action('Auth\AuthController@getLogin', 'Sign In') !!}</li>
        @endif


        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quicklinks<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>WiP</li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
