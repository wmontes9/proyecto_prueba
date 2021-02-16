<!--<form  v-on:submit.prevent="updateGrupoInvestigacion(fillGrupo.id)"> -->

<form enctype="multipart/form-data" id="formUpdateLogo" action="" method="POST">
				{{csrf_field()}}
				@method('put') 
  <div class="modal fade" id="editGrupoInvestigacion">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">GrupoInvestigacion</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
              
                <div class="modal-body">
                    <div class="form-group">

                        <label for="">sigla</label>
                        <input type="hidden" :value="'{{url('grupoinvestigacion')}}/'" id="ruta" class="form-control">
                        <textarea class="form-control" rows="2" name="sigla" v-model="fillGrupo.sigla">
                        </textarea>
                        <label for="">Nombre</label>
                        <textarea class="form-control" rows="2" name="nombre" v-model="fillGrupo.nombre">
                        </textarea>
                        <!--<label for="">Logo</label>
                        <textarea class="form-control" rows="2" name="logo" v-model="fillGrupo.logo">
                        
                        </textarea> -->
                        <div class="form-group">
						<label for="">Imagen</label>
						<input type="file" id="logo" name="logo"  class="form-control">
					</div>
					<div class="form-group">
						<label for="">Imagen</label>
						<img :src="'{{asset('storage/imgGrupo')}}' +'/'+ fillGrupo.logo" class="img-fluid" alt="Responsive image">
					</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</form>