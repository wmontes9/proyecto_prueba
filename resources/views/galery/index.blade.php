@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Retos</div>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5">
                        <a class="btn btn-small btn-success" href="{{ route('retos.create') }}">Nuevo</a>
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
                        @foreach($lis_retos as $values)
                            <tr>
                                <td>{{ $values['id'] }}</td>
                                <td><a href="{{ url('retos', $values['id']) }}">{{ $values['Titulo'] }}</td>
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
