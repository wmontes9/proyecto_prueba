
@extends('layouts.app')

@section('content')
    <div id="retosEmpresa" class="container">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="thead-dark">
                    <th>Id</th>
                    <th>Enunciado</th>
                    <th>Autor</th>
                    <th>Correo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retosEmpresa as $usuario)
                    @foreach ($usuario->retos as $reto)
                        <tr>
                            <td>{{$reto->id_reto}}</td>
                            <td>                                
                                <button type="button" v-on:click="verReto({{$reto}})" class="btn btn-secondary">
                                    {{$reto->titulo}}
                                </button>
                            </td>
                            <td>{{$usuario->nombre. ' ' .$usuario->apellido}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                                @foreach ($usuario->instituciones as $institucion)
                                    @if ($institucion->pivot->estado == 1)
                                        {{__('Activo')}}
                                    @else
                                        {{__('Inhabilitado')}}
                                    @endif                                    
                                @endforeach
                            </td>
                        </tr>
                    @endforeach                    
                @endforeach
            </tbody>
        </table>
        <div id="mostrarReto" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center w-50">Ver Reto</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                            <div class="col-md-6">                                
                                <h4 class="h4">
                                    {{$reto->titulo }}
                                </h4>
                                <hr/>
                                <p class="p-2">
                                    {{$reto->pregunta}}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img v-bind:src="'{{url('storage/imgReto/')}}' + '/' + reto.url_imagen" id="img-reto" alt="imagen" class="img-fluid">
                            </div>
                        </div>                                                                                                   
                    </div>            
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/controller/institucion/retosEmpresa.js')}}"></script>
@endsection