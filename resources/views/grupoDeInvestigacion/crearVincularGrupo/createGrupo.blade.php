<!--<form enctype="multipart/form-data"  v-on:submit.prevent="createGrupoInvestigacion()" >-->
<form enctype="multipart/form-data" action="{{route('grupoinvestigacion.store')}}" method="POST">
{{csrf_field()}}
<div class="modal fade" id="newGrupoInvestigacion">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
				<div class="modal-header">
					<h3 class="text-center">Grupo investigacion </h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">
					
					<div class="form-group">
						<label for="">Sigla</label>
						<input type="text" v-model="sigla" name="sigla" class="form-control" required>
                        <label for="">Nombre</label>
						<input type="text" v-model="nombre" name="nombre"class="form-control" required>
                       <!-- <label for="">Logo</label>
						<input type="text" v-model="logo" class="form-control" required>-->
					</div>
					
					<div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" id="logo" name="logo"  class="form-control" required>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>				
				</div>
			</div>
		</div>
	</div>
</form>




