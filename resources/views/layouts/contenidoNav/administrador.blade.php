<div class="item">    
    <a href="{{route('permisos')}}" class="button btn button-link content-button">
        <i class="fas fa-unlock-alt"></i> Permisos
    </a>    
</div>
<div class="item">
    <a href="{{url('admin/user')}}" class="button btn button-link content-button">
        <i class="fas fa-users-cog"></i> Usuarios
    </a>
</div> 
<div class="item">
    <a href="{{url('admin/retos')}}" class="button btn button-link content-button">
        <i class="fas fa-mountain"></i> Retos
    </a>
</div> 
<div class="item">
    <a href="{{url('admin/solucion')}}" class="button btn button-link content-button">
        <i class="fas fa-balance-scale"></i> Soluciones 
    </a>
</div>
<div class="item">
    <a href="{{url('eventos')}}" class="button btn button-link content-button">
        <i class="fas fa-clipboard-check"></i> Eventos 
    </a>
</div>
<div class="item">
    <a href="{{url('SectorEconomico')}}" class="button btn button-link content-button">
        <i class="fas fa-boxes"></i> Sectores económicos 
    </a>
</div>
<div class="item">
    <a href="{{url('aliados_estrategicos')}}" class="button btn button-link content-button">
        <i class="fas fa-cubes"></i> Aliados estrategicos 
    </a>
</div>
<div class="item">
    <button type="button" data-toggle="collapse" data-target="#retosActions" class="dropdown-toggle button btn content-button">
        <i class="fas fa-binoculars"></i> Investigación 
    </button>
    <div class="sub-list collapse" id="retosActions">
        <div class="item">
            <a href="{{url('grupoinvestigacion')}}" class="button btn content-button">
                <i class="fas fa-users"></i> Grupos
            </a>
        </div>
        <div class="item">
            <a href="{{url('lineainvestigacion')}}" class="button btn content-button">
                <i class="fas fa-grip-lines"></i> Líneas
            </a>
        </div>  
        <div class="item">
            <a href="{{url('sublineainvestigacion')}}" class="button btn content-button">
                <i class="fas fa-sliders-h"></i> Sublíneas
            </a>
        </div>  
        <div class="item">
            <a href="areaconocimiento" class="button btn content-button">
                <i class="fab fa-grav"></i> Área de conocimiento
            </a>
        </div>
        <div class="item">
            <a href="{{url('semilleros')}}" class="button btn content-button">
                <i class="fas fa-snowflake"></i> Semilleros
            </a>
        </div>  
    </div>
</div> 
<!--<div class="item">
    <a class="button btn button-link content-button" href="#" id="navbardrop" data-toggle="dropdown">
    Investigación
    </a>
    <div class="dropdown-menu">
        <a class="button btn button-link content-button" href="#">Grupos</a>
        <a class="button btn button-link content-button" href="#">Líneas</a>
        <a class="button btn button-link content-button" href="#">Sublíneas</a>
        <a class="button btn button-link content-button" href="#">Areas de conocimiento</a>
        <a class="button btn button-link content-button" href="{{url('retos')}}">Retos</a>
    </div>
</div> -->
<div class="item">
    <a href="{{url('admin/comentarios')}}" class="button btn button-link content-button">
        <i class="fas fa-comments"></i> Comentarios 
    </a>
</div>
<div class="item">
    <a href="{{url('admin/galerias')}}" class="button btn button-link content-button">
        <i class="fas fa-images"></i> Galería 
    </a>
</div>
