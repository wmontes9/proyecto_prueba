<form v-on:submit.prevent="createSublinea()">
	<div class="modal fade" id="newSubLinea">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Sublineas{{Session::get("linea")}}</h3>
				</div>
				<div class="modal-body">
					<input type="hidden" value="{{Session::get('linea')}}" name="linea">
					<div class="form-group">
						<label for="">Nombre</label>
						<input type="text" class="form-control" name="nombre" v-model="nombre">
					</div>
				</div>       
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</form>
