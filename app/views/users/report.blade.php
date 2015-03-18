@extends('layouts.main')

@section('content')
<div id="summary" class="summary">
  <div class="text-vcenter">
    <div class="row">
		<h2>Electric Status</h2>
	    <p class="lead">
	        Check the status of your electric credits.
	    </p>
	    
	    <div class="alert alert-info">
	        <h4>Electric Status Credit</h4>
	        <p>As the tenant buys credit for electricity, it is lessened depending on the electric consumption.</p>
	        <p>Please reload immidiately when credit runs low to prevent disconnection.</p>
	    </div>

	    <hr />

	    <div class="method">
	        <div class="row margin-0 list-header hidden-sm hidden-xs">
	            <div class="col-md-4"><div class="header">Unit ID</div></div>
	            <div class="col-md-3"><div class="header">Credit</div></div>
	            <div class="col-md-5"><div class="header">Remarks</div></div>
	        </div>

	        <div class="row margin-0">
	            <div class="col-md-4">
	                <div class="cell">
	                    <div class="propertyname">
	                        Unit No. {{$unit->id}}  <span class="mobile-isrequired">[Required]</span>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-3">
	                <div class="cell">
	                    <div class="type">
	                        <h5><code><strong>{{$unit->credit}}</strong></code></h5>
	                    </div>
	                </div>
	            </div>
	            @if($unit->credit <= 50 & $unit->credit > 0)
	            <div class="col-md-5">
	                <div class="cell">
	                    <div class="type">
	                        Please reload immidiately to prevent disconnection.
	                    </div>
	                </div>
	            </div>
	            @elseif($unit->credit <= 0)
	            <div class="col-md-5">
	                <div class="cell">
	                    <div class="type">
	                        Your electricity has been disconnected. Please reload.
	                    </div>
	                </div>
	            </div>
	            @endif
	        </div>
	    </div>
    </div>
  </div>
</div>


<div class="container">

    
</div>
@stop


