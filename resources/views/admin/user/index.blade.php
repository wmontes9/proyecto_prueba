@extends("layouts.app")
@section("content")
    <div class="container" style="background-color: rgba(40, 14, 4, 0.6); color: #fff;">
        <div class="row text-center">
            <h3>Usuarios</h3>
        </div>
        <div class="row" id="appuser">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @auth

                    @endauth
                    <div class="clearfix"></div>
                    <table id="userindex" class="table table-responsive" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Id_municipio</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Tipo documento</th>
                                <th scope="col">Número de identificación</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Administrador</th>
                                <th scope="col">Staf</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users">
                                <td scope="row">@{{user.id_usuario}}</td>
                                <td>@{{user.id_municipio}}</td>
                                <td><a href="" v-on:click.prevent="users(user.id_usuario)">@{{user.nombre}}</a></td>
                                <td>@{{user.apellido}}</td>
                                <td>@{{user.tipo_documento}}</td>
                                <td>@{{user.num_identificacion}}</td>
                                <td>@{{user.direccion}}</td>
                                <td>@{{user.telefono}}</td>
                                <td>@{{user.email}}</td>
                                <td>@{{user.password}}</td>
                                <td>@{{user.administrador}}</td>
                                <td>@{{user.staf}}</td>
                                <td>@{{user.activo}}</td>
                                <td>
                                    <img :src="'{{asset('storage/imgUsuario')}}/'+user.url_imagen" class="img-responsive" width="100%">
                                </td>
                                {{--@auth--}}
                                <td><a href="" v-on:click.prevent="editUser(user)"><i class="far fa-edit"></i></a></td>
                                {{--@endauth--}}
                                <td><a href="" v-on:click.prevent="deleteUser(user.id_usuario)"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @include("admin.user.edit")
        </div>
    </div>
<script src="{{asset('js/controller/Usuarios/UserController.js')}}"></script>
@endsection