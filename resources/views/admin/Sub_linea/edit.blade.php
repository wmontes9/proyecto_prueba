<form method="POST" v-on:submit.prevent="updateSublinea(fillSublinea.id)">
    <div class="modal fade" id="editSublinea">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h4 class="text-muted">Editar</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" name="nombre" v-model="fillSublinea.nombre" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
