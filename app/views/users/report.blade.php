@extends('layouts.main')

@section('content')
<ul>
    @foreach($results as $result)
        <li>
            {{$result->credit}}
        </li>
    @endforeach
</ul>

@stop