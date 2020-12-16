@extends("layouts.app")
@section("content")
    <div class="container" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
        <div class="row text-center">
            <h3>Soluciones reto {{$datosReto['pregunta']}}</h3>
        </div>
        <div class="row" id="appSolucionesReto">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="clearfix"></div>
                    <div v-if =
                     soluciones>
                        <table class="table table-responsive" style="margin-top: 10px;">
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th colspan="2">Opciones</th>
                                <!--
                                <th style="width: 200px;">Imagen</th>-->
                            </tr>
                            
                            <tr v-for="solucion in soluciones">
                                <td>@{{solucion.id_solucion}}</td>
                                <td>@{{solucion.titulo}}</td>
                                {{--@auth--}}
                                <td><a href="" v-on:click.prevent="editSolucion(solucion)"><i class="far fa-edit"></i></a></td>
                                {{--@endauth--}}
                                <td><a href="" v-on:click.prevent="deleteSector(solucion.id_solucion)"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        </table>
                    </div>
                    <div v-else>
                        <p>No existen soluciones en este momento</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/controller/SectorEconomico/SolucionesRetoController.js')}}"></script>
@endsection