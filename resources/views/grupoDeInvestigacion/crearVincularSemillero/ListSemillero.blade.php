@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-center">
            <h3>Semillero de investigación </h3>
        </div>
        <div class="row" id="appSemillero">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <!--<a class="btn btn-small btn-success" href="{{ route('SectorEconomico.create') }}">Nuevo</a>-->
                    <!--<a href="#newSectorEconomico" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>-->
                    <a href="" class="btn btn-primary pull-right" v-on:click.prevent="nuevoSemillero()">Nuevo Semillero</a>
                    <table class="table table-responsive" style="margin-top: 10px;">
                        <tr>
                            <th>Id</th>
                            <th>Area Conocimiento</th>
                            <th>Nombre</th>
                            <th>sigla</th>
                            <th>Logo</th>
                            <th colspan="2">Opciones</th>
                            
                            <!--linea_invests
                            <th style="width: 200px;">Imagen</th>-->
                        </tr>
                        <tr v-for="semillero in semilleros">
                            <td>@{{semillero.id}}</td>
                            <td>@{{semillero.id_area_conocimiento}}</td>
                            <td>@{{semillero.nombre}}</td>
                            <td>@{{semillero.sigla}}</td>
                            <td><img :src="'{{asset('storage/imgSemillero')}}/'+semillero.logo" class="img-responsive" width="100%"></td>
                            {{--@auth--}}
                            <td><a href="" v-on:click.prevent="editarSemillero(semillero)"><i class="far fa-edit"></i></a></td>
                            {{--@endauth--}}
                            <td><a href="" v-on:click.prevent="eliminarSemillero(semillero.id)"><i class="fas fa-trash-alt"></i></a></td>
                            
                        </tr>
                    </table>
                </div>
            </div>
            @include("grupoDeInvestigacion.crearVincularSemillero.createSemillero") <!-- llamar -->
            @include("grupoDeInvestigacion.crearVincularSemillero.editSemillero")
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/gruposDeInvestigacion/SemilleroController.js')}}"></script>
@endsection