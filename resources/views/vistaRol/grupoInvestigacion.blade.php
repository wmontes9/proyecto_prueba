@extends('layouts.app')

@section('content')
    @if (count(Auth::user()->semilleros) > 0)
        {{Auth::user()->semilleros}}
    @else
        @include('grupoDeInvestigacion.crearVincularGrupo.index')
        <script src="{{asset('js/controller/gruposDeInvestigacion/crearVincularGrupo.js')}}"></script>        
    @endif
@endsection