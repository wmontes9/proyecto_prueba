@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header ">Buscar Aliados</div>
                <div class="card-body">
                    <form action="{{route('buscar')}}" method="GET" class="form-inline pull-right" style="padding: 10px;" >
                        @csrf
                        
                        <div class="form-group">
                            <label class="col-sm-5 col-form-label">Fecha Inicial</label>
                            <input class="form-control col-sm-7" type="date" name="fecha_inicial" required>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 col-form-label" >Fecha Final</label>
                            <input class="form-control col-sm-7" type="date" name="fecha_final" required>
                        </div>
                        <div class="form-group col-md-1" >
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                        
                    </form>
                </div>
                
                <div class="card-footer bg-transparent border-light">
                    
                    <table id="buscar" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Logo</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>  
                        @isset($results)
                        @foreach($results as $res)  
                        <tbody> 
                            <tr>
                               <td>{{ $res->id }}</td> 
                               <td>{{ $res->nombre }}</td>
                               <td>{{ $res->descripcion }}</td>
                               <td><img src="images/{{ $res->logo }}" width="30" height="20" ></td>
                               <td>{{ $res->created_at }}</td>
                           </tr> 
                        </tbody> 
                        @endforeach
                        @endisset 
                    </table>
                    {{-- {{ $difs-render() }} --}}
                </div>         
            </div>
        </div>
    </div>
</div>

@endsection
