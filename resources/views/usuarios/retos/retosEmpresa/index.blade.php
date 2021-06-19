
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
    <div id="retosEmpresa" class="container">
        <h2>Retos de la empresa</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="thead-dark">
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Pregunta</th>
                    <th>Autor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retosEmpresa as $retos)
                   
                    @foreach ($retos as $reto)
                        @if($reto->id_reto)
                            <tr>
                                <td>{{$reto->id_reto}}</td>
                                <td>                                
                                    <button type="button" v-on:click="verReto({{$reto}})" class="btn btn-secondary">
                                        {{$reto->titulo}}
                                    </button>
                                </td>
                                <td>{{$reto->pregunta}}</td>
                                        
                                <td>{{ $reto->usuarios[0]['nombre'].' '.$reto->usuarios[0]['apellido']}}</td>
                                
                                <td>{{$reto->estado}}</td>
                            </tr>
                        @endif  
                    @endforeach 
                                     
                @endforeach
            </tbody>
        </table>
        <div id="mostrarReto" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center w-50" v-text="reto.titulo"></h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                            <div class="col-md-6">                                
                                <h4 class="h4" v-text="reto.pregunta">
                                </h4>
                                <hr/>
                                <p class="p-2" v-text="reto.necesidad">
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