@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($reto as $values)
                <div class="card-header">Retos</div>
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <a class="btn btn-small btn-info" href="{{ url('retos/'.$values['id'].'/edit') }}">Editar</a>
                        <form action="{{ url('retos', $values['id']) }}" method="POST">
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
                            <th>Actividad</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $values['id'] }}</td>
                            <td>{{ $values['Titulo'] }}</td>
                            <td>{{ $values['Pregunta'] }}</td>                                   
        
                        </tr>
                 @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
