@extends("layouts.app")

@section("content")
<div class="container" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
    <div class="row" id="Retosmult">
        <div class="col-12">
            <form enctype="multipart/form-data" id="creareto" action="{{route('retos.store')}}" method="POST">
                {{csrf_field()}}
                <form-wizard @on-complete="onComplete" 
                            shape="circle"
                            color="#E06F12"
                            next-button-text="Siguiente"
                            title="Retos empresariales" 
                            subtitle="Formula su reto a partir de las oportunidades y/o necesidades de su organización"
                            back-button-text="Atras"
                            finish-button-text="Enviar reto">
                    <tab-content title="Datos básicos"
                                icon="ti-tag">
                                <div class="form-group">
                                    <label for="">1. Título del reto</label>
                                    <input type="text" name="titulo" v-model="titulo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">2. Pregunta retadora</label>
                                    <textarea class="form-control" rows="2" name="pregunta" v-model="pregunta" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">3. ¿Cuál es la necesidad existente?</label>
                                    <textarea class="form-control" rows="2" name="necesidad" v-model="necesidad" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">4. ¿Cuáles son las causas que genera la necesidad existente?</label>
                                    <textarea class="form-control" rows="2" name="causas" v-model="causas" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">5. ¿Cuáles son las posibles consecuencias que genera la necesidad existente?</label>
                                    <textarea class="form-control" rows="2" name="consecuencias" v-model="consecuencias" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">6. ¿Cuál es la comunidad interesada en el reto?</label>
                                    <textarea class="form-control" rows="2" name="interesados" v-model="interesados" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="SECTOR">7. ¿En qué sector económico se encuentra el reto?</label>
                                    <select v-model="id_sector" name="id_sector" id="id_sector" class="form-control">
                                        <option value="">--Seleccionar--</option>
                                        <option v-for="sector in sectores" v-bind:value="sector.id_sector_economico">@{{sector.nombre}}</option>
                                    </select>
                                </div>
                    </tab-content>
                    <tab-content title="Información adicional"
                                icon="ti-settings">
                                <div class="form-group">
                                    <label for="">8. ¿En qué región se ubica el reto?</label>
                                    <textarea class="form-control" rows="2" name="region" v-model="region" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">9. ¿Cómo se llega al sitio en donde se ubica el reto?</label>
                                    <textarea class="form-control" rows="2" name="ubicacion" v-model="ubicacion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">10. ¿Cuáles son las condiciones del entorno?</label>
                                    <textarea class="form-control" rows="2" name="condicion_e" v-model="condicion_e" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">11. ¿Cuál es el tiempo estimado para la ejecución de la solución al reto?</label>
                                    <textarea class="form-control" rows="2" name="tiempo_e" v-model="tiempo_e" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">12. ¿Qué nos imaginamos como posible solución?</label>
                                    <textarea class="form-control" rows="2" name="p_solucion" v-model="p_solucion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">13. ¿Qué alcance debe tener la solución?</label>
                                    <textarea class="form-control" rows="2" name="alcance" v-model="alcance" required>
                                    </textarea>
                                </div>
                    </tab-content>
                    <tab-content title="Ultimo paso"
                                icon="ti-check">
                                <div class="form-group">
                                    <label for="">14. ¿Qué condición fundamental debe cumplirse al presentar una propuesta?</label>
                                    <textarea class="form-control" rows="2" name="condicion_fp" v-model="condicion_fp" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">15. ¿Qué acciones concretas se han realizado previamente en torno al reto planteado?</label>
                                    <textarea class="form-control" rows="2" name="acciones_c" v-model="acciones_c" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">16. ¿Qué conocimientos o qué tipo de recursos podría existir en el lugar para ayudar en la implementación de la solución?</label>
                                    <textarea class="form-control" rows="2" name="recursos_e" v-model="recursos_e" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">17. ¿Qué elementos se deben tener en cuenta para proponer una solución?</label>
                                    <textarea class="form-control" rows="2" name="elementos_ps" v-model="elementos_ps" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">18. ¿Cómo se evaluarán las propuestas de solución que se presenten para este reto?</label>
                                    <textarea class="form-control" rows="2" name="evaluacion" v-model="evaluacion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">19. Imagen del reto</label>
                                    <input type="file" id="url_imagen" name="url_imagen" class="form-control" required>
                                </div>
                    </tab-content>
                </form-wizard>
            </form>
     </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/controller/RetoControllerMult.js')}}"></script>
@endsection