<!--Modal Insertar Institucion-->
<div id="agregar_ciiu" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h3 class="modal-title text-center w-50">Agregar Actividad Economica(CIIU)</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="formEmpresa" method="POST" action="{{route('actualizarActividades')}}">
                        @csrf                     
                        <input type="hidden" name="institucion" v-bind:value="institucion.id_institucion">
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
                                            <li class="list-group-item d-flex justify-content-between align-items-center" 
                                                v-for="(codigo,index) in estados.on" 
                                                v-if="!verificarActSelectionadas(codigo.seccion + codigo.codigo).length > 0">
                                                <p class="d-inline m-0">
                                                    <i class="fas fa-arrow-circle-right"></i>
                                                    @{{codigo.descripcion}}
                                                </p>
                                                <input type="checkbox" 
                                                    v-bind:id="'cod' + '_' + index" 
                                                    v-bind:value="codigo.seccion + codigo.codigo + ':' + codigo.id_clase " 
                                                    v-bind:placeholder="codigo.descripcion"                                                     
                                                    v-on:change="verificarActividadesEconomicas">
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
                                                <i class="fas fa-arrow-right"></i> Puede Agregar <b>@{{4 - act_seleccionadas.length }} </b> Actividad Economica.
                                            </p>
                                            <ul class="list-group">
                                                <li v-for="(actividad, index) in act_seleccionadas" class="list-group-item position-relative">                                                                                            
                                                    <input type="radio" name="primaria" v-bind:id="'primaria' + '_' + index"  v-bind:value="actividad.split(':')[1]" v-bind:checked="actividad.split(':')[3] !== null && actividad.split(':')[3] == 'primaria'" class="position-absolute up-right" required>                                                    
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
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">
                                Enviar Datos                                
                            </button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>