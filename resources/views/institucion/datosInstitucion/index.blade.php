<div v-if="datosActualizar !== null" v-for="(institucion,index) in datosActualizar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h5 class="navbar-brand h5 py-1" style="font-weight:450;">
            Institucion
        </h5> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-lg-flex justify-content-lg-end w-100">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a v-bind:href="'/instituciones/usuarios_asociados/' + institucion.id_institucion" class="btn btn-warning">
                            <i class="fas fa-users"></i> Usuarios Asociados
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div id="datosInstitucion">
            <div class="row">
                <div class="col-lg-6">            
                    <form method="post" v-on:submit.prevent="actualizarDatosInstitucion">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="razon">Razon Social</label>
                                <div class="input-group">                            
                                    <input type="text" name="razon" id="razon" v-model="institucion.razon_social" class="form-control" disabled v-on:blur="desactivar"
                                        v-on:mouseover="tool" 
                                        v-on:change="activar('button#actualizar')">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary edit rounded-0" type="button" v-on:click="editarDato">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="tiempo">Tiempo de Constitucion</label>
                                <div class="input-group">
                                    <select name="tiempo" id="tiempo" class="form-control" disabled 
                                        v-on:blur="desactivar" 
                                        v-model="institucion.tiempo_constitucion"
                                        v-on:change="activar('button#actualizar')">
                                        <option value="">--seleccionar--</option>
                                        <option value="-1" v-bind:selected="institucion.tiempo_constitucion == '-1'">menos de un año</option>
                                        <option value="1-5" v-bind:selected="institucion.tiempo_constitucion == '1-5'">entre 1 y 5 años</option>
                                        <option value=">5" v-bind:selected="institucion.tiempo_constitucion == '>5'">mayor a 5 años</option>
                                    </select>
                                    <button type="button" class="btn btn-secondary rounded-0" v-on:click="editarDato">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="nit">NIT</label>
                                <div class="input-group">
                                    <input type="text" name="nit" id="nit" v-model="institucion.nit" class="form-control" disabled 
                                        v-on:blur="desactivar"
                                        v-on:change="activar('button#actualizar')">
                                    <div class="input-group-append">
                                    <button class="btn btn-secondary edit rounded-0" type="button" v-on:click="editarDato">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="empleados">N° Empleados</label>
                                <div class="input-group">
                                    <input type="number" name="empleados" id="empleados" v-model="institucion.num_empleados" class="form-control" disabled 
                                        v-on:blur="desactivar"
                                        v-on:change="activar('button#actualizar')">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary edit rounded-0" type="button" v-on:click="editarDato">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="email">Correo Electronico</label>
                                <div class="input-group">
                                    <input type="email" name="email" id="email" v-model="institucion.email" class="form-control" disabled 
                                        v-on:blur="desactivar"
                                        v-on:change="activar('button#actualizar')">
                                    <div class="input-group-append">
                                    <button class="btn btn-secondary edit rounded-0" type="button" v-on:click="editarDato">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono">Telefono</label>
                                <div class="input-group">
                                    <input type="phone" name="telefono" id="telefono" v-model="institucion.telefono" class="form-control" disabled 
                                        v-on:blur="desactivar"
                                        v-on:change="activar('button#actualizar')">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary edit rounded-0" type="button" v-on:click="editarDato">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label for="direccion">Direccion (Sede Principal)</label>
                                <div class="input-group">
                                    <textarea name="direccion" id="direccion" cols="30" rows="3" v-model="institucion.direccion" class="form-control" disabled 
                                        v-on:blur="desactivar"
                                        v-on:change="activar('button#actualizar')"></textarea>
                                    <button class="btn btn-secondary edit rounded-0" style="max-height:40px;" type="button" v-on:click="editarDato">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="py-1">
                            <button type="submit" class="btn btn-warning w-100" id="actualizar" data-toggle="tooltip">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>            
                </div>
                <div class="col-lg-6">   
                    <h4 class="h4" style="font-weight:450;">Actividades Economicas</h4> 
                    <div class="actividad-primaria ml-1">
                        <div class="m-1 rounded px-1 pt-1">                    
                            <h6 class="h6">Actividad Primaria</h6>
                            <hr>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="thead-dark">
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Tipo</th>
                                        <th class="text-center">
                                            <i class="fas fa-edit"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(actividad, index) in institucion.actividades" v-if="actividad.pivot.tipo == 'primaria'">
                                        <td v-text="actividad.pivot.codigo" class="text-center"></td>
                                        <td v-text="actividad.descripcion"></td>
                                        <td v-text="actividad.pivot.tipo" class="text-center"></td>
                                        <td class="text-center">                                    
                                            <button type="button" class="btn btn-warning btn-sm w-100" v-bind:id="'cambiar' + '_' + index" data-toggle="modal" data-target="#cambiar_primaria">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            @include('institucion.datosInstitucion.modales.cambiarActividadPrimaria')
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                
                    </div>
                    <div class="actividades-secundarias ml-1">                    
                        <div class="m-1 rounded px-1 pt-1">
                            <h6 class="h6">Actividades Secundarias</h6>
                            <hr>
                            <div v-if="institucion.actividades.length < 4">
                                <div class="alert alert-warning">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p>Puede Agregar <b>@{{4 - institucion.actividades.length }} </b> Actividad economica secundaria.</p>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-warning w-100"  data-toggle="modal" data-target="#agregar_ciiu" data-backdrop="static">Agregar</button>                                
                                        </div>
                                    </div>                                
                                </div>
                                @include('institucion.datosInstitucion.modales.agregarCiiu')
                            </div>
                            <table class="table table-sm table-bordered" v-if="verificarActividadesSecundarias(institucion.actividades).length > 0">
                                <thead>
                                    <tr class="thead-dark">
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Tipo</th>
                                        <th class="text-center">
                                            <i class="fas fa-times-circle"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(actividad, index) in institucion.actividades" v-if="actividad.pivot.tipo !== 'primaria'">
                                        <td v-text="actividad.pivot.codigo" class="text-center"></td>
                                        <td v-text="actividad.descripcion"></td>
                                        <td v-text="actividad.pivot.tipo" class="text-center"></td>
                                        <td class="text-center">                                    
                                            <button type="button" class="btn btn-warning btn-sm w-100" v-bind:id="'quitar' + '_' + index" v-on:click="eliminarActividad(actividad.pivot.id_clase,actividad.pivot.id_institucion,actividad.pivot.tipo, 'quitar' + '_' + index)">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="alert alert-secondary" v-else>
                                <h5 class="h5" style="font-weight:450;">Listado vacio.</h5>
                                <hr>
                                <p>Por favor agregar actividades secundarias.</p>
                            </div>
                        </div>                  
                    </div>                        
                </div>
            </div>
        </div>                
    </div>
</div>
<div class="d-flex justify-content-center align-items-center" v-else>
    <div class="alert alert-warning">
        <h3 class="alert-heading">
            Error!
        </h3>
        <hr>
        <p>Ha ocurrido un error.</p>
    </div>
</div>