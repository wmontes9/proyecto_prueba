<form action="{{route('linea.store')}}" method="post">
	{{csrf_field()}}
	<div class="modal fade" id="newLinea">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<input type="hidden" value="{{ Session::get('grupo') }}" name="id_grupo_investigacion">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control">
						@if($errors->has("nombre"))
							<p class="text-danger">{{$errors->first("nombre")}}</p>
						@endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Crear</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>