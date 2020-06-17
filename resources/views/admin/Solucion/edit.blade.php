<form enctype="multipart/form-data" id="formUpdateSolucion" action="" method="POST">
    {{csrf_field()}}
    @method('put')
    <div class="modal fade" id="editSolucion">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                    <h3 class="text-center">Editar solución</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" :value="'{{url('admin/solucion/')}}/'" id="ruta" class="form-control">
						<!--<div class="form-group">
							
							<label for="type">Reto</label>
							
							<select name="id_reto" v-model="fillSolucion.id_reto" class="form-control">
								<option value="">--seleccionar--</option>
								<option v-for="reto in retos" v-bind:value="reto.id_reto">@{{reto.enunciado}}</option>
							</select>
						</div>-->
						<div class="form-group">
							<label for="">Título</label>
							
							<input type="text" name="titulo" v-model="fillSolucion.titulo" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="">Justificación</label>
							<textarea class="form-control" rows="2" name="justificacion" v-model="fillSolucion.justificacion" required>
							</textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Planteamiento</label>
							<textarea class="form-control" rows="2" name="planteamiento" v-model="fillSolucion.planteamiento" required>
							</textarea>
						</div>
						<div class="form-group">
							<label for="">Referencias</label>
							<textarea class="form-control" rows="2" name="referencias" v-model="fillSolucion.referencias" required>
							</textarea>
						</div>
					</div>
				</div>
				<div class="row">
						<div class="form-group col-md-12">
							<label for="">Imagen</label>
							<input type="file" id="image_solucion" name="image_solucion"  class="form-control">
						</div>
						<div class="form-group col-md-12">
							<label for="">Imagen</label>
							<img :src="'{{asset('storage/imgSolucion')}}' +'/'+ fillSolucion.image_solucion" class="img-fluid" alt="Responsive image">
						</div>
				</div>
				<div class="row">	
						<div class="form-group col-md-12 text-center">
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>