<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    {{ HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
          @if(!Auth::check())
	        <li>{{ HTML::link('/register', 'Register') }}</li>   
	        <li>{{ HTML::link('/login', 'Login') }}</li> 
          @else
          <li>{{ HTML::link('/logout', 'Logout') }}</li> 
          @endif
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>



    <div class="container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif

        @yield('content')
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
  </body>
</html>