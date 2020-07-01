@extends('layouts.app_inicio')

@section('content')
    <div id="grupo">                
        <div class="container-fluid">  
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h1">Grupos de investigación</h1>    
                </div>
                <div class="col-md-2 p-1">
                    <button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#crearGrupo">Crear grupo de investigación</button> 
                    @include('admin/Grupo_Invest.modales.crearGrupo')
                </div>
            </div>         
            <table class="table table-light table-bordered">
                <thead>
                    <tr class="thead-dark">
                        <th>Id</th>
                        <th>Sigla</th>
                        <th colspan="3">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(grupo, i) in grupos">
                        <td v-text="++i"></td>
                        <td v-text="grupo.sigla"></td>
                        <td>
                            <a href="" v-on:click.prevent="editarGrupo(grupo)">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" v-on:click.prevent="eliminarGrupo(grupo.id)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" v-on:click.prevent="getLineas(grupo.id)">
                                <button type="button" class="btn btn-info">Líneas de investigación</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @include('admin/Grupo_Invest.modales.actualizarGrupo')
        </div>
    </div>
    <script src="{{asset('js/controller/GruposInvest/GrupoInvestController.js')}}"></script>
@endsection