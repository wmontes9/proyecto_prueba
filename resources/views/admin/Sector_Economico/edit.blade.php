<form  v-on:submit.prevent="updateSectorEconomico(fillSector.id)">
    <div class="modal fade" id="editSectorEconomico">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
                <div class="modal-header">
                    <h3 class="text-center">Sector económico</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <textarea class="form-control" rows="2" name="nombre" v-model="fillSector.nombre">
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