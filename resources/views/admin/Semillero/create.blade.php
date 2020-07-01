<form v-on:submit.prevent="createSemillero()">
	<div class="modal fade" id="newSemillero">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Semillero</h2>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nombre</label>
						<input type="text" name="nombre" v-model="nombre" class="form-control" placeholder="Introducir nombre">
					</div>
					<div class="form-group">
						<label for="">Sigla</label>
						<input type="text" name="sigla" v-model="sigla" class="form-control" placeholder="Introducir sigla">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Crear</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
