@extends('layouts.app')
@section('content')
    @auth        
        <div class="container-fluid" id="retoUsuario">
            <h2 class="h2">
                Lista de Retos
            </h2> 
            <div id="nuevo_reto">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newReto">Fromular Reto</button>
                <div class="row" id="appRetos">
                    <div class="col-xs-12 col-sm-12 col-md-12">                                                        
                        <table class="table table-responsive" style="margin-top: 10px;">
                            <tr>
                                <th>Id</th>
                                <th>Enunciado</th>
                                <th style="width: 350px;">Descripción</th>                        
                                <th colspan="5" class="">Opciones</th>
                            </tr>
                            <tbody>                               
                                <tr>
                                    <th></th>
                                    <td></td>  
                                    <td></td>  
                                    <td></td>
                                    <td><a href=""><i class="far fa-edit"></i></a></td>
                                    <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                                </tr>                                                                                                        
                            </tbody>
                        </table>
                    </div>               
                </div>
            </div>  
    <script src="{{asset('js/controller/usuario/retoUsuario.js')}}"></script>
    @endauth    
@endsection