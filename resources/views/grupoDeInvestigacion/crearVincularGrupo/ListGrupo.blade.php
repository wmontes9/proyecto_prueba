@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-center">
            <h3>grupo Investigacion</h3>
        </div>
        <div class="row" id="appGrupoIn">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <!--<a class="btn btn-small btn-success" href="{{ route('SectorEconomico.create') }}">Nuevo</a>-->
                    <!--<a href="#newSectorEconomico" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>-->
                    <a href="" class="btn btn-primary pull-right" v-on:click.prevent="nuevoGrupo()">Nuevo Grupo</a>
                    <hr>
                    <table class="table table-responsive" id="tbgrupo" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Sigla</th>
                                <th>Nombre</th>
                                <th>Logo</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                
                                <!--
                                <th style="width: 200px;">Imagen</th>-->
                            </tr>
                        <tbody>
                            <tr v-for="grupo in grupos">
                                <td>@{{grupo.id}}</td>
                                <td>@{{grupo.sigla}}</td>
                                <td>@{{grupo.nombre}}</td>
                                <!-- <td>@{{grupo.logo}}</td>-->
                                <td><img :src="'{{asset('storage/imgGrupo')}}/'+grupo.logo" class="img-responsive" width="100%"></td>
                                
                                {{--@auth--}}
                                <td><a href="" v-on:click.prevent="editarGrupoInvestigacion(grupo)"><i class="far fa-edit"></i></a></td>
                                {{--@endauth--}}
                                <td><a href="" v-on:click.prevent="eliminarGrupoInvestigacion(grupo.id)"><i class="fas fa-trash-alt"></i></a></td>
                                
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @include("grupoDeInvestigacion.crearVincularGrupo.createGrupo") <!-- llamar -->
            @include("grupoDeInvestigacion.crearVincularGrupo.editGrupo")
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/gruposDeInvestigacion/GrupoInvestigacionController.js')}}"></script>
@endsection