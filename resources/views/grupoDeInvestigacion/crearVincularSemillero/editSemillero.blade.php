<form  v-on:submit.prevent="updateSemillero(fillSemillero.id)">
    <div class="modal fade" id="editSemillero">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">Semillero de investigacion</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class=" form-group row"> 
                       <div class="col-md-6">
                            <label for="area">Area Conocimiento</label>
                            <select v-model="fillSemillero.id_area_conocimiento" name="id_area_conocimiento" id="id_area_conocimiento" class="form-control" >
                            <option v-for="area in areas" v-bind:value="area.id_area_conocimiento">@{{area.nombre}}</option>
                            </select>
                    	</div>
					</div>

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <textarea class="form-control" rows="2" name="nombre" v-model="fillSemillero.nombre">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Sigla</label>
                        <textarea class="form-control" rows="2" name="sigla" v-model="fillSemillero.sigla">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Logo</label>
                        <textarea class="form-control" rows="2" name="logo" v-model="fillSemillero.logo">
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