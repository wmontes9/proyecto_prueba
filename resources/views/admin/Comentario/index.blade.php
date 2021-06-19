@extends("layouts.app")
@section("content")
<div class="container" style="background-color: rgba(40, 14, 4, 0.6); color: #fff;">
<div class="row text-center">
    <h3>Comentarios</h3>
</div>
<div class="row" id="appComentarios">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <a href="#newComentario" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</a>
                    <hr>
            <div class="clearfix"></div>
            <table id="comentarioindex" class="table table-responsive" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Id usuario</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(comentario, index) in comentarios">
                        <td>@{{index}}</td>
                        <td>@{{comentario.id_usuario}}</td>
                        <td>@{{comentario.descripcion}}</td>
                        <td>@{{comentario.estado}}</td>
                       
                        <td><a v-if="comentario.estado != 'true'" href="" v-on:click.prevent="editComentario(comentario)"><i class="far fa-edit"></i></a></td>
            
                        <td><a v-if="comentario.estado != 'true'" href="" v-on:click.prevent="deleteComentario(comentario.id)"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <vue-editor v-model="content"></vue-editor>
        </div>
    
    </div>
    @include("admin.Comentario.create")
    @include("admin.Comentario.edit")
</div>
</div>
<script type="text/javascript" src="{{asset('js/controller/Comentarios/ComentarioController.js')}}"></script>
@endsection