    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="modal fade" id="login">
            <div class="modal-dialog">
                <div style="border:50px solid rgba(26,24,20,0.7);">
                <div class="modal-content" style="border: 3px solid rgba(0,0,0,1) !important;">
                    <div >
                        <div class="modal-header">
                            <h3 class="text-center">Inicio de sesión</h3>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">

                               <div class="col-1">
                               </div>
                               <div class="col-10">
                                    <label for="email" class="col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="password" class="col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordar mis datos') }}
                                            </label>
                                        </div>
                                   
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <button type="submit" class="form-control btn" style="background-color: #E06F12">
                                        {{ __('Ingresar') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvido su contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            ¿No se encuentra registrado? <a href="{{ url('/register') }}" class="btn btn-link"> Registrarse</a>                     
                            <!--<div class="w-100">
                                <a href="{{ url('login/google') }}" class="btn btn-primary btn-sm border border-primary p-0 pr-2">
                                <img src="{{ asset('webfonts/btn_google_dark_normal_ios.svg') }}">
                                    <strong>Login With Google</strong>
                                </a>
                            </div>-->
                        </div> 
                    </div>
                </div>
                </div>
            </div>
        </div>
    </form>
               
