
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{--  @foreach($reto as $values) --}}
                <div class="card-header">Aliados</div>
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <a class="btn btn-small btn-info" href="{{ route('aliados_estrategicos.edit', $lis_aliados)}}">Editar</a>
                        <form action="{{ route('aliados_estrategicos.destroy', $lis_aliados) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $lis_aliados->id }}</td>
                            <td>{{$lis_aliados->nombre}}</td>
                            <td>{{$lis_aliados->descripcion}}</td>
                            <td><img src="/images/{{ $lis_aliados['logo'] }}" width="30" height="20" ></td>                                  
        
                        </tr>
                {{--  @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
