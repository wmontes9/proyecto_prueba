@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publicidad</div>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5">
                        <a class="btn btn-small btn-success" href="{{ route('publicidad.create') }}">Nuevo</a>
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
                        @foreach($lis_publicidad as $values)
                            <tr>
                                <td>{{ $values['id'] }}</td>
                                <td><a href="{{ url('publicidad', $values['id']) }}">{{ $values['Titulo'] }}</td>
                                <td>{{ $values['Contenido'] }}</td>
            
                            </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
