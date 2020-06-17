<div id="crearGrupo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center w-50">Grupo de investigación</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('investigacion.crear_grupo')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="enunciado">Sigla</label>
                        <input type="text" name="sigla" id="sigla" class="form-control" required>    
                    </div>    
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <textarea name="nombre" id="nombre" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Guardar</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>