@extends("layouts.app_inicio")

@section("content")
<style>
.imgreto{
    height: 15em;
}
</style>
<div class="container-fluid">
    <div id="appSoluciones">
    <p>Soluciones</>
        <div class="row">
            <div class="col-md-4 col-xs-4" v-for="(solucion, index) in solucions" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">
                <!-- <h6>@{{reto.id}}</h6> -->
                <img :src="'{{asset('storage/imgSolucion')}}' +'/'+ solucion.image_solucion" class="img-thumbnail imgreto" alt="Responsive image">
                <p>@{{solucion.titulo}}</p>
                <div :id="'demo'+solucion.id_solucion" class="collapse text-justify">
                @{{solucion.justificacion}}
                </div>
                <button type="button" class="btn btn-info" data-toggle="collapse" :data-target="'#demo'+solucion.id_solucion">Leer  + -</button>
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
                            <a href="#" aria-label="Next" v-show="pag * NUM_RESULTS / solucions.length < 1" @click.prevent="pag += 1">
                                <span aria-hidden="true" class="btn btn-success">></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript" src="{{asset('js/Controller/SolucionUsuarioController.js')}}"></script>
@endsection