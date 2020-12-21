{{-- @extends("layouts.app_inicio") --}}
@extends("layouts.app")

@section("content")
<div class="container" style="background-color: rgba(40, 14, 4, 0.6); color: #fff;">
<div class="row text-center">
    <h3>Retos</h3>
</div>
<div class="row" id="appRetos">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            @auth
            <a class="btn btn-small btn-success" href="{{ route('retos.create') }}">Nuevo</a>
            @endauth
            <div class="clearfix"></div>
            <table id="retolist" class="table table-responsive" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Título</th>
                        <th scope="col" style="width: 350px;">Pregunta retadora</th>
                        <th scope="col" style="width: 200px;">Imagen</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="reto in retos">
                        <td scope="row">@{{reto.id_reto}}</td>
                        <td><a href="" v-on:click.prevent="soluciones(reto.id_reto)">@{{reto.titulo}}</a></td>
                        <td>@{{reto.pregunta}}</td>
                        <td>
                            <img :src="'{{asset('storage/imgReto')}}/'+reto.url_imagen" class="img-responsive" width="100%">
                        </td>
                        {{--@auth--}}
                        <td><a href="" v-on:click.prevent="editReto(reto)"><i class="far fa-edit"></i></a></td>
                        {{--@endauth--}}
                        <td><a href="" v-on:click.prevent="deleteReto(reto.id_reto)"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @include("admin.Reto.edit")
</div>
</div>
<script type="text/javascript" src="{{asset('js/controller/RetoController.js')}}"></script>
@endsection