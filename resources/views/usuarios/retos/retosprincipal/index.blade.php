
@extends('layouts.inicio')

@section('content')
<a href="{{url('/')}}?page=generar_pdf&id={{ $reto->id_reto}}"><img src="{{url('img/pdf.png')}}" width="6%" class="img-fluid">Descargar PDF</a><span></span>
<div class="row">
    <div class="col-md-12 text-center">
        {{ $reto->titulo }}
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <img src="{{url('storage/imgReto')}}/{{ $reto->url_imagen }}" id="img-reto" alt="imagen" class="img-fluid">
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
<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{url('/')}}?page=generar_pdf&id={{ $reto->id_reto}}"><img src="{{url('img/pdf.png')}}" width="6%" class="img-fluid">Descargar PDF</a><span></span>
    </div>
</div>
@endsection