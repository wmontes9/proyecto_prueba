@extends("layouts.app")

@section("content")
<div class="container" style="background-color: rgba(40, 14, 4, 0.6); color: #fff;">
<div class="row text-center">
    <h3>Eventos</h3>
</div>
<div class="row" id="appEventos">
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            @auth
            <a class="btn btn-small btn-success" href="{{ route('eventos.create') }}">Nuevo</a>
            @endauth
            <div class="clearfix"></div>
            <table id="eventos" class="table table-responsive" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Subtitulo</th>
                        <th>Descripción</th>
                        <th>Lugar</th>
                        <th>Fecha</th>
                        <th>Objetivo</th>
                        <th>Ponentes</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th colspan="5" >Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="evento in eventos">
                        <td>@{{evento.id}}</td>
                        <td><a href="" v-on:click.prevent="eventos(evento.id)">@{{evento.titulo}}</a></td>
                        <td>@{{evento.subtitulo}}</td>
                        <td>@{{evento.descripcion}}</td>
                        <td>@{{evento.lugar}}</td>
                        <td>@{{evento.fecha}}</td>
                        <td>@{{evento.objetivo}}</td>
                        <td>@{{evento.ponentes}}</td>
                        <td>@{{evento.estado}}</td>
                        <td>
                            <img :src="'{{asset('storage/imgEvento')}}/'+evento.url_imagen" class="img-responsive" width="100%">
                        </td>
                        {{--@auth--}}
                        <td><a href="" v-on:click.prevent="editEvento(evento)"><i class="far fa-edit"></i></a></td>
                        {{--@endauth--}}
                        <td><a href="" v-on:click.prevent="deleteEvento(evento.id)"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @include("admin.Eventos.edit")
    
</div>
</div>
<script type="text/javascript" src="{{asset('js/controller/Eventos/EventoController.js')}}"></script>
@endsection