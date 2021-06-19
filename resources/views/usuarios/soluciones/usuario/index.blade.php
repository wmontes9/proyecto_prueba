@extends('layouts.app')

@section('content')
    <div id="solucionesusuario">                
        <div class="container-fluid">  
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h1">Lista de soluciones</h1>    
                </div>
                <div class="col-md-2 p-1">
                    <!--<a class="btn btn-small btn-success" href="{{ route('retos.create') }}">Formular reto</a>-->
                    <!--<button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#crearReto">Formular Reto</button>-->
                
                </div>
            </div>         
            <table class="table table-bordered">
                <thead>
                    <tr class="thead-dark">
                        <th>Id</th>
                        <th>Título</th>
                        <th>Justificación</th>
                        <th>Planteamiento</th>
                        <th>imagen solución</th>
                        <th>Referencias</th>
                        <th> <i class="far fa-edit"></i></th>
                        <th><i class="fas fa-trash-alt"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(solucion, i) in soluciones">
                        <td v-text="++i"></td>
                        <td v-text="solucion.titulo"></td>
                        <td v-text="solucion.justificacion"></td>
                        <td v-text="solucion.planteamiento"></td>
                        <td>Imagen</td>
                        <td v-text="solucion.referencias"></td>
                        <td>
                            <a href="" v-on:click.prevent="editarSolucion(solucion)">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" v-on:click.prevent="eliminarSolucion(solucion.id_solucion)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
           
        </div>
    </div>
    <script src="{{asset('js/controller/soluciones/SolucionController.js')}}"></script>
@endsection