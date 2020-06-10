@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($publicidad as $values)
                <div class="card-header">Publicidad</div>
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <a class="btn btn-small btn-info" href="{{ url('publicidad/'.$values['id'].'/edit') }}">Editar</a>
                        <form action="{{ url('publicidad', $values['id']) }}" method="POST">
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
                            <th>Titulo</th>
                            <th>Contenido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $values['id'] }}</td>
                            <td>{{ $values['Titulo'] }}</td>
                            <td>{{ $values['Contenido'] }}</td>                                   
        
                        </tr>
                 @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
