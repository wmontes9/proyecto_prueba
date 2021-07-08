<div class="item">
    <button type="button" data-toggle="collapse" data-target="#retosActions" class="button btn btn-warning dropdown-toggle content-button">
        <i class="fas fa-mountain"></i> Retos 
    </button>
    <div class="sub-list collapse" id="retosActions">
        <div class="item">
            <a href="{{route('retosUsuario')}}" class="button btn content-button">
                <i class="fas fa-user-tie"></i> Mis retos
            </a>
        </div>
        <div class="item">
            <a href="{{route('retosEmpresa')}}" class="button btn content-button">
                <i class="far fa-building"></i> Retos de la empresa
            </a>
        </div>        
    </div>
</div> 
<div class="item">
    <button type="button" data-toggle="collapse" data-target="#retosAction" class="button btn btn-warning dropdown-toggle content-button">
        <i class="far fa-lightbulb"></i> Soluciones 
    </button>
    <div class="sub-list collapse" id="retosAction">
        <div class="item">
            <a href="{{route('solucionesUsuario')}}" class="button btn content-button">
                <i class="fas fa-user-tie"></i> Mis soluciones
            </a>
        </div>
        <div class="item">
            <a href="{{route('solucionesEmpresa')}}" class="button btn content-button">
                <i class="far fa-building"></i> Soluciones de la empresa
            </a>
        </div>        
    </div>
</div> 
<div class="item">
    <a href="{{url('eventos')}}" class="button btn button-link btn-warning  content-button">
        <i class="fas fa-clipboard-check"></i> Eventos 
    </a>
</div>
<div class="item">
    <a href="{{url('admin/comentarios')}}" class="button btn button-link btn-warning content-button">
        <i class="fas fa-comments"></i> Comentarios 
    </a>
</div>
<!--<div class="item">
    <button type="button" class="button btn btn-warning content-button">
        <i class="far fa-lightbulb "></i> Soluciones 
    </button>
</div>-->