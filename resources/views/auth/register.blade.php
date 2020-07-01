@extends('layouts.app')

@section('content')
<div class="container-fluid" id="registro">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2 class="title-weight text-center">{{ __('Crear cuenta') }}</h2>
                </div>
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
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div id="create_account">
                            <div id="basic_data">
                                <h2 class="h3">Datos básicos</h3>
                                <hr/>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="name">Nombres</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombres" value="{{old('name')}}"/>
                                    </div>
                                    <div class="col">
                                        <label for="last">Apellidos</label>
                                        <input type="text" name="lastname" id="last" class="form-control" placeholder="Apellidos" value="{{old('lastname')}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="type">Tipo de documento</label>
                                        <select name="document_type" id="type" class="form-control">
                                            <option value="">--seleccionar--</option>
                                            <option v-for="ident_type in identificationTypes" v-bind:value="ident_type.id_tipo_identificacion">(@{{ident_type.abreviatura}}) @{{ident_type.nombre}}</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="number_doc">Número de documento</label>
                                        <input type="text" name="number_doc" id="number_doc" class="form-control" placeholder="Documento" value="{{old('number_doc')}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="address">Dirección</label>
                                        <textarea name="address" id="address" cols="30" rows="4" class="form-control" >{{old('address')}}</textarea>
                                    </div>    
                                    <div class="col-md-6">
                                        <label for="phone">Teléfono</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}"/>
                                    </div>                                                                
                                </div>                                
                            </div>                            
                            <div id="account_data"> 
                                <h2 class="h3">Datos de la cuenta</h3>
                                <hr/>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="user">Nombre de usuario</label>
                                        <input type="text" name="nombre_usuario" id="user" class="form-control" value="{{old('user_name')}}"/>    
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="password" class="text-md-right">{{ __('Contraseña') }}</label>                                    
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                                      
                                    </div>    
                                    <div class="col">
                                        <label for="password_confirm" class="text-md-right">{{ __('Confirmar contraseña') }}</label>
                                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                                        
                                    </div>                            
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="rol">Rol</label>
                                        <select name="rol" id="rol" class="form-control ">
                                            <option value="">--Seleccionar--</option>
                                            <option v-if="rol.nombre != 'Administrador'" v-for="rol in roles" v-bind:value="rol.id_rol">@{{rol.nombre}}</option>
                                        </select>
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-end">
                                        <button type="submit" class="btn btn-warning w-100">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/controller/RegisterController.js') }}" defer></script>
@endsection