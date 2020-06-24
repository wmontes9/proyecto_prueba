@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aliados</div>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5" style="padding: 7px;">
                        <a class="btn btn-small btn-success" href="{{ route('aliados_estrategicos.create') }}">Nuevo</a>
                        <a class="btn btn-small btn-success" href="{{ route('buscar_formulario')}}">Buscar</a> 
                    </div>
                </div>
                <div class="card-body">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="images/cc.png" class="d-block w-100" alt="...">
                            </div>  
                           @foreach ($lis_aliados as $values)
                            <div class="carousel-item ">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a href="{{ $values ['url'] }}"><img src="images/{{ $values['logo'] }}" class="card-img" ></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h6 class="card-title">{{ $values ['id'] }} </h6>
                                        <h5 class="card-title" style="text-decoration:none"><a href="{{route('aliados_estrategicos.show',$values)}}">{{ $values['nombre'] }}</a></h5>
                                        <p class="card-text">{{$values['descripcion']}}</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>  
                           @endforeach 
                          
                          
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                      </div>  


                    <table id="buscar" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Logo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lis_aliados as $values)
                                <tr>
                                    <td>{{ $values ['id'] }}</td>
                                    <td><a href="{{route('aliados_estrategicos.show',$values)}}">{{ $values['nombre'] }}</a></td>
                                    <td>{{$values['descripcion']}}</td>
                                    <td><a href="{{ $values ['url'] }}"><img src="images/{{ $values['logo'] }}" width="90" height="50" ></a> </td>
                
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection