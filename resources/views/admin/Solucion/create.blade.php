<form enctype="multipart/form-data" action="{{route('solucion.store')}}" method="POST">
	{{csrf_field()}}
	<div class="modal fade" id="newSolucion">
		<div class="modal-dialog modal-xl">
			<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
				<div class="modal-header">
                    <h3 class="text-center">Solución</h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">
					<form-wizard @on-complete="onComplete" 
						shape="circle"
						color="#E06F12"
						next-button-text="Siguiente"
						title="Soluciones empresariales" 
						subtitle="Formula su solución de acuerdo a la información del reto"
						back-button-text="Atras"
						finish-button-text="Enviar solución">
                    <tab-content title="Datos básicos"
						icon="ti-tag">
								
						<div class="form-group">
							<label for="type">Reto</label>
							<select name="id_reto" class="form-control">
								<option value="">--seleccionar--</option>
								<option v-for="reto in retos" v-bind:value="reto.id_reto">@{{reto.titulo}}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Título</label>
							<input type="text" name="titulo" v-model="titulo" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="">Justificación</label>
							<textarea class="form-control" rows="2" name="justificacion" v-model="justificacion" required>
							</textarea>
						</div>
					</tab-content>
                    <tab-content title="Información adicional">
						<div class="form-group">
							<label for="">Planteamiento</label>
							<textarea class="form-control" rows="2" name="planteamiento" v-model="planteamiento" required>
							</textarea>
						</div>
						<div class="form-group">
							<label for="">Referencias</label>
							<textarea class="form-control" rows="2" name="referencias" v-model="referencias" required>
							</textarea>
						</div>
						<div class="form-group">
							<label for="">Imagen</label>
							<input type="file" id="image_solucions" name="image_solucions"  class="form-control" required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Crear</button>
						</div>
					</tab-content>				
				</div>
			</div>
		</div>
	</div>
</form>