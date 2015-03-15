@extends('layouts.main')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif

    @yield('content')
</div>


<div id="login" class="login">
  <div class="text-vcenter">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
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
      </div>
    </div>
  </div>
</div>





@stop