<div class="modal fade" id="editReto">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
			<div class="modal-header">
				<h3 class="text-center">Editar reto</h3>					
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" enctype="multipart/form-data" id="formUpdateReto" method="POST">
                {{csrf_field()}}
				@method('put')
                <form-wizard @on-complete="onCompletee" 
                            shape="circle"
                            color="#E06F12"
                            next-button-text="Siguiente"
                            title="Retos empresariales" 
                            subtitle="Formula su reto a partir de las oportunidades y/o necesidades de su organización"
                            back-button-text="Atras"
                            finish-button-text="Guardar cambios">
                    <tab-content title="Datos básicos"
                                icon="ti-tag">
                                <div class="form-group">
									<label for="">1. Título del reto</label>
									<input type="hidden" :value="'{{url('admin/retos/')}}/'" id="ruta" class="form-control">
                                    <input type="text" name="titulo" v-model="fillReto.titulo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">2. Pregunta retadora</label>
                                    <textarea class="form-control" rows="2" name="pregunta" v-model="fillReto.pregunta" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">3. ¿Cuál es la necesidad existente?</label>
                                    <textarea class="form-control" rows="2" name="necesidad" v-model="fillReto.necesidad" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">4. ¿Cuáles son las causas que genera la necesidad existente?</label>
                                    <textarea class="form-control" rows="2" name="causas" v-model="fillReto.causas" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">5. ¿Cuáles son las posibles consecuencias que genera la necesidad existente?</label>
                                    <textarea class="form-control" rows="2" name="consecuencias" v-model="fillReto.consecuencias" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">6. ¿Cuál es la comunidad interesada en el reto?</label>
                                    <textarea class="form-control" rows="2" name="interesados" v-model="fillReto.interesados" required>
                                    </textarea>
                                </div>
                    </tab-content>
                    <tab-content title="Información adicional"
                                icon="ti-settings">
                                <div class="form-group">
                                    <label for="">7. ¿En qué región se ubica el reto?</label>
                                    <textarea class="form-control" rows="2" name="region" v-model="fillReto.region" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">8. ¿Cómo se llega al sitio en donde se ubica el reto?</label>
                                    <textarea class="form-control" rows="2" name="ubicacion" v-model="fillReto.ubicacion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">9. ¿Cuáles son las condiciones del entorno?</label>
                                    <textarea class="form-control" rows="2" name="condicion_e" v-model="fillReto.condicion_e" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">10. ¿Cuál es el tiempo estimado para la ejecución de la solución al reto?</label>
                                    <textarea class="form-control" rows="2" name="tiempo_e" v-model="fillReto.tiempo_e" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">11. ¿Qué nos imaginamos como posible solución?</label>
                                    <textarea class="form-control" rows="2" name="p_solucion" v-model="fillReto.p_solucion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">12. ¿Qué alcance debe tener la solución?</label>
                                    <textarea class="form-control" rows="2" name="alcance" v-model="fillReto.alcance" required>
                                    </textarea>
                                </div>
                    </tab-content>
                    <tab-content title="Ultimo paso"
                                icon="ti-check">
                                <div class="form-group">
                                    <label for="">13. ¿Qué condición fundamental debe cumplirse al presentar una propuesta?</label>
                                    <textarea class="form-control" rows="2" name="condicion_fp" v-model="fillReto.condicion_fp" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">14. ¿Qué acciones concretas se han realizado previamente en torno al reto planteado?</label>
                                    <textarea class="form-control" rows="2" name="acciones_c" v-model="fillReto.acciones_c" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">15. ¿Qué conocimientos o qué tipo de recursos podría existir en el lugar para ayudar en la implementación de la solución?</label>
                                    <textarea class="form-control" rows="2" name="recursos_e" v-model="fillReto.recursos_e" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">16. ¿Qué elementos se deben tener en cuenta para proponer una solución?</label>
                                    <textarea class="form-control" rows="2" name="elementos_ps" v-model="fillReto.elementos_ps" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">17. ¿Cómo se evaluarán las propuestas de solución que se presenten para este reto?</label>
                                    <textarea class="form-control" rows="2" name="evaluacion" v-model="fillReto.evaluacion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">18. Estado: </label>
                                    <!--<input type="checkbox" name="estado" :value="fillEvento.estado" v-model="fillEvento.estado" />-->
                                    <input type="radio" value="false" name="estado" v-model="fillReto.estado">
                                    <label for="uno">Inactivo</label>
                                    <input type="radio" value="true" name="estado" v-model="fillReto.estado">
                                    <label for="Dos">Activo</label>
                                </div>
                                <div class="form-group">
									<label for="">Imagen</label>
									<input type="file" id="url_imagen_e" name="url_imagen_e"  class="form-control">
								</div>
								<div class="form-group">
									<label for="">Imagen</label>
									<img :src="'{{asset('storage/imgReto')}}' +'/'+ fillReto.url_imagen" class="img-fluid" alt="Responsive image">
								</div>
                    </tab-content>
                </form-wizard>
            </form>
			
		</div>
	</div>
</div>
