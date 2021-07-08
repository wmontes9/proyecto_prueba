@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-center">
            <h3>Area Conocimiento</h3>
        </div>
        <div class="row" id="appArea">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <!--<a class="btn btn-small btn-success" href="{{ route('SectorEconomico.create') }}">Nuevo</a>-->
                    <!--<a href="#newSectorEconomico" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>-->
                    <a href="" class="btn btn-primary pull-right" v-on:click.prevent="nuevoArea()">Nueva Area</a>
                    <hr>
                    <table id="tbarea" class="table table-responsive" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                
                                <!--
                                <th style="width: 200px;">Imagen</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="area in areas">
                                <td>@{{area.id_area_conocimiento}}</td>
                                <td>@{{area.nombre}}</td>
                                {{--@auth--}}
                                <td><a href="" v-on:click.prevent="editarAreaConocimiento(area)"><i class="far fa-edit"></i></a></td>
                                {{--@endauth--}}
                                <td><a href="" v-on:click.prevent="eliminarAreaConocimiento(area.id_area_conocimiento)"><i class="fas fa-trash-alt"></i></a></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @include("grupoDeInvestigacion.crearVincularArea.createArea") <!-- llamar -->
            @include("grupoDeInvestigacion.crearVincularArea.editArea")
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/gruposDeInvestigacion/AreaConocimientoController.js')}}"></script>
@endsection