
@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-center">
            <h3> SubLineaSemilleros {{$datosSubLinea['nombre']}}</h3>
        </div>
        <div class="row" id="appSubLineaSemillero">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <table class="table table-responsive" style="margin-top: 10px;">
                        <tr>
                            <th>Id</th>
                            <th>nombre</th>
                            <th colspan="2">Opciones</th>
                            
                            <!--
                            <th style="width: 200px;">Imagen</th>-->
                        </tr>
                        <tr v-for="sublineasemillero in sublineasemilleros">
                            <td>@{{sublineasemillero.id_semillero}}</td>
                            <td>@{{sublineasemillero.nombre}}</td>
                            {{--@auth--}}
                            <td><a href="" v-on:click.prevent="editSector(sector)"><i class="far fa-edit"></i></a></td>
                            {{--@endauth--}}
                            <td><a href="" v-on:click.prevent="deleteSector(sector.id_sector_economico)"><i class="fas fa-trash-alt"></i></a></td>
                           
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/gruposDeInvestigacion/SubLineaSemilleroController.js')}}"></script>  
@endsection