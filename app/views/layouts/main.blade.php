<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prepaid Electricity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{{ asset('Favicon.ico') }}">

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

<!--parralax navigation-->

<!-- navigation panel -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Prepaid Electricity</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-main">
      <ul class="nav navbar-nav navbar-right">
         @if(!Auth::check())
          <li>{{ HTML::link('/status', 'Electric Status') }}</li>
          <li>{{ HTML::link('/login', 'Login') }}</li> 
          @else
          <li>{{ HTML::link('/payment', 'Credit Payment') }}</li> 
          <li>{{ HTML::link('/report', 'Report Summary') }}</li> 
          <li>{{ HTML::link('/status', 'Electric Status') }}</li> 
          <li>{{ HTML::link('/logout', 'Logout') }}</li> 
          @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

        @yield('content')


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/preview.js') }}
    {{ HTML::script('assets/js/parallax.js') }}
  </body>
</html>