@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-center">
            <h3>Sectores económicos</h3>
        </div>
        <div class="row" id="appSectores">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <!--<a class="btn btn-small btn-success" href="{{ route('SectorEconomico.create') }}">Nuevo</a>-->
                    <!--<a href="#newSectorEconomico" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>-->
                    <a href="" class="btn btn-primary pull-right" v-on:click.prevent="nuevoSectorEconomico()">Nuevo</a>
                    <table class="table table-responsive" style="margin-top: 10px;">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th colspan="2">Opciones</th>
                            <th>Retos</th>
                            <!--
                            <th style="width: 200px;">Imagen</th>-->
                        </tr>
                        <tr v-for="sector in sectores">
                            <td>@{{sector.id_sector_economico}}</td>
                            <td>@{{sector.nombre}}</td>
                            {{--@auth--}}
                            <td><a href="" v-on:click.prevent="editarSectorEconomico(sector)"><i class="far fa-edit"></i></a></td>
                            {{--@endauth--}}
                            <td><a href="" v-on:click.prevent="eliminarSectorEconomico(sector.id_sector_economico)"><i class="fas fa-trash-alt"></i></a></td>
                            <td><a href="" v-on:click.prevent="retosSector(sector.id_sector_economico)">Retos</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            @include("admin.Sector_Economico.create")
            @include("admin.Sector_Economico.edit")
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/SectorEconomico/SectorEconomicoController.js')}}"></script>
@endsection