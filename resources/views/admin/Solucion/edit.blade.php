<form enctype="multipart/form-data" id="formUpdateSolucion" action="" method="POST">
    {{csrf_field()}}
    @method('put')
    <div class="modal fade" id="editSolucion">
		<div class="modal-dialog modal-xl">
			<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
				<div class="modal-header">
                    <h3 class="text-center">Editar solución</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form-wizard @on-complete="onCompletee" 
						shape="circle"
						color="#E06F12"
						next-button-text="Siguiente"
						title="Editar solución" 
						subtitle="Edite su solución de acuerdo a la información del reto"
						back-button-text="Atras"
						finish-button-text="Guardar cambios">
                    <tab-content title="Datos básicos"
                        icon="ti-tag">
						<input type="hidden" :value="'{{url('admin/solucion/')}}/'" id="ruta" class="form-control">
						<div class="form-group">
							
							<label for="type">Reto</label>
							
							<select name="id_reto" v-model="fillSolucion.id_reto" class="form-control">
								<option value="">--seleccionar--</option>
								<option v-for="reto in retos" v-bind:value="reto.id_reto">@{{reto.titulo}}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Título</label>
							
							<input type="text" name="titulo" v-model="fillSolucion.titulo" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="">Justificación</label>
							<textarea class="form-control" rows="2" name="justificacion" v-model="fillSolucion.justificacion" required>
							</textarea>
						</div>
					</tab-content>
                    <tab-content title="Información adicional">
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
						<div class="form-group">
							<label for="">Imagen</label>
							<input type="file" id="image_solucion" name="image_solucion"  class="form-control">
						</div>
						<div class="form-group">
							<label for="">Imagen</label>
							<img :src="'{{asset('storage/imgSolucion')}}' +'/'+ fillSolucion.image_solucion" class="img-fluid" alt="Responsive image"  width="50%">
						</div>	
						<div class="form-group col-md-12 text-center">
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
					</tab-content>
				</div>
			</div>
		</div>
	</div>
</form>