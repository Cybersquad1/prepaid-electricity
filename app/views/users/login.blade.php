@extends('layouts.main')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif

    @yield('content')
</div>

<!--<form class="form-horizontal" method="post" action="{{URL::action('UsersController@postSignin')}}">
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
  <div class="form-group">
    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="username" class="form-control" id="inputUsername" placeholder="Username" name="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>-->


<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h1 class="text-center login-title">Sign in to continue to Prepaid Electricity</h1>
        <div class="account-wall">
            <img class="profile-img" src="/img/logo2.png"
                alt="">
            <form class="form-signin" method="post" action="{{URL::action('UsersController@postSignin')}}">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign in</button>
            <label class="checkbox pull-left">
                <input type="checkbox" value="remember-me">
                Remember me
            </label>
            <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
            </form>
        </div>
        <a href="#" class="text-center new-account">Create an account </a>
    </div>
</div>


@stop