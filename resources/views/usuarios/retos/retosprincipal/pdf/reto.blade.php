<div class="contenido">
    <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-2">
        <img src="{{public_path('img/innexsa.png')}}" width="10%" class="img-fluid">
    </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h4>{{ $reto->titulo }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5><u>Imagen reto</u></h4></label>
            <img src="{{ public_path('storage/imgReto/') }}{{ $reto->url_imagen }}" id="img-reto" alt="imagen" class="img-fluid" style="width: 720px; ">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>1. <u>Pregunta retadora</u></h4></label>
            <p>{{ $reto->pregunta }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>2. <u>Necesidad existente</u></h4></label>
            <p>{{ $reto->necesidad }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>3. <u>Causas</u></h4></label>
            <p>{{ $reto->causas }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>4. <u>Consecuencias</u></h4></label>
            <p>{{ $reto->consecuencias }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>5. <u>Interesados</u></h4></label>
            <p>{{ $reto->interesados }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>6. <u>Región</u></h4></label>
            <p>{{ $reto->region }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>7. <u>Ubicación</u></h4></label>
            <p>{{ $reto->ubicacion }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>8. <u>Condición existente</u></h4></label>
            <p>{{ $reto->condicion_e }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>9. <u>Tiempo de ejecución</u></h4></label>
            <p>{{ $reto->tiempo_e }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>10. <u>Posible solución</u></h4></label>
            <p>{{ $reto->p_solucion }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>11. <u>Alcance</u></h4></label>
            <p>{{ $reto->alcance }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>12.<u>Condición fundamental de la propuesta</u></h4></label>
            <p>{{ $reto->condicion_e }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>13. <u>Acciones concretas</u></h4></label>
            <p>{{ $reto->acciones_c }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>14. <u>Recursos existentes</u></h4></label>
            <p>{{ $reto->recursos_e }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>15. <u>Elementos para proponer solución</u></h4></label>
            <p>{{ $reto->elementos_ps }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h5>16. <u>Criterios de evaluación</u></h4></label>
            <p>{{ $reto->evaluacion }}</p>
        </div>
    </div>
</div>
