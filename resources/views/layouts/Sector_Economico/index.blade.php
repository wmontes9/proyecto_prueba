@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Retos</div>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5">
                        <a class="btn btn-small btn-success" href="{{ route('retos.create') }}">Nuevo</a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Actividad</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lis_retos as $values)
                            <tr>
                                <td>{{ $values['id'] }}</td>
                                <td><a href="{{ url('retos', $values['id']) }}">{{ $values['Titulo'] }}</td>
                                <td>{{ $values['Pregunta'] }}</td>
            
                            </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="retos">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="#newReto" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>
            <div class="clearfix"></div>
            <table class="table table-responsive" style="margin-top: 10px;">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th style="width: 350px;">Pregunta retadora</th>
                    <!--
                    <th style="width: 200px;">Imagen</th>-->
                    <th colspan="5" class="">Opciones</th>
                </tr>
                <tr v-for="reto in retos">
                    <td>@{{reto.id_reto}}</td>
                    <td><a href="" v-on:click.prevent="soluciones(reto.id_reto)">@{{reto.titulo}}</a></td>
                    <td>@{{reto.pregunta}}</td>
                   
                    {{--@auth--}}
                    <td><a href="" v-on:click.prevent="editReto(reto)"><i class="far fa-edit"></i></a></td>
                    {{--@endauth--}}
                    <td><a href="" v-on:click.prevent="deleteReto(reto.id_reto)"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset ('js/controller/retos/RetosController.js')}}"></script>
@endsection
