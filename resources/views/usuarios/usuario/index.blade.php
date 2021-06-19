@extends('layouts.app')

@section('content')
<div class="container-fluid" id="actualizacionuser">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
               <!-- <div class="card-header">
                    <h3 class="title-weight text-center">{{ __('Registrarse') }}</h3>
                </div>-->
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{$error}}</li>        
                            @endforeach
                        </ul>
                    </div>
                    @endif 
                    <div class="col">
                        <p v-if="errores.length">
                            <b>Por favor tenga en cuenta lo siguiente:</b>
                            <ul>
                              <li v-for="erro in errores">@{{ erro }}</li>
                            </ul>
                        </p>
                        <form  enctype="multipart/form-data" action="" id="formUpdateUsuario" method="POST">
                        @csrf
                        @method('put')
                            <form-wizard @on-complete="onCompletee" 
                                shape="circle"
                                color="#E06F12"
                                next-button-text="Siguiente"
                                title="Formulario de actualización usuario" 
                                subtitle="Por favor actualice su información"
                                back-button-text="Atras"
                                finish-button-text="Actualizar">
                                <tab-content title="Datos básicos"
                                icon="ti-tag">
                                    <div class="form-group row">
                                    
                                        <label for="name">Nombres</label>
                                        <input type="hidden" :value="'{{url('perfilusuario')}}/'" id="ruta" class="form-control">

                                        <input type="text" v-model="fillusuario.nombre" name="name" id="name"  class="form-control @error('name') is-invalid @enderror" placeholder="Nombres" value="{{ old('name') }}" required/>
                                        
                                        <label for="last">Apellidos</label>
                                        <input type="text"v-model="fillusuario.apellido" name="lastname" id="last" class="form-control @error('lastname') is-invalid @enderror" placeholder="Apellidos" value="{{old('lastname')}}" required/>
                                        
                                        <div class=" form-group" v-if="fillusuario.url_imagen">
                                        <label for="">Imagen</label>
                                        <img :src="'{{asset('storage/imgUsuario')}}' +'/'+ fillusuario.url_imagen" class="img-fluid" alt="Responsive image">
                                        </div>

                                        <label for="">Imagen</label>
                                        <input type="file" id="url_imagen_e" name="url_imagen_e"  class="form-control">
                                
                                    </div>
                                </tab-content>
                                <tab-content title="Datos de contacto"
                                icon="ti-tablet">
                                    <div class=" form-group row"> 

                                        <label for="departamento">Departamento</label>
                                        <select name="departamento" id="departamento" class="form-control" @change="onChange()">
                                            <option value="">--Seleccionar--</option>
                                            <option v-for="departamento in departamentos" v-bind:value="departamento.id_departamento">@{{departamento.nombre}}</option>
                                        </select>

                                        <label for="municipio">Municipio</label>
                                        <select v-model="id_municipio" name="municipio" id="municipio" class="form-control">
                                            <option value="">--Seleccionar--</option>
                                            <option v-for="municipio in municipios" v-bind:value="municipio.id_municipio">@{{municipio.nombre}}</option>
                                        </select>

                                        <label for="address">Dirección</label>
                                        <input type="text" v-model="fillusuario.direccion" name="address" id="address" class="form-control" value="{{old('address')}}"/>

                                        <label for="phone">Teléfono</label>
                                        <input type="text" v-model="fillusuario.telefono" name="phone" id="phone" class="form-control" value="{{old('phone')}}"/>                                                                
                                    
                                    </div>    
                                </tab-content>
                                <tab-content title="Datos de la cuenta"
                                icon="ti-unlock">
                                    <div class="form-group row">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" v-model="fillusuario.email" name="email" id="email" class="form-control" value="{{old('email')}}"/>
                                    
                                        <label for="password" class="text-md-right">{{ __('Contraseña') }}</label>                                    
                                        <input id="password" v-model="password"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  autocomplete="new-password">
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                                      

                                        <label for="password_confirm" class="text-md-right">{{ __('Confirmar contraseña') }}</label>
                                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                                    
                                        <!--<div class="col d-flex justify-content-end align-items-end">
                                            <button type="submit" class="btn btn-warning w-100">Enviar</button>
                                        </div>-->
                                    </div>
                                </tab-content>
                            </form-wizard>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/controller/Usuarios/UsuarioController.js')}}"></script>
@endsection