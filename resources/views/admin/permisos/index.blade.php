@extends('layouts.app')

@section('content')
    <div class="container" id="permisos">
        <h4 class="h4">Administrar Permisos</h4>
        {{-- <table class="table table-sm table-bordered" id="grupos">
            <thead>
                <tr class="thead-dark">
                    <th>Grupo</th>
                    <th class="text-center" style="width:130px;">Editar Permisos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->nombre }}</td>
                        <td class="text-center" style="width:130px;">
                            <button type="button" v-on:click.prevent="editarPermisos" class="btn btn-warning" v-bind:grupo="{{ $grupo->id_grupo }}">
                                editar <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   --}}
        <hr>
        <div id="editar_permisos">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-between">                    
                </div>
                <div class="col-md-6">                                       
                </div>
            </div>
            <div class="row">
                    <div class="col-md-6 my-1">       
                        <h6 class="h6">Asignar Permisos a Grupo</h6>
                        <div class="text-center mb-1">
                            <div class="row">
                                <div class="col-6">
                                    <input type="search" name="fltr_permisos" id="fltr_permisos" class="form-control w-100" v-on:keyup="filtrarPermisos" placeholder="Buscar">
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-warning w-100" id="add" v-on:click="agregarPermisosA" data-toggle="modal" data-target="#agregarPermiso">Agregar</button>                                    
                                </div>
                            </div>                                                        
                        </div>
                        <div class="w-100 position-relative rounded" style="height:250px; overflow-y: scroll; border:1px solid lightgray; background-color: #1a1814;" id="group-list">
                            <ul class="list-group list-group-flush" data-spy="scroll" data-offset="20" id="lista_permisos">                           
                                @foreach ($permisos as $key => $permiso)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-1 pr-1">
                                        <label for="chk_{{ $key }}" class="m-0">
                                                <i class="fas fa-arrow-circle-right"></i>
                                            {{$permiso->descripcion}}
                                        </label> 
                                        <input type="checkbox" id="chk_{{ $key }}" name="permiso[]" value="{{ $permiso->id_permiso }}" v-on:change="seleccionarAgregar" placeholder="{{$permiso->descripcion}}" form="agregarPermisos">
                                    </li>                          
                                @endforeach                                                             
                            </ul>
                        </div>                                                
                    </div>                    
                    <div class="col-md-6 my-1 position-relative bg-white" id="consulta_permisos"> 
                        <form method="post" action="{{ route('removerPermisos') }}"> 
                            @csrf 
                            @method('delete')
                            <h6 class="h6">Permisos por Grupo</h5>                    
                            <select name="grupo" id="grupo" class="form-control w-100 mb-1" v-on:change.prevent="consultar" v-model="grupo">                            
                                @foreach ($grupos as $grupo)
                                    <option value="{{$grupo->id_grupo}}">{{$grupo->nombre}}</option>
                                @endforeach
                            </select>                          
                            <div class="w-100 position-relative rounded" style="height:250px; overflow-y: scroll; border:1px solid lightgray;" id="lista_permisos_asignados">
                                <ul class="list-group list-group-flush" data-spy="scroll" data-offset="20" v-if="estados.on !==null" id="lista_permisos_asignados">  
                                    <li class="list-group-item  d-flex justify-content-between align-items-center py-1 pr-1" v-for="(permiso, index) in estados.on">      
                                        <label v-bind:for="'chk_' + index + '_read'" class="m-0">
                                            <i class="fas fa-arrow-circle-right"></i>
                                            @{{ permiso.descripcion }}
                                        </label>
                                        <input type="checkbox" v-bind:id="'chk_' + index + '_read'" name="permiso[]" v-bind:value="permiso.id_permiso" v-on:change="seleccionarRemover">
                                    </li>                            
                                </ul>
                                <div class="estado" id="estado">
                                    <div class="icon">                                    
                                    </div>
                                    <div class="texto">                                    
                                    </div>
                                </div>                            
                            </div>
                            <div class="control_permisos" id="control_permisos">
                                <button type="submit" class="btn btn-danger btn-sm" id="boton-remover" onclick="confirm('Esta seguro de realizar esta operacion?')">Remover</button>
                            </div>
                        </form>                        
                    </div>
                </div>             
        </div>
        @include('admin.permisos.modales.agregarPermiso')      
    </div> 
    <script src="{{ asset('js/controller/administrador/PermisosController.js') }}"></script>
@endsection