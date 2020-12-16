@extends("layouts.app")
@section("content")
    <div class="container" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
        <div class="row text-center">
            <h3>Retos sector {{$datosSector['nombre']}}</h3>
        </div>
        <div class="row" id="appRetosSectores">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <table class="table table-responsive" style="margin-top: 10px;">
                        <tr>
                            <th>Id</th>
                            <th>Pregunta retadora</th>
                            <th colspan="2">Opciones</th>
                            <th>Soluciones</th>
                            <!--
                            <th style="width: 200px;">Imagen</th>-->
                        </tr>
                        <tr v-for="reto in retos">
                            <td>@{{reto.id_reto}}</td>
                            <td>@{{reto.pregunta}}</td>
                            {{--@auth--}}
                            <td><a href="" v-on:click.prevent="editSector(sector)"><i class="far fa-edit"></i></a></td>
                            {{--@endauth--}}
                            <td><a href="" v-on:click.prevent="deleteSector(sector.id_sector_economico)"><i class="fas fa-trash-alt"></i></a></td>
                            <td><a href="" v-on:click.prevent="solucionesReto(reto.id_reto)">Soluciones</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/SectorEconomico/RetosSectorController.js')}}"></script>
@endsection