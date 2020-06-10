@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="card-header">Actualizar Publicidad</div>
                <form action="{{ url('publicidad', $publicidad['id']) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT" required>
                    <div class="form-group">
                        <label>Título</label>
                        <input class="form-control" type="text" name="titulo" value="{{ $publicidad['Titulo'] }}" required>
                    </div>
                    <div class="form-group">
                        <label>Contenido</label>
                        <input class="form-control" type="text" name="contenido" value="{{ $publicidad['Contenido'] }}" required>
                    </div>
                    <button>Actualizar</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
