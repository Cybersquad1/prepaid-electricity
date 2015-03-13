@extends('layouts.main')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif

    @yield('content')
</div>
<div class="welcome">
	<a href="" title="Prepaid Electricity"><img src="/img/logo2.png" alt="Prepaid Electricity"></a>
		<h1>Prepaid Electricity</h1>

</div>
@stop