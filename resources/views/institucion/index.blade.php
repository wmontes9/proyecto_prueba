@extends('layouts.app')

@section('content')
    @if ($errors)
    <ul>
        @foreach ($errors as $error)            
            <li>{{$error}}</li>            
        @endforeach
    </ul>
    @endif
@endsection