
@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-color: rgba(40, 14, 4, 0.4); color: #fff;">
                <div class="card-header">Aliados estratégicos</div>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5" style="padding: 7px;">
                        <a class="btn btn-small btn-success" href="{{ route('aliados_estrategicos.create') }}">Nuevo</a>
                        <a class="btn btn-small btn-success" href="{{ route('buscar_formulario')}}">Buscar</a> 
                    </div>
                </div>
                
                <div class="container">
                 
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="text-align:center;" >
                                <img src="images/sennova2020.png" style="width:80%;" height="200"  alt="...">
                            </div>  
                           @foreach ($lis_aliados as $values)
                            <div class="carousel-item" >
                                <div class="card mb-3" style="width: 80%; margin:auto;" >
                                    <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a target="_blank" href="{{ $values ['url'] }}"><img src="images/{{ $values['logo'] }}" class="card-img" height="200" ></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title" style="text-decoration:none"><a href="{{route('aliados_estrategicos.show',$values)}}">{{ $values['nombre'] }}</a></h5>
                                        <p class="card-text">{{$values['descripcion']}}</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>  
                           @endforeach 
                        <a class="carousel-control-prev" href="#carouselExampleControls"  role="button" data-slide="prev">
                            <span class="fas fa-angle-double-left" style="color:gray; font-size: 40px;" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="fas fa-angle-double-right" style="color: gray; font-size: 40px;"  aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div> 
                       
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
                            <td><a target="_blank" href="{{ $values ['url'] }}"><img src="images/{{ $values['logo'] }}" width="90" height="50" ></a> </td>
                
                        </tr>
                        @endforeach()
                    </tbody>
                </table>  
        </div>
    </div>
</div>
</div>
@endsection