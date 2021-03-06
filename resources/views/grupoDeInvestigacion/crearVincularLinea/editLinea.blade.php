<form  v-on:submit.prevent="updateLineaInvestigacion(fillLinea.id)">
    <div class="modal fade" id="editLineaInvestigacion">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
                <div class="modal-header">
                    <h3 class="text-center">LineaInvestigacion</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class="form-group"> 
                            <label for="grupo">Grupo</label>
                            <select v-model="fillLinea.id_grupo_invest" name="id_grupo_invest" id="id_grupo_invest" class="form-control" >
                            <option v-for="grupo in grupos" v-bind:value="grupo.id">@{{grupo.nombre}}</option>
                            </select>
					</div>

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <textarea class="form-control" rows="2" name="nombre" v-model="fillLinea.nombre">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <textarea class="form-control" rows="2" name="descripcion" v-model="fillLinea.descripcion">
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>