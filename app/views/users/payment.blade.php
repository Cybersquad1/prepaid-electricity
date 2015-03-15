@extends('layouts.main')

@section('content')
<div id="payment" class="payment">
  <div class="text-vcenter">
    <form method="post" action="{{URL::action('UsersController@postPayment')}}">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">

    <div class="rowpay">
        <div class="col-sm-12">
            <legend>Prepaid Electricity</legend>
        </div>
        <!-- panel preview -->
        <div class="col-sm-5">
            <h4>Credit payment:</h4>
            <div class="panel panel-default">            
                <div class="panel-body form-horizontal payment-form">
                    <div class="form-group">
                        <label for="unit" class="col-sm-3 control-label">Unit</label>
                        <div class="col-sm-9">
                            {{ Form::select('units', $unit_options , Input::old('units'), array('class'=>'form-control', 'id'=>'unit', 'name'=>'unit')) }}
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="amount" name="amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="credit" class="col-sm-3 control-label">Equivalent Credit(KwH)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="credit" name="credit" disabled>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-default preview-add-button">
                                <span class="glyphicon glyphicon-plus"></span> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </div> <!-- / panel preview -->
        <div class="col-sm-6">
            <h4>Preview:</h4>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table preview-table">
                            <thead>
                                <tr>
                                    <th>Unit</th>
                                    <th>Amount</th>
                                    <th>Equivalent Credit (kwH)</th>
                                </tr>
                            </thead>
                            <tbody></tbody> <!-- preview content goes here-->
                        </table>
                    </div>                            
                </div>
            </div>
            <div class="row text-right">
                <div class="col-xs-12">
                    <h4>Total: <strong><span class="preview-total"></span></strong></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;">
                    <button type="submit" class="btn btn-primary btn-block">Submit all and finish</button>
                </div>                
            </div>
            @if(Session::has('message'))
                <p class="alert">{{ Session::get('message') }}</p>
            @endif
        </div>
    </div>
  </div>
</div>
</form>
@stop


