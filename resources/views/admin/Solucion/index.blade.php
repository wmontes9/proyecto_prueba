@extends("layouts.app")
@section("content")
<div class="container" style="background-color: rgba(40, 14, 4, 0.6); color: #fff;">
<div class="row text-center">
    <h3>Soluciones</h3>
</div>
<div class="row" id="appSoluciones">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="#newSolucion" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>
            <div class="clearfix"></div>
            <table id="solucionindex" class="table table-responsive" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <!--<th style="width: 350px;">Descripción</th>
                        <th style="width: 200px;">Imagen</th>-->
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="solucion in solucions">
                        <td>@{{solucion.id_solucion}}</td>
                        <td><a href="" v-on:click.prevent="solucion(solucion.id_solucion)">@{{solucion.titulo}}</a></td>
                        <!--<td>@{{reto.descripcion}}</td>
                        <td><img :src="'{{url('/imgreto')}}/'+reto.url_imagen" class="img-responsive" width="100%"></td>
                        -->
                        <td><a href="" v-on:click.prevent="editSolucion(solucion)"><i class="far fa-edit"></i></a></td>
                        <td><a href="" v-on:click.prevent="deleteSolucion(solucion.id_solucion)"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
    </div>
    @include("admin.Solucion.create")
    @include("admin.Solucion.edit")
</div>
</div>
<script type="text/javascript" src="{{asset('js/controller/SolucionController.js')}}"></script>
@endsection