@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-center">
            <h3>Linea Investigacion </h3>
        </div>
        <div class="row" id="appLinea">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <!--<a class="btn btn-small btn-success" href="{{ route('SectorEconomico.create') }}">Nuevo</a>-->
                    <!--<a href="#newSectorEconomico" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>-->
                    <a href="" class="btn btn-primary pull-right" v-on:click.prevent="nuevoLinea()">Nueva Linea</a>
                    <table class="table table-responsive" style="margin-top: 10px;">
                        <tr>
                            <th>Id</th>
                            <th>Grupo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th colspan="2">Opciones</th>
                            
                            <!--linea_invests
                            <th style="width: 200px;">Imagen</th>-->
                        </tr>
                        <tr v-for="linea in lineas">
                            <td>@{{linea.id}}</td>
                            <td>@{{linea.id_grupo_invest}}</td>
                            <td>@{{linea.nombre}}</td>
                            <td>@{{linea.descripcion}}</td>
                            {{--@auth--}}
                            <td><a href="" v-on:click.prevent="editarLineaInvestigacion(linea)"><i class="far fa-edit"></i></a></td>
                            {{--@endauth--}}
                            <td><a href="" v-on:click.prevent="eliminarLineaInvestigacion(linea.id)"><i class="fas fa-trash-alt"></i></a></td>
                            
                        </tr>
                    </table>
                </div>
            </div>
            @include("grupoDeInvestigacion.crearVincularLinea.createLinea") <!-- llamar -->
            @include("grupoDeInvestigacion.crearVincularLinea.editLinea")
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/gruposDeInvestigacion/LineaInvestigacionController.js')}}"></script>
@endsection