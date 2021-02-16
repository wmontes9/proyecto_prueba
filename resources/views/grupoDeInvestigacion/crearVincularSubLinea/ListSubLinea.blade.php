@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-center">
            <h3>SubLinea Investigacion </h3>
        </div>
        <div class="row" id="appSubLinea">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <!--<a class="btn btn-small btn-success" href="{{ route('SectorEconomico.create') }}">Nuevo</a>-->
                    <!--<a href="#newSectorEconomico" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>-->
                    <a href="" class="btn btn-primary pull-right" v-on:click.prevent="nuevoSubLinea()">Nueva SubLinea</a>
                    <table class="table table-responsive" style="margin-top: 10px;">
                        <tr>
                            <th>Id</th>
                            <th>Linea investigacion</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th colspan="2">Opciones</th>
                            <th>Sub Linea Semilleros</th>
                            
                            <!--linea_invests
                            <th style="width: 200px;">Imagen</th>-->
                        </tr>
                        <tr v-for="sublinea in sublineas">
                            <td>@{{sublinea.id}}</td>
                            <td>@{{sublinea.id_linea_invest}}</td>
                            <td>@{{sublinea.nombre}}</td>
                            <td>@{{sublinea.descripcion}}</td>
                            {{--@auth--}}
                            <td><a href="" v-on:click.prevent="editarSubLineaInvestigacion(sublinea)"><i class="far fa-edit"></i></a></td>
                            {{--@endauth--}}
                            <td><a href="" v-on:click.prevent="eliminarSubLineaInvestigacion(sublinea.id)"><i class="fas fa-trash-alt"></i></a></td>
                         
                            <td><a href="" v-on:click.prevent="getSubLineaSemilleros(sublinea.id)">SubLineaSemilleros</a></td>
                            
                        </tr>
                    </table>
                </div>
            </div>
            @include("grupoDeInvestigacion.crearVincularSubLinea.createSubLinea") <!-- llamar -->
            @include("grupoDeInvestigacion.crearVincularSubLinea.editSubLinea")
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/gruposDeInvestigacion/SubLineaInvestigacionController.js')}}"></script>
@endsection