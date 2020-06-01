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
                <div class="card-header">Crear reto</div>
                <form action="{{ route('retos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Título</label>
                        <input class="form-control" type="text" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label>Pregunta</label>
                        <input class="form-control" type="text" name="pregunta" required>
                    </div>
                    <button>Guardar</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
