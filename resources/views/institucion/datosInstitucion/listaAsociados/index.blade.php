@extends('layouts.app')

@section('content')
    <div id="usuariosAsociaodos">
        <div class="container">
            <input type="hidden" name="id_institucion" value="{{$id_institucion}}" >   
            <div class="usuariosAsociados">
                <h3 class="h3">Usuario Vinculados</h3>            
                <table class="table table-light table-bordered table-sm" v-if="usuariosAsociados.length > 0">
                    <thead>
                        <tr class="thead-dark">
                            <th>Nombre y Apellidos</th>
                            <th>Telefono</th>
                            <th>Correo Electronico</th>
                            <th>Estado Usuario</th>
                            <th>Inhabilitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(socio, index) in usuariosAsociados">
                            <td v-text="socio.nombre + ' ' + socio.apellido"></td>
                            <td v-text="socio.telefono"></td>
                            <td v-text="socio.email"></td>
                            <td v-text="socio.estado"></td>
                            <td>
                                <form v-bind:action="'/instituciones/usuarios/inhabilitar/' + socio.id_usuario" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="id_empresa" v-bind:value="socio.id_institucion">
                                    <input type="hidden" name="switch_estado" value="2">
                                    <button type="submit" class="btn btn-warning w-100">inhabilitar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="alert alert-secondary" v-else>
                    <div class="alert-heading">
                        <h5 class="h5">No se encuantran usuarios Asociados</h5>                    
                    </div>
                    <hr/>
                    <p class="p-2">No se han encontrados usuarios asociados a esta empresa.</p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="container"> 
            <div class="row">
                <div class="solicitudes col-md-7">
                    <h3 class="h3">Solicitudes</h3>            
                    <table class="table table-light table-bordered table-sm" v-if="solicitudes.length > 0">
                        <thead>
                            <tr class="thead-dark">
                                <th>Nombre y Apellidos</th>
                                <th>Telefono</th>
                                <th>Correo Electronico</th>
                                <th>Estado Usuario</th>
                                <th>Solucitud</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(solicitud, index) in solicitudes">
                                <td v-text="solicitud.nombre + ' ' + solicitud.apellido"></td>
                                <td v-text="solicitud.telefono"></td>
                                <td v-text="solicitud.email"></td>
                                <td v-text="solicitud.estado"></td>
                                <td>
                                    <form v-bind:action="'/instituciones/usuarios/vincular/' + solicitud.id_usuario" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="id_empresa" v-bind:value="solicitud.id_institucion">
                                        <input type="hidden" name="switch_estado" value="1">
                                        <button type="submit" class="btn btn-warning w-100">Activar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="alert alert-secondary" v-else>
                        <div class="alert-heading">
                            <h5 class="h5">No hay Solicitudes!</h5>                    
                        </div>
                        <hr/>
                        <p class="p-2">No se han encontrado solicitudes para confirmar.</p>
                    </div>
                </div>
                <div class="inhabilitados col-md-5">
                    <h3 class="h3">Usuarios Inhabilitados</h3>            
                    <table class="table table-light table-bordered table-sm" v-if="inhabilitados.length > 0">
                        <thead>
                            <tr class="thead-dark">
                                <th>Documento</th>                            
                                <th>Correo Electronico</th>                            
                                <th>Habilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(inhabilidad, index) in inhabilitados">
                                <td v-text="inhabilidad.num_identificacion"></td>                            
                                <td v-text="inhabilidad.email"></td>                            
                                <td>
                                    <form v-bind:action="'/instituciones/usuarios/vincular/' + inhabilidad.id_usuario" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="id_empresa" v-bind:value="inhabilidad.id_institucion">
                                        <input type="hidden" name="switch_estado" value="1">
                                        <button type="submit" class="btn btn-warning w-100">Activar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="alert alert-secondary" v-else>
                        <div class="alert-heading">
                            <h5 class="h5">No hay Usuarios Inhabilitados!</h5>                    
                        </div>
                        <hr/>
                        <p class="p-2">No se han encontrado usuarios inhabilitados.</p>
                    </div>
                </div> 
            </div>                     
        </div>
    </div>
    <script src="{{ asset('js/controller/institucion/usuariosAsociados.js')}}"></script>    
@endsection
