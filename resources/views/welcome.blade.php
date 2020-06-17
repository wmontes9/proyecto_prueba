@extends("layouts.app_inicio")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12 p-0">
			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{url('img/banner1.JPG')}}" class="d-block w-100" alt="..." style="max-height:450px;">
					<!-- <div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					</div> -->
				</div>
				<div class="carousel-item">
					<img src="{{url('img/banner2.jpg')}}" class="d-block w-100" alt="..." style="max-height:450px;">
					<!-- <div class="carousel-caption d-none d-md-block">
					<h5>Second slide label</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div> -->
				</div>
				<div class="carousel-item">
					<img src="{{url('img/banner3.png')}}" class="d-block w-100" alt="..." style="max-height:450px;">
					<!-- <div class="carousel-caption d-none d-md-block">
					<h5>Third slide label</h5>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
					</div> -->
				</div>
				<div class="carousel-item">
					<img src="{{url('img/banner4.JPG')}}" class="d-block w-100" alt="..." style="max-height:450px;">
					<!-- <div class="carousel-caption d-none d-md-block">
					<h5>Third slide label</h5>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
					</div> -->
				</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="line"></div>
	<!-- <div class="row">
		<div class="col-md-12 text-center">
			<iframe width="70%" height="392" src="https://www.youtube.com/embed/wOqV8JrOAhY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div> -->
	<div class="row quien">
		<div class="col-md-1">
		</div>
		<div class="col-md-4">
			<br/>
			<h3 class="text-center">¿Quíenes somos?</h3>
			<br/>
			<p>Esta plataforma se enfrenta a diferentes retos que actualmente se presentan en el sector productivo del departamento de Boyacá, como el desarrollo de capacidades en investigación, desarrollo experimental e innovación y la formulación de mecanismos para la transferencia y circulación del conocimiento, lo cual permite conocer, identificar, mejorar las capacidades productivas y afianzar la vocación regional en busca de la productividad y la competitividad, así como la contribución al avance en la innovación y el desarrollo tecnológico empresarial. </p>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-5">
		<br/>
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/Z8oC_pKioAM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		{{-- <img src="{{url('img/quien.jpg')}}" class="img-fluid"> --}}
		</div>
	</div>
	<div class="line"></div>
	<br/>
	{{-- <div class="row">
		<div  class="col-md-3 col-sm-6">
			<a href="#" target="_blank">
				<img src="{{url('img/wilson.jpg')}}" class="img-thumbnail">
				<h4 class="text-center">Carmen Cecilia Zuluaga Arenas</h4> 
				<p class="text-justify">
					Administradora de empresas,
					especialista economía solidaria, gestión del conocimeinto
					investigadora
				</p>
			<a>
		</div>
		<div  class="col-md-3 col-sm-6">
			<a href="#" target="_blank">
				<img src="{{url('img/wilson.jpg')}}" class="img-thumbnail">
				<h4 class="text-center">Henry Mauricio Rojas Machuca</h4> 
				<p class="text-justify">
					Ingeniero de telecomunicaciones,
					especialista en gestión de proyectos,
					investigador
				</p>
			<a>
		</div>
		<div  class="col-md-3 col-sm-6">
			<a href="#" target="_blank">
				<img src="{{url('img/wilson.jpg')}}" class="img-thumbnail">
				<h4 class="text-center">Jeinson Fernando Bello Barrera</h4> 
				<p class="text-justify">
					Ingeniero industrial,
					especialista en gestión de la innovación,
					investigador
				</p>
			<a>
		</div>
		<div  class="col-md-3 col-sm-6">
			<a href="#" target="_blank">
				<img src="{{url('img/wilson.jpg')}}" class="img-thumbnail">
				<h4 class="text-center">Wilson Montes Suarique</h4> 
				<p class="text-justify">
					Ingeniero electrónico,
					tecnólogo en análisis y desarrollo de sistemas de información,
					especialista tecnólogico en aplicaciones para dispositivos móviles,
					investigador
				</p>
			<a>
		</div>
	</div> --}}
	{{-- <br/>
	<div class="line"></div>
	<br/> --}}
	{{-- <div class="row">
		<div  class="col-md-3 col-sm-6">
			<a href="#" target="_blank">
				<img src="{{url('img/wilson.jpg')}}" class="img-thumbnail">
				<h4 class="text-center">Cristian Camilo Zapata</h4> 
				<p class="text-justify">
					Tecnológo en análisis y desarrollo de sistemas de información,
					investigador
				</p>
			<a>
		</div>
		<div  class="col-md-3 col-sm-6">
			<a href="#" target="_blank">
				<img src="{{url('img/wilson.jpg')}}" class="img-thumbnail">
				<h4 class="text-center">Diego Camilo </h4> 
				<p class="text-justify">
					Tecnológo en análisis y desarrollo de sistemas de información,
					investigador
				</p>
			<a>
		</div>
		<div  class="col-md-3 col-sm-6">
			<a href="#" target="_blank">
				<img src="{{url('img/wilson.jpg')}}" class="img-thumbnail">
				<h4 class="text-center">Juan Manuel Figueredo</h4> 
				<p class="text-justify">
					Tecnológo en producción de multimedia,
					investigador
				</p>
			<a>
		</div>
		<div  class="col-md-3 col-sm-6">
		<a href="http://40.70.207.114/" target="_blank">
			<img src="{{url('img/sennova.png')}}" class="img-thumbnail">
		</a>
		</div>
	</div> --}}
	<div class="row" id="contactenos">
	</div>
	<br/>
	<div class="line"></div>
	<br/>
	<h3 class="text-center">Aliados estratégicos</h2>
 
	<div id="bs4-multi-slide-carousel" class="carousel slide" data-ride="carousel" >
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="row">
				<div class="col"><img src="img/sennova.png" class="img-fluid" alt="1 slide"></div>
				<div class="col"><img src="img/gobernacion.png" class="img-fluid" alt="2 slide"></div>
				<div class="col"><img src="img/camaratunja.png" class="img-fluid" alt="3 slide"></div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="row">
				<div class="col"><img src="img/sogamoso.png" class="img-fluid" alt="1 slide"></div>
				<div class="col"><img src="img/duitama.png" class="img-fluid" alt="2 slide"></div>
				<div class="col"><img src="img/super.png" class="img-fluid" alt="3 slide"></div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="row">
				<div class="col"><img src="img/sena.png" class="img-fluid" alt="1 slide"></div>
				<div class="col"><img src="img/ginnoa.png" class="img-fluid" alt="2 slide"></div>
				<div class="col"><img src="img/umciti.png" class="img-fluid" alt="3 slide"></div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="row">
				<div class="col"><img src="img/gyg.png" class="img-fluid" alt="1 slide"></div>
				<div class="col"><img src="#" class="img-fluid" alt="2 slide"></div>
				<div class="col"><img src="#" class="img-fluid" alt="3 slide"></div>
			</div>
		</div>
	</div>
		<a class="carousel-control-prev" href="#bs4-multi-slide-carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next text-faded" href="#bs4-multi-slide-carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="row">
	<div class="line"></div>
	<br/>
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
		<h3 class="text-center">Contactenos</h3>
		<form enctype="multipart/form-data" action="contact" method="POST">
			{{csrf_field()}}			
			<div>
				<label for="name">Nombre y apellido  <span class="required">*</span></label>
				<div class="inputs form-group">
					<input class="aweform form-control" type="text" id="name" name="name" placeholder="Ingrese su nombre" value="{{ old('name')}}" required/>
					{!! $errors -> first('name','<small>:message</small>')!!}
				</div>  
			</div>
			
			<div>
				<label for="email">Correo electrónico<span class="required">*</span></label>
				<div class="inputs form-group">
					<input class="aweform form-control" type="text" id="email" name="email" placeholder="E-mail..." value="{{ old('email')}}" required/>
					{!! $errors -> first('email','<small>:message</small>')!!}
				</div>  
			</div>
			
			<div>
				<label for="phone">Teléfono <span class="required">*</span></label>
				<div class="inputs form-group">
					<input class="aweform small form-control" type="text" id="phone" name="phone" placeholder="Teléfono" value="{{ old('phone')}}" required/>
					{!! $errors -> first('phone','<small>:message</small>')!!}
				</div>  
			</div>
			<div>
				<label for="message">Mensaje <span class="required">*</span></label>
				<div class="inputs form-group">
					<textarea class="aweform form-control" id="message" name="message" rows="6" cols="5" placeholder="Ingrese su mensaje, solicitud o consulta" value="{{ old('message')}}" required></textarea>
					{!! $errors -> first('message','<small>:message</small>')!!}
				</div>  
			</div>		
			<div class="form-group text-center">
				<button class="btn btn-success"><i class="fa fa-chevron-circle-right"></i> Enviar</button>   
			</div>
		</form>
	</div>
</div>
@endsection