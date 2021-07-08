@extends('layouts.app')

@section('content')
<div><h2>Empresa</h2></div>
    @if ($errors)
    <ul>
        @foreach ($errors as $error)            
            <li>{{$error}}</li>            
        @endforeach
    </ul>
    @endif
@endsection