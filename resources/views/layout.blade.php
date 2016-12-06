<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Project Flyer</title>
	<link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/libs.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

</head>
<body>
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Flyers</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li {{{ (Request::is('home') ? 'class=active' : '') }}}><a href="/home">Home</a></li>
            <li {{{ (Request::is('about') ? 'class=active' : '') }}}><a href="/about">About</a></li>
            <li {{{ (Request::is('contact') ? 'class=active' : '') }}}><a href="/contact">Contact</a></li>
          </ul>
            {{-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> --}}
            <!-- Authentication Links -->
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li {{{ (Request::is('login') ? 'class=active' : '') }}}><a href="{{ url('/login') }}">Login</a></li>
                <li {{{ (Request::is('register') ? 'class=active' : '') }}}><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="container">
		@yield('content')
	</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="/js/libs.js"></script>

<script type="text/javascript">
  $('.dropdown-toggle').dropdown();
</script>

@yield('scripts.footer')

@include('flash')

</body>
</html>