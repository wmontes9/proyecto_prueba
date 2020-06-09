@extends('layouts.app')

@section('content')
<div class="container">
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
<script type="application/javascript" src="{{asset ('js/controller/retos/RetosController.js')}}"></script>
@endsection
