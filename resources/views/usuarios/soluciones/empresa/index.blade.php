@extends('layouts.app')

@section('content')
<style>
.modal-content {
    background-color: rgba(40, 14, 4, 1);
}
.close {
  color:aliceblue;
}
</style>
    <div id="solucionesEmpresa" class="container">
        <h2>Soluciones de la empresa</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="thead-dark">
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Justificación</th>
                    <th>Planteamiento</th>
                    <th>Autor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solucionesEmpresa as $soluciones)
                   
                    @foreach ($soluciones as $solucion)
                        @if($solucion->id_solucion)
                            <tr>
                                <td>{{$solucion->id_solucion}}</td>
                                <td>                                
                                    <button type="button" v-on:click="verSolucion({{$solucion}})" class="btn btn-secondary">
                                        {{$solucion->titulo}}
                                    </button>
                                </td>
                                <td>{{$solucion->justificacion}}</td>
                                <td>{{$solucion->planteamiento}}</td>
                                        
                                <td>{{ $solucion->usuarios[0]['nombre'].' '.$solucion->usuarios[0]['apellido']}}</td>
                                
                                
                            </tr>
                        @endif  
                    @endforeach 
                                     
                @endforeach
            </tbody>
        </table>
        <div id="mostrarSolucion" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center w-50" v-text="solucion.titulo"></h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                            <div class="col-md-6">                                
                                <h4 class="h4" v-text="solucion.justificacion">
                                </h4>
                                <hr/>
                                <p class="p-2" v-text="solucion.planteamiento">
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img v-bind:src="'{{url('storage/imgSolucion/')}}' + '/' + solucion.image_solucion" id="img-reto" alt="imagen" class="img-fluid">
                            </div>
                        </div>                                                                                                   
                    </div>            
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/controller/soluciones/EmpresaController.js')}}"></script>
@endsection