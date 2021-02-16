<form  v-on:submit.prevent="updateSubLineaInvestigacion(fillSubLinea.id)">
    <div class="modal fade" id="editSubLineaInvestigacion">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">SubLinea de investigacion</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class=" form-group row"> 
                       <div class="col-md-6">
                            <label for="linea">Linea de investigacion </label>
                            <select v-model="fillSubLinea.id_linea_invest" name="id_linea_invest" id="id_linea_invest" class="form-control" >
                            <option v-for="linea in lineas" v-bind:value="linea.id">@{{linea.nombre}}</option>
                            </select>
                    	</div>
					</div>

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <textarea class="form-control" rows="2" name="nombre" v-model="fillSubLinea.nombre">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">descripcion</label>
                        <textarea class="form-control" rows="2" name="descripcion" v-model="fillSubLinea.descripcion">
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