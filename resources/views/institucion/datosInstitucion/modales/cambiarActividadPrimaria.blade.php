<div id="cambiar_primaria" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title w-50">Cambiar Actividad Primaria</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formEmpresa" method="POST" action="{{route('actualizarActividades')}}">
                    @csrf
                    <input type="hidden" name="institucion" v-bind:value="institucion.id_institucion">
                    <div class="alert-info border border-primary rounded d-flex justify-content-center align-items-center mb-2">
                        <i class="fas fa-info-circle fa-2x"></i>  
                        <p style="margin-top:.9em; margin-left:.5em;">Solo se pueden seleccionar las actividades definidas como secundarias.</p>
                    </div>
                    <div id="actividades_seleccionadas">
                        <div class="alert alert-secondary" v-if="act_seleccionadas.length == 0" id="actividades">
                            <h5 class="h5" style="font-weight:450;">Listado vacio.</h5>
                            <hr>
                            <p>Debe seleccionar maximo 4 actividades.</p>
                        </div>
                        <div v-else>                        
                            <ul class="list-group">
                                <li v-for="(actividad, index) in act_seleccionadas" class="list-group-item position-relative text-left">                                                                                            
                                    <input type="radio" name="primaria" v-bind:id="'primaria' + '_' + index"  v-bind:value="actividad.split(':')[1]" v-bind:checked="actividad.split(':')[3] !== null && actividad.split(':')[3] == 'primaria'" class="position-absolute up-right" required>                                                    
                                    <p class="d-inline">                                                
                                        <b>@{{ actividad.split(':')[0] }}</b>:@{{ actividad.split(':')[2] }}
                                    </p>
                                    <input type="hidden" name="codigos[]" v-bind:value="actividad.split(':')[0] + '/' + actividad.split(':')[1]">
                                </li>
                            </ul>
                        </div>                                    
                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Cambiar Actividad</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>