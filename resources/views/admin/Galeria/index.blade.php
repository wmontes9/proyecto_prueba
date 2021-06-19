@extends("layouts.app")

@section("content")
    <div class="container" style="background-color: rgba(40, 14, 4, 0.6); color: #fff;">
        <div class="row text-center">
            <h3>Eventos</h3>
        </div>
        <div class="row" id="appGaleria">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                @auth
                <a href="#newGaleria" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>
                <hr>
                @endauth
                <div class="clearfix"></div>
                <table id="tgaleria" class="table table-responsive" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Id usuario</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(galeria, index) in galerias">
                            <td>@{{index}}</td>
                            <td>@{{galeria.id_usuario}}</a></td>
                            <td>@{{galeria.descripcion}}</td>
                            <td>@{{galeria.estado}}</td>
                            <td>
                                <img :src="'{{asset('storage/imgGaleria')}}/'+galeria.url_imagen" class="img-responsive" width="100%">
                            </td>
                            {{--@auth--}}
                            <td><a href="" v-on:click.prevent="editGaleria(galeria)"><i class="far fa-edit"></i></a></td>
                            {{--@endauth--}}
                            <td><a href="" v-on:click.prevent="deleteGaleria(galeria.id)"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @include("admin.Galeria.create")
            @include("admin.Galeria.edit")
        </div>
    </div>
<script type="text/javascript" src="{{asset('js/controller/galeria/GaleriaController.js')}}"></script>
@endsection