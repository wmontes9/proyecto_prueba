@if (Auth::user()->grupos->first()->pivot->estado == 0)
    <div class="alert alert-info">
        <div class="alert-heading">
            <h2 class="h2">Estado Inactivo</h2>    
        </div>    
        <hr>
        <p class="p-2 text-justify">
            La vinculacion a la empresa <b>{{$dts_institucion['razon_social']}}</b> se encuentra inactiva,
            por favor comunicarse con la institucion.
        </p>
    </div>   
@elseif(Auth::user()->grupos->first()->pivot->estado == 2)
    <div class="alert alert-warning">
        <div class="alert-heading">
            <h2 class="h2">Usuario Inhabilitado</h2>    
        </div>    
        <hr>
        <p class="p-2 text-justify">
            Este usuario se encuentra <b>inhabilitado</b>,
            por favor comunicarse con la institucion.
        </p>
    </div>
@else
@endif