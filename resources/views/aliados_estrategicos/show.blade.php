
@extends('layouts.app')

@section('content')
<div class="container" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
                {{--  @foreach($reto as $values) --}}
                <div class="card-header">Aliados estratégicos</div>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-2" style="padding: 5px;">
                        <a class="btn btn-small btn-info" href="{{ route('aliados_estrategicos.edit', $lis_aliados)}}">Editar</a>
                    </div>
                    <div class="col-md-2" style="padding: 5px;">
                        <form action="{{ route('aliados_estrategicos.destroy', $lis_aliados) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-small btn-info" >Eliminar</button>
                        </form>
                    </div>    
                       
                    
                </div>
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Logo</th>
                            <th>Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $lis_aliados->id }}</td>
                            <td>{{$lis_aliados->nombre}}</td>
                            <td>{{$lis_aliados->descripcion}}</td>
                            <td><img src="/images/{{ $lis_aliados['logo'] }}" width="30" height="20" ></td>  
                            <td>{{$lis_aliados->url}}</td>                                
        
                        </tr>
                {{--  @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
