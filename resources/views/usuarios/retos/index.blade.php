@extends('layouts.app')

@section('content')
    <div id="retosusuario">                
        <div class="container-fluid">  
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h1">Lista retos</h1>    
                </div>
                <div class="col-md-2 p-1">
                    <a class="btn btn-small btn-success" href="{{ route('retos.create') }}">Formular reto</a>
                    <!--<button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#crearReto">Formular Reto</button>-->
                
                </div>
            </div>         
            <table class="table table-bordered">
                <thead>
                    <tr class="thead-dark">
                        <th>Id</th>
                        <th>Título</th>
                        <th>Pregunta retadora</th>
                        <th> <i class="far fa-edit"></i></th>
                        <th><i class="fas fa-trash-alt"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(reto, i) in retos">
                        <td v-text="++i"></td>
                        <td v-text="reto.titulo"></td>
                        <td v-text="reto.pregunta"></td>
                        <td>
                            <a v-if="reto.estado != 'false'" href="" v-on:click.prevent="editarReto(reto)">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" v-on:click.prevent="eliminarReto(reto.id_reto)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
           
        </div>
    </div>
    <script src="{{asset('js/controller/retos/RetoController.js')}}"></script>
@endsection