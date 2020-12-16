<form v-on:submit.prevent="createSectorEconomico()">
	<div class="modal fade" id="newSectorEconomico">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
				<div class="modal-header">
					<h3 class="text-center">Sector económico</h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">
					
					<div class="form-group">
						<label for="">Nombre</label>
						<input type="text" v-model="nombre" class="form-control" required>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>				
				</div>
			</div>
		</div>
	</div>
</form>