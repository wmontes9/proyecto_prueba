@extends('layouts.app')

@section('content')
<style>
    .up-right{
        top:10%;
        right: 1%;
    }
</style>
    @if (count(Auth::user()->instituciones) > 0)          
        @if (Auth::user()->grupos->first()->pivot->rol == "lider")
            <div id="institucion">
                @include('institucion.datosInstitucion.index')
            </div>
            <script src="{{ asset('js/controller/institucion/datosInstitucion.js')}}"></script>
        @else
            <div id="institucion" class="container pt-2">
                @include('institucion.usuarioAsociado.index')
            </div>
        @endif
    @else
        <div id="institucion">
            @include('institucion.crearVincularInstitucion.index')
        </div>
        <script src="{{ asset('js/controller/institucion/registro/registroInstitucion.js')}}"></script>
    @endif    
@endsection
