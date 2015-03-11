@extends('layouts.main')

@section('content')
{{ Form::open(array('url' => 'UserController@postPayment')) }}
<div class="container">
    <div class="row-fluid">
      <form class="form-horizontal">
        <fieldset>
          <div id="legend">
            <legend class="">Payment</legend>
          </div>
     
          <!-- Expiry-->
          <div class="control-group">
            <label class="control-label" for="password">Unit</label>
            <div class="controls">
              {{ Form::select('units', $unit_options , Input::old('units'), array('class'=>'form-control', 'id'=>'unit', 'name'=>'unit')) }}
            </div>
          </div>
     
          <!-- Submit -->
          <div class="control-group">
            <div class="controls">
              <button class="btn btn-success">Pay Now</button>
            </div>
          </div>
     
        </fieldset>
      </form>
    </div>
</div>
{{ Form::close() }}
@stop


