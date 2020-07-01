<div class="modal fade" id="agregarPermiso" tabindex="-1" role="dialog" aria-labelledby="Agregar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Agregar Permiso a</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('asignarPermisos') }}" id="agregarPermisos" method="post">
            @csrf
            <div class="modal-body">
                <ul id="permisosParaAsignar">
                    <li v-for="permiso in permisosParaAsignar">
                        @{{ permiso.placeholder }}
                    </li>
                </ul>
                <p>Asignar Permisos a:</p>
                <select name="grupo" id="grupo" class="form-control w-100 mb-1">
                    <option value="">--seleccionar--</option>
                    @foreach ($grupos as $grupo)
                        <option value="{{$grupo->id_grupo}}">{{$grupo->nombre}}</option>
                    @endforeach
                </select>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
        </div>
    </div>
</div>