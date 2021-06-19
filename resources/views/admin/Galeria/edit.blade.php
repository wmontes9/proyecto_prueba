<div class="modal fade" id="editGaleria">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
			<div class="modal-header">
				<h3 class="text-center">Editar Galería</h3>					
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form enctype="multipart/form-data" id="formUpdateGaleria" action="" method="POST">
                {{csrf_field()}}
                @method('put')
                    <div class="form-group">
                        <input type="hidden" :value="'{{url('admin/galerias/')}}/'" id="ruta" class="form-control">
                        <label for="">1. Descripción</label>
                        <textarea class="form-control" rows="2" name="descripcion" v-model="fillGaleria.descripcion" required>
                        </textarea>
                    </div>
        
                    <div class="form-group">
                        <label for="">2. Imagen</label>
                        <img :src="'{{asset('storage/imgGaleria')}}' +'/'+ fillGaleria.url_imagen" class="img-fluid" alt="Responsive image">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Nueva imagen</label>
                        <input type="file" id="url_imagen" name="url_imagen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">10. Estado: </label>
                        <!--<input type="checkbox" name="estado" :value="fillEvento.estado" v-model="fillEvento.estado" />-->
                        <input type="radio" value="false" name="estado" v-model="fillGaleria.estado">
                        <label for="uno">Inactivo</label>
                        <input type="radio" value="true" name="estado" v-model="fillGaleria.estado">
                        <label for="Dos">Activo</label>
                    </div>
                    <div class="form-group col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
            </form>
			
		</div>
	</div>
</div>