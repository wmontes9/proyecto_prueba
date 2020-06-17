@extends("layouts.app_inicio")

@section("content")
<style>
.imgreto{
    height: 15em;
}
</style>
<div class="container-fluid">
<div id="Retos">
        <div class="row">
            <div class="col-md-4 col-xs-4" v-for="(reto, index) in retos" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">
                <!-- <h6>@{{reto.id}}</h6> -->
                <img :src="'{{asset('storage/imgReto')}}' +'/'+ reto.url_imagen" class="img-thumbnail imgreto" alt="Responsive image">
                <p>@{{reto.titulo}}</p>
                <div :id="'demo'+reto.id_reto" class="collapse text-justify">
                @{{reto.pregunta}}
                </div>
                <button type="button" class="btn btn-info" data-toggle="collapse" :data-target="'#demo'+reto.id_reto">Leer  + -</button>
                <a href="" v-on:click.prevent="getSoluciones(reto.id_reto)">
                    <button type="button" class="btn btn-info">Soluciones</button>
                </a>
                <hr>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-11">
            </div>
            <div class="col-md-1">
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination text-center">
                        <li>
                            <a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                                <span aria-hidden="true" class="btn btn-dark"><</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="Next" v-show="pag * NUM_RESULTS / retos.length < 1" @click.prevent="pag += 1">
                                <span aria-hidden="true" class="btn btn-success">></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
</div>
    <script type="text/javascript" src="{{asset('js/controller/RetoUsuarioController.js')}}"></script>
@endsection