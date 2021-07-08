<form enctype="multipart/form-data" action="{{route('comentarios.store')}}" method="POST">
	{{csrf_field()}}
	<div class="modal fade" id="newComentario">
		<div class="modal-dialog modal-xl">
			<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
				<div class="modal-header">
                    <h3 class="text-center">Comentario</h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Descripción</label>
						<textarea class="form-control" rows="2" name="descripcion" v-model="descripcion" required>
						</textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Crear</button>
					</div>				
				</div>
			</div>
		</div>
	</div>
</form>