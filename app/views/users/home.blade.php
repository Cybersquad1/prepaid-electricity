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
            <h2 class="panel-title">Additional information</h2>
          </div>
          <div class="panel-body lead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit adipiscing blandit. Aliquam placerat, velit a fermentum fermentum, mi felis vehicula justo, a dapibus quam augue non massa. Duis euismod, augue et tempus consequat, lorem mauris porttitor quam, consequat ultricies mauris mi a metus. Phasellus congue, leo sed ultricies tristique, nunc libero tempor ligula, at varius mi nibh in nisi. Aliquam erat volutpat. Maecenas rhoncus, neque facilisis rhoncus tempus, elit ligula varius dui, quis amet. 
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Additional information</h2>
          </div>
          <div class="panel-body lead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit adipiscing blandit. Aliquam placerat, velit a fermentum fermentum, mi felis vehicula justo, a dapibus quam augue non massa. Duis euismod, augue et tempus consequat, lorem mauris porttitor quam, consequat ultricies mauris mi a metus. Phasellus congue, leo sed ultricies tristique, nunc libero tempor ligula, at varius mi nibh in nisi. Aliquam erat volutpat. Maecenas rhoncus, neque facilisis rhoncus tempus, elit ligula varius dui, quis amet. 
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