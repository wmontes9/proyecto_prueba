<style>[v-cloak] { display: none; }</style>
<div class="modal fade" id="editUser" v-cloak>
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
			<div class="modal-header">
				<h3 class="text-center">Editar usuario</h3>					
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
                <form action="" enctype="multipart/form-data" id="formUpdateReto" method="POST">
                    {{csrf_field()}}
                    @method('put')
                    <form-wizard @on-complete="onComplete" 
                    shape="circle"
                    color="#E06F12"
                    next-button-text="Siguiente"
                    title="Formulario de actualización de datos" 
                    subtitle="Por favor completar la siguiente información"
                    back-button-text="Atras"
                    finish-button-text="Actualizar">
                    <tab-content title="Datos básicos"
                    icon="ti-tag">
                        <div class="form-group">
                        
                            <label for="name">Nombres</label>
                            <input type="text" v-model="filluser.nombre" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombres" value="{{old('name')}}" required/>
                            
                            <label for="last">Apellidos</label>
                            <input type="text"v-model="filluser.apellido" name="lastname" id="last" class="form-control @error('lastname') is-invalid @enderror" placeholder="Apellidos" value="{{old('lastname')}}" required/>
                        
                        </div>
                        <div class="form-group">
                            
                            <label for="type">Tipo de documento</label>
                            <select v-model="filluser.tipo_documento" name="document_type" id="type" class="form-control">
                                <option value="">--seleccionar--</option>
                                <option value="CC">Cédula de ciudadanía</option>
                                <option value="TI">Tarjeta de identidad</option>
                                <option value="CE">Cédula de extranjería</option>
                                <!--<option v-for="ident_type in identificationTypes" v-bind:value="ident_type.id_tipo_identificacion">(@{{ident_type.abreviatura}}) @{{ident_type.nombre}}</option>-->
                            </select>

                            <label for="filluser.number_doc">Número de documento</label>
                            <input type="text" v-model="filluser.num_identificacion" name="number_doc" id="number_doc" class="form-control" placeholder="Documento" value="{{old('number_doc')}}"/>
                            
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
                            <input type="text" v-model="filluser.direccion" name="address" id="address" class="form-control" value="{{old('address')}}"/>

                            <label for="phone">Teléfono</label>
                            <input type="text" v-model="filluser.telefono" name="phone" id="phone" class="form-control" value="{{old('phone')}}"/>                                                                
                        
                        </div>    
                    </tab-content>
                    <tab-content title="Datos de la cuenta"
                    icon="ti-unlock">
                        <div class="form-group row">
                            <label for="email">Correo electrónico</label>
                            <input type="email" v-model="filluser.email" name="email" id="email" class="form-control" value="{{old('email')}}"/>
                        
                            <label for="password" class="text-md-right">{{ __('Contraseña') }}</label>                                    
                            <input id="password" v-model="filluser.password"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif                                      

                            <label for="password_confirm" class="text-md-right">{{ __('Confirmar contraseña') }}</label>
                            <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                <label for="rol">Categoria</label>
                                <select v-model="filluser.rol" name="rol" id="rol" class="form-control ">
                                    <option value="">--Seleccionar--</option>
                                    <option   v-for="rol in roles"  v-bind:value="rol.id_grupo">@{{rol.nombre}}</option>
                                </select>
                        
                            <!--<div class="col d-flex justify-content-end align-items-end">
                                <button type="submit" class="btn btn-warning w-100">Enviar</button>
                            </div>-->
                        </div>
                    </tab-content>
                    <tab-content title="Datos adicionales"
                    icon="ti-unlock">
                        <div class=" form-group" v-if="filluser.url_imagen">
                            <label for="">Imagen</label>
                            <img :src="'{{asset('storage/imgUsuario')}}' +'/'+ filluser.url_imagen" class="img-fluid" alt="Responsive image">
                        </div>

                            <label for="">Imagen</label>
                            <input type="file" id="url_imagen_e" name="url_imagen"  class="form-control">
                    </tab-content>    
                    </form-wizard>
            </form>
			
		</div>
	</div>
</div>
