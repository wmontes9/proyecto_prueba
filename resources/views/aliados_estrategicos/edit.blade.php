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
                <div class="card-header">Actualizar Aliado</div>
                <form action="{{ route('aliados_estrategicos.update',$lis_aliados) }}" method="POST" enctype="multipart/form-data">
                    @csrf  @method('PUT')
                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="{{ $lis_aliados->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input class="form-control" type="text" name="descripcion" value="{{ $lis_aliados->descripcion }}" required>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input class="form-control" type="file" name="logo" value="{{ $lis_aliados->logo }}" required>
                    </div>
                    <button>Actualizar</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
