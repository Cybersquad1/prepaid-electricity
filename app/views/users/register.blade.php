@extends('layouts.main')

@section('content')

<form method="post" action="{{URL::action('UsersController@postCreate')}}">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
    <h2 class="form-signup-heading">Please Register</h2>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
  </div>
  <button type="submit" class="btn btn-default">Register</button>

</form>
@stop


