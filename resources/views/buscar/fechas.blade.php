@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buscar Aliados</div>
                <div class="col-md-12">
                    <form action="{{route('buscar')}}" method="GET" class="form-inline pull-right" style="padding: 5px;" >
                        @csrf
                        <div class="form-group">
                            <label style="margin-left: 10px;">Fecha Inicial</label>
                            <input class="form-control" type="date" name="fecha_inicial" required style="margin-left: 10px;">
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 10px;">Fecha Final</label>
                            <input class="form-control" type="date" name="fecha_final" required style="margin-left: 10px;">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px;" >Buscar</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <table class="">
                        <tbody>
                           {{--  @foreach ($results as $res) 
                             <tr>
                                <td>{{ $res ['id'] }}</td> 
                                <td>{{ $res ['nombre'] }}</td>
                                <td>{{ $res ['descripcion'] }}</td>
                                <td>{{ $res ['logo'] }}</td>
                                <td>{{ $res ['created_at'] }}</td>
                                <td>{{ $res ['updated_at']}}</td>
                            </tr>   
                             @endforeach  --}}
                             
                            
                        </tbody>
                    </table>
                    {{-- {{ $difs-render() }} --}}
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection