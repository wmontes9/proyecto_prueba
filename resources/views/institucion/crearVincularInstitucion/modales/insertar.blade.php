<!--Modal Insertar Institucion-->
<div id="insert_i" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h3 class="modal-title text-center w-50">Crear Institucion</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">                
                <form id="formEmpresa" method="POST" action="{{ route('crearInstitucion','empresa') }}">
                    @csrf
                    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pill-g" role="tab" aria-controls="pill-g" aria-selected="true">
                                Info. General <span class="badge badge-danger">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-acti-tab" data-toggle="pill" href="#pill-a" role="tab" aria-controls="pill-a" aria-selected="false">
                                Actividad Economica <span class="badge badge-danger">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pill-c" role="tab" aria-controls="pill-c" aria-selected="false">
                                Contacto <span class="badge badge-danger">0</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pill-g" role="tabpanel" aria-labelledby="pills-general-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="razon" class="my-1 text-left w-100">Razon Social</label>
                                    <input type="text" id="razon" name="razon" class="form-control my-1" v-model="nuevainstitucion.razon_social" required>
                                </div>                            
                                <div class="col-md-6">
                                    <label for="nit" class="my-1 text-left w-100">Nit</label>
                                    <input type="text" id="nit" name="nit" class="form-control my-1" v-model="nuevainstitucion.nit" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                            
                                    <label for="tiempo" class="my-1 text-left w-100">Tiempo Constitucion</label>
                                    <select name="tiempo" id="tiempo" class="form-control custom-select" required>
                                        <option value="">--seleccionar--</option>
                                        <option value="-1">menos de un año</option>
                                        <option value="1-5">entre 1 y 5 años</option>
                                        <option value=">5">mayor a 5 años</option>
                                    </select>
                                </div>       
                                <div class="col-md-6">
                                    <label for="#ctg_item" class="my-1 text-left w-100">Numero Empleados</label>
                                    <input type="number" name="numero_empleados" class="form-control my-1" v-model="nuevainstitucion.num_empleados" required>
                                </div>                      
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="pill-a" role="tabpanel" aria-labelledby="pills-acti-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-1">
                                        <div class="col-md-5">
                                            <small><label for="ciiu" class="m-0">Valor a ingresar:</label></small>
                                            <input type="search" name="ciiu" id="ciiu" class="form-control mt-1" placeholder="Palabra clave o codigo" v-model="texto">
                                        </div>
                                        <div class="col-md-4">
                                            <small><label for="filtro" class="m-0">Filtrar por:</label></small>
                                            <select name="filtro" id="filtro" class="form-control mt-1" v-model="filtro">
                                                <option value="descripcion" selected>descripcion</option>    
                                                <option value="codigo">codigo</option>
                                            </select>    
                                        </div>    
                                        <div class="col-md-3">
                                            <div class="d-flex justify-content-center align-items-end h-100">
                                                <button type="button" class="btn btn-warning w-100 mt-1" v-on:click="consultaCodCIIU">buscar <i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="resultado w-100 position-relative" style="height:250px; overflow-y: scroll; border:1px solid lightgray;">
                                        <ul class="list-group list-group-flush" data-spy="scroll" data-offset="20" v-if="estados.on !==null" id="listaActividadesConsultadas">
                                            <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(codigo,index) in estados.on">
                                                <p class="d-inline m-0">
                                                    <i class="fas fa-arrow-circle-right"></i>
                                                    @{{codigo.descripcion}}
                                                </p>
                                                <input type="checkbox" v-bind:id="'cod' + '_' + index" v-bind:value="codigo.seccion + codigo.codigo + ':' + codigo.id_clase " v-bind:placeholder="codigo.descripcion" v-on:change="verificarActividadesEconomicas">
                                            </li>
                                        </ul>
                                        <div class="estado" id="estado">
                                            <div class="icon">                                    
                                            </div>
                                            <div class="texto">                                    
                                            </div>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h3 mt-3" style="font-weight:450;">Actividades Selecionadas</h3>                                
                                    <div id="actividades_seleccionadas">                                    
                                        <div class="alert alert-secondary" v-if="act_seleccionadas.length == 0" id="actividades">
                                            <h5 class="h5" style="font-weight:450;">Listado vacio.</h5>
                                            <hr>
                                            <p>Debe seleccionar maximo 4 actividades.</p>
                                        </div>
                                        <div v-else>
                                            <p class="text-danger">
                                                <i class="fas fa-arrow-right"></i> Por favor seleccione la actividad <b>primaria</b>.
                                            </p>
                                            <ul class="list-group">
                                                <li v-for="(actividad, index) in act_seleccionadas" class="list-group-item position-relative">                                                                                            
                                                    <input type="radio" name="primaria" v-bind:id="'primaria' + '_' + index"  v-bind:value="actividad.split(':')[1]" class="position-absolute up-right" required>
                                                    <button type="button" class="btn btn-primary btn-sm" v-on:click="quitarActividad(index, actividad.split(':')[0])">
                                                        <i class="fas fa-times-circle"></i>
                                                    </button>
                                                    <p class="d-inline">                                                
                                                        <b>@{{ actividad.split(':')[0] }}</b>:@{{ actividad.split(':')[2] }}
                                                    </p>
                                                    <input type="hidden" name="codigos[]" v-bind:value="actividad.split(':')[0] + '/' + actividad.split(':')[1]">
                                                </li>
                                            </ul>
                                        </div>                                    
                                    </div>                            
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pill-c" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="mail" class="my-1 text-left w-100">Correo Electronico</label>                            
                                    <input type="email" name="email" id="mail" class="form-control my-1" v-model="nuevainstitucion.correo" required>
                                </div> 
                                <div class="col-md-6">
                                    <label for="telefono" class="my-1 text-left w-100">Telefono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control my-1" v-model="nuevainstitucion.telefono" required>
                                </div>                        
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="direccion" class="my-1 text-left w-100">Direccion</label>                            
                                    <textarea name="direccion" id="direccion" class="form-control my-1" cols="30" rows="5" v-model="nuevainstitucion.direccion" required></textarea>
                                </div>                        
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" v-on:click="validarFormulario2">Enviar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>