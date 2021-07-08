<div class="modal fade" id="editEvento">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
			<div class="modal-header">
				<h3 class="text-center">Editar evento</h3>					
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form enctype="multipart/form-data" id="formUpdateEvento" action="" method="POST">
                {{csrf_field()}}
                @method('put')
                <form-wizard @on-complete="onComplete" 
                            shape="circle"
                            color="#E06F12"
                            next-button-text="Siguiente"
                            title="Eventos" 
                            subtitle="Actualizar su evento"
                            back-button-text="Atras"
                            finish-button-text="Enviar cambios">
                    <tab-content title="Datos básicos"
                                icon="ti-tag">
                                <div class="form-group">
                                    <label for="">1. Título del evento</label>
                                    <input type="hidden" :value="'{{url('eventos/')}}/'" id="ruta" class="form-control">
                                    <input type="text" name="titulo" v-model="fillEvento.titulo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">2. Subtítulo</label>
                                    <textarea class="form-control" rows="2" name="subtitulo" v-model="fillEvento.subtitulo" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">3. Descripción</label>
                                    <textarea class="form-control" rows="2" name="descripcion" v-model="fillEvento.descripcion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">4. Lugar</label>
                                    <textarea class="form-control" rows="2" name="lugar" v-model="fillEvento.lugar" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">5. Objetivo del evento</label>
                                    <textarea class="form-control" rows="2" name="objetivo" v-model="fillEvento.objetivo" required>
                                    </textarea>
                                </div>
                    </tab-content>
                    <tab-content title="Datos adicionales"
                                icon="ti-check">
                                <div class="form-group">

                                    <label>6. Fecha del evento</label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""><li>Fecha inicio</li></label>
                                        <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" v-model="fillEvento.fecha_inicio" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=""><li>Fecha fin</li></label>
                                        <input class="form-control" type="date" name="fecha_fin" v-model="fillEvento.fecha_fin" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">7. Ponentes</label>
                                    <textarea class="form-control" rows="2" name="ponentes" v-model="fillEvento.ponentes" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">8. Imagen del evento</label>
                                    <input type="file" id="url_imagen" name="url_imagen" class="form-control" required>
                                </div>
                                <div class="form-group">
									<label for="">9. Imagen evento</label>
									<img :src="'{{asset('storage/imgEvento')}}' +'/'+ fillEvento.url_imagen" class="img-fluid" alt="Responsive image">
								</div>
                                @if(Session::get('rolActual') == 6)
                                    <div class="form-group">
                                        <label for="">10. Estado: </label>
                                        <!--<input type="checkbox" name="estado" :value="fillEvento.estado" v-model="fillEvento.estado" />-->
                                        <input type="radio" value="false" name="estado" v-model="fillEvento.estado">
                                        <label for="uno">Inactivo</label>
                                        <input type="radio" value="true" name="estado" v-model="fillEvento.estado">
                                        <label for="Dos">Activo</label>
                                    </div>
                                @endif
                    </tab-content>
                </form-wizard>
            </form>
			
		</div>
	</div>
</div>