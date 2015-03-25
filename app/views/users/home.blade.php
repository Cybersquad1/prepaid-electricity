@extends('layouts.main')

@section('content')
<!--<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif

    @yield('content')
</div>-->
<!-- first section - Home -->
<div id="home" class="home">
  <div class="text-vcenter">
    <h1>Prepaid Electricity</h1>
    <h3>For Apartment Units</h3>
    @if(!Auth::check())
    <a href="/login" class="btn btn-default btn-lg">Login</a>
    @endif

    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif
  </div>
</div>
<!-- /first section -->
<!-- second section - About -->
<div id="about" class="pad-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <img src="/img/larplusard.png" alt="" />
      </div>
      <div class="col-sm-6 text-center">
        <h2>Prepaid Electricity for Apartment Units - An IT Capstone Project</h2>
        <p class="lead">The main objective of this project is to make the electricity prepaid for the tenants in an apartment. Made possible using an AC Current Sensor, Arduino, and Laravel PHP Framework</p>
      </div>
    </div>
  </div>
</div>
<!-- /second section -->
<!-- third section - Services -->
<div id="services" class="pad-section">
  <div class="container">
    <h2 class="text-center">Our Objectives</h2> <hr />
    <div class="row text-center">
      <div class="col-sm-3 col-xs-6">
        <i class="glyphicon glyphicon-flash"> </i>
        <h4>Prepaid</h4>
        <p>Make the electricity prepaid for the tenants in an apartment unit.</p>
      </div>
      <div class="col-sm-3 col-xs-6">
        <i class="glyphicon glyphicon-home"> </i>
        <h4>Make Convenience</h4>
        <p>Make a convenience for the landlord in distributing electricity in his apartments.</p>
      </div>
      <div class="col-sm-3 col-xs-6">
        <i class="glyphicon glyphicon-thumbs-up"> </i>
        <h4>Fair System</h4>
        <p>Create a fair system for the tenant and the landlord in monitoring electric usage and billing it accordingly.</p>
      </div>
      <div class="col-sm-3 col-xs-6">
        <i class="glyphicon glyphicon-piggy-bank"> </i>
        <h4>Budget</h4>
        <p>Allow the tenants to budget their electricity and not letting them pay the electric bills they never use.</p>
      </div>
    </div>
  </div>
</div>
<!-- /third section -->
<!-- fourth section - Information -->
<div id="information" class="pad-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">ARDUINO</h2>
          </div>
          <div class="panel-body lead">
            Convert serial reading to readable values <br>
            Displays watt data to serial monitor <br>
            If serial input ‘on’ = send voltage to pin 13 <br>
            If serial input ‘off’ = turns off voltage on pin 13 

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">LARAVEL</h2>
          </div>
          <div class="panel-body lead">
            Graphical User Interface <br>
            Create command that turns on serial event that reads data from serial monitor <br>
            Save watt values to database <br>
            GUI for loading electricity <br>
            Sends command to Arduino to turn on/off pin 13

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /fourth section -->

<!-- footer -->
<footer>
  <hr />
  <div class="container">
    <p class="text-right">Design and Developed by Jere Zosene Mabelin 2015</p>
  </div>
</footer>
<!-- /footer -->

@stop