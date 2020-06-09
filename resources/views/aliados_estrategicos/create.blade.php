@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               {{--  @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
                <div class="card-header">Registrar Aliado</div>
                <form action="{{ route('aliados_estrategicos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input class="form-control" type="text" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input class="form-control" type="file" name="logo" required>
                    </div>
                    <button>Guardar</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
