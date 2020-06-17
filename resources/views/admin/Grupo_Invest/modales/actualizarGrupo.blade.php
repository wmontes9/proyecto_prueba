<div class="modal fade" id="editGrupo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">Editar grupo</h3>					
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form :action="'{{url("admin/grupo")}}' + '/' + fillGrupo.id" enctype="multipart/form-data" id="formUpdateGrupo" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sigla</label>
                                {{-- <input type="hidden" value="" id="ruta" class="form-control"> --}}
                                <input type="text" name="sigla" v-model="fillGrupo.sigla" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <textarea class="form-control" rows="2" name="nombre" v-model="fillGrupo.nombre" required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Logo</label>
                                <input type="file" id="logo" name="logo"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <img :src="'{{asset('storage/imgGrupo')}}' +'/'+ fillGrupo.logo" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>                                                                               
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>