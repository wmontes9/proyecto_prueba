<div class="modal fade" id="editReto">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="text-center">Editar reto</h3>					
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" enctype="multipart/form-data" id="formUpdateReto" method="POST">
				{{csrf_field()}}
				@method('put')
				<div class="modal-body">
					<div class="form-group">
						<label for="">Título</label>
						<input type="hidden" :value="'{{url('admin/retos/')}}/'" id="ruta" class="form-control">
						<input type="text" name="titulo" v-model="fillReto.titulo" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Pregunta retadora</label>
						<textarea class="form-control" rows="2" name="pregunta" v-model="fillReto.pregunta" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">1. ¿Cuál es la necesidad existente?</label>
						<textarea class="form-control" rows="2" name="necesidad" v-model="fillReto.necesidad" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">2. ¿Cuáles son las causas que genera la necesidad existente?</label>
						<textarea class="form-control" rows="2" name="causa" v-model="fillReto.causa" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">3. ¿Cuáles son las posibles consecuencias que genera la necesidad existente?</label>
						<textarea class="form-control" rows="2" name="consecuencia" v-model="fillReto.consecuencia" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">4. ¿Cuál es la comunidad interesada en el reto?</label>
						<textarea class="form-control" rows="2" name="interesados" v-model="fillReto.interesados" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">5. ¿Cuál es el tiempo estimado para la ejecución de la solución al reto?</label>
						<textarea class="form-control" rows="2" name="tiempo_ejecucion" v-model="fillReto.tiempo_ejecucion" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">6. ¿En qué lugar se ubica el reto?</label>
						<textarea class="form-control" rows="2" name="lugar" v-model="fillReto.lugar" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">7. ¿Cuáles son las condiciones del entorno?</label>
						<textarea class="form-control" rows="2" name="condicion_e" v-model="fillReto.condicion_e" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">8. ¿Qué nos imaginamos como posible solución?</label>
						<textarea class="form-control" rows="2" name="p_solucion" v-model="fillReto.p_solucion" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">9. ¿Qué alcance debe tener la solución?</label>
						<textarea class="form-control" rows="2" name="alcance" v-model="fillReto.alcance" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">10. ¿Qué condición fundamental debe cumplirse al presentar una propuesta?</label>
						<textarea class="form-control" rows="2" name="condicion_p" v-model="fillReto.condicion_p" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">11. ¿Qué acciones concretas se han realizado previamente en torno al reto planteado?</label>
						<textarea class="form-control" rows="2" name="accion" v-model="fillReto.accion" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">12. ¿Qué conocimientos o qué tipo de recursos podría existir en el lugar para ayudar en la implementación de la solución?</label>
						<textarea class="form-control" rows="2" name="conocimiento" v-model="fillReto.conocimiento" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">13. ¿Qué elementos se deben tener en cuenta para proponer una solución?</label>
						<textarea class="form-control" rows="2" name="elementos" v-model="fillReto.elementos" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">14. ¿Cómo debe ser la solución?</label>
						<textarea class="form-control" rows="2" name="descripcion_s" v-model="fillReto.descripcion_s" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">15. ¿Cómo se evaluarán las propuestas de solución que se presenten para este reto?</label>
						<textarea class="form-control" rows="2" name="evaluacion" v-model="fillReto.evaluacion" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">Imagen</label>
						<input type="file" id="url_imagen_e" name="url_imagen_e"  class="form-control">
					</div>
					<div class="form-group">
						<label for="">Imagen</label>
						<img :src="'{{asset('storage/imgReto')}}' +'/'+ fillReto.url_imagen" class="img-fluid" alt="Responsive image">
					</div>
					
					<div class="form-group d-flex justify-content-between">
						<button type="submit" class="btn btn-primary">Actualizar</button>
						<button type="button" class="btn btn-warning" v-on:click="publicarReto(fillReto.id_reto)">Publicar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
