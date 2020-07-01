<form enctype="multipart/form-data" action="{{route('retos.store')}}" method="POST">
	{{csrf_field()}}
	<div class="modal fade" id="newReto">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-center">Retos</h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">
					<p class="text-justify">Bienvenido al sistema de gestión de retos de INNEXSA.<br>
						El banco de retos de INNEXSA contempla el registro de retos empresariales de: Innovación, Investigación y Emprendimiento<br>
						Antes de diligenciar el formulario de registro de retos se recomienda leer detenidamente el documento de lineamientos de la construcción de retos, para evitar errores que pueden afectar la evaluación del reto y cargar los archivos adjuntos en el formato establecido.<br>
						Es importante resaltar que la formulación del reto parte de la identificación de un problema, necesidad u oportunidad, que se pretenden resolver o aprovechar; para ello se formula la pregunta retadora para luego describir la necesidad, los interesados, las condiciones,
						el alcance. e.t.c. Que deben ser coherentes con esa identificación previa.
					</p>
					<div class="form-group">
						<label for="">Título</label>
						<input type="text" name="titulo" v-model="titulo" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Pregunta retadora</label>
						<textarea class="form-control" rows="2" name="pregunta" v-model="pregunta" required>
						</textarea>
                    </div>
					<div class="form-group">
						<label for="">1. ¿Cuál es la necesidad existente?</label>
						<textarea class="form-control" rows="2" name="necesidad" v-model="necesidad" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">2. ¿Cuáles son las causas que genera la necesidad existente?</label>
						<textarea class="form-control" rows="2" name="causa" v-model="causa" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">3. ¿Cuáles son las posibles consecuencias que genera la necesidad existente?</label>
						<textarea class="form-control" rows="2" name="consecuencia" v-model="consecuencia" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">4. ¿Cuál es la comunidad interesada en el reto?</label>
						<textarea class="form-control" rows="2" name="interesados" v-model="interesados" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">5. ¿Cuál es el tiempo estimado para la ejecución de la solución al reto?</label>
						<textarea class="form-control" rows="2" name="tiempo_ejecucion" v-model="tiempo_ejecucion" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">6. ¿En qué lugar se ubica el reto?</label>
						<textarea class="form-control" rows="2" name="lugar" v-model="lugar" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">7. ¿Cuáles son las condiciones del entorno?</label>
						<textarea class="form-control" rows="2" name="condicion_e" v-model="condicion_e" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">8. ¿Qué nos imaginamos como posible solución?</label>
						<textarea class="form-control" rows="2" name="p_solucion" v-model="p_solucion" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">9. ¿Qué alcance debe tener la solución?</label>
						<textarea class="form-control" rows="2" name="alcance" v-model="alcance" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">10. ¿Qué condición fundamental debe cumplirse al presentar una propuesta?</label>
						<textarea class="form-control" rows="2" name="condicion_p" v-model="condicion_p" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">11. ¿Qué acciones concretas se han realizado previamente en torno al reto planteado?</label>
						<textarea class="form-control" rows="2" name="accion" v-model="accion" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">12. ¿Qué conocimientos o qué tipo de recursos podría existir en el lugar para ayudar en la implementación de la solución?</label>
						<textarea class="form-control" rows="2" name="conocimiento" v-model="conocimiento" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">13. ¿Qué elementos se deben tener en cuenta para proponer una solución?</label>
						<textarea class="form-control" rows="2" name="elementos" v-model="elementos" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">14. ¿Cómo debe ser la solución?</label>
						<textarea class="form-control" rows="2" name="descripcion_s" v-model="descripcion_s" required>
						</textarea>
					</div>
					<div class="form-group">
						<label for="">15. ¿Cómo se evaluarán las propuestas de solución que se presenten para este reto?</label>
						<textarea class="form-control" rows="2" name="evaluacion" v-model="evaluación" required>
						</textarea>
					</div>
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" id="url_imagen" name="url_imagen"  class="form-control" required>
					</div>
					<div class="cargar_archivo">
                        <p class="etiqueta_carga">Cargar soporte del reto<br>(ZIP : &#60;
                            200MB)</p>
                        <label for="cargar1" class="boton_carga">Cargar archivo</label>
                        <input type="file" name="cargar1" id="cargar1" accept="application/x-zip-compressed,.zip">
                    </div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>				
				</div>
			</div>
		</div>
	</div>
</form>