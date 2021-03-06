@extends("layouts.app")

@section("content")
<div class="container" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
    <div class="row" id="Eventos">
        <div class="col-12">
            <form enctype="multipart/form-data" id="crearevento" action="{{route('eventos.store')}}" method="POST">
                {{csrf_field()}}
                <form-wizard @on-complete="onComplete" 
                            shape="circle"
                            color="#E06F12"
                            next-button-text="Siguiente"
                            title="Eventos" 
                            subtitle="Publica su evento"
                            back-button-text="Atras"
                            finish-button-text="Enviar evento">
                    <tab-content title="Datos básicos"
                                icon="ti-tag">
                                <div class="form-group">
                                    <label for="">1. Título del evento</label>
                                    <input type="text" name="titulo" v-model="titulo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">2. Subtítulo</label>
                                    <textarea class="form-control" rows="2" name="subtitulo" v-model="subtitulo" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">3. Descripción</label>
                                    <textarea class="form-control" rows="2" name="descripcion" v-model="descripcion" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">4. Lugar</label>
                                    <textarea class="form-control" rows="2" name="lugar" v-model="lugar" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">5. Objetivo del evento</label>
                                    <textarea class="form-control" rows="2" name="objetivo" v-model="objetivo" required>
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
                                        <?php 
                                            date_default_timezone_set('America/Bogota');
                                            $fecha_min = date('Y-m-d');
                                            $hora_min = date('H');
                        
                                        ?>
                                        <label><li>Fecha inicio</li></label>
                                        <input type="date" name="fecha_inicio" class="form-control" min="<?php echo $fecha_min; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><li>Fecha fin</li></label>
                                        <input type="date" name="fecha_fin" class="form-control" min="<?php echo $fecha_min; ?>">
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="">7. Ponentes</label>
                                    <textarea class="form-control" rows="2" name="ponentes" v-model="ponentes" required>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">8. Imagen del evento</label>
                                    <input type="file" id="url_imagen" name="url_imagen" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">9. url del evento</label>
                                    <input type="text" id="url_evento" name="url_evento" class="form-control" required>
                                </div>
                    </tab-content>
                </form-wizard>
            </form>
     </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/controller/Eventos/CrearEventoController.js')}}"></script>
@endsection