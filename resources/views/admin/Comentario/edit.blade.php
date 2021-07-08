<form enctype="multipart/form-data" id="formUpdateComentario" action="" method="POST">
    {{csrf_field()}}
    @method('put')
    <div class="modal fade" id="editComentario">
		<div class="modal-dialog modal-xl">
			<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
				<div class="modal-header">
                    <h3 class="text-center">Editar comentario</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" :value="'{{url('admin/comentarios/')}}/'" id="ruta" class="form-control">
					<input type="hidden" name="id_usuario" v-model="fillComentario.id_usuario">
					<div class="form-group">
						<label for="">Descripción</label>
						<textarea class="form-control" rows="2" name="descripcion" v-model="fillComentario.descripcion" required>
						</textarea>
					</div>
					@if(Session::get('rolActual') == 6)
					<div class="form-group">
						<label for="">Estado: </label>
						<input type="radio" value="false" name="estado" v-model="fillComentario.estado">
						<label for="uno">Inactivo</label>
						<input type="radio" value="true" name="estado" v-model="fillComentario.estado">
						<label for="Dos">Activo</label>
					</div>
					@endif
					<div class="form-group col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>