<form enctype="multipart/form-data" action="{{route('semilleros.store')}}" method="POST">
{{csrf_field()}}
	<div class="modal fade" id="newSemillero">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-center">Semillero de investigacion</h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">

					<div class=" form-group row"> 
                       <div class="col-md-6">
                            <label for="area">Area de conocimiento</label>
                            <select v-model="id_area_conocimiento" name="id_area_conocimiento" id="id_area_conocimiento" class="form-control" >
                            <option value="">--Seleccionar--</option>
                            <option v-for="area in areas" v-bind:value="area.id_area_conocimiento">@{{area.nombre}}</option>
                            </select>
                    	</div>
					</div>
					
                    <div class="form-group">
						<label for="">Nombre</label>
						<input type="text" v-model="nombre" class="form-control" required>
					</div>
                    <div class="form-group">
						<label for="">Sigla</label>
						<input type="text" v-model="sigla" class="form-control" required>
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