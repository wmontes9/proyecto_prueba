@extends("layouts.app_admin")

@section("content")
<div class="row" id="appControllerLineas">
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Lineas de investigacion</div>
				<div class="panel-body">
					<a href="#newLinea" class="btn btn-primary" data-toggle="modal">Nuevo</a>
					<table class="table table-bordered table-striped" style="margin-top: 10px;">
						<tr>
							<td>#</td>
							<td>Nombre</td>
							<td colspan="3">Opciones</td>
						</tr>
						@foreach($lineas as $linea)
							<tr>
								<td>{{$linea->id}}</td>
								<td>{{$linea->nombre}}</td>
								<td><a href="#">Modificar</a></td>
								<td><a href="#" class="delete" onclick="deleteLinea({{$linea->id}})">Eliminar</a></td>
								<td><a href="#" v-on:click="getSublineas({{$linea->id}})">Sublineas</a></td>
							</tr>
						@endforeach
					</table>
			{!!$lineas->render()!!}
				</div>
			</div>

					
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6" id="sublinea">
			@include("admin.sub_linea.index")
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12" id="semilleros"></div>

	</div>
@include("admin.linea_investigacion.create")
@include("admin.semillero.create")
@include("admin.semillero.index")
@include("admin.sub_linea.edit")
@if($errors->has("nombre"))
		<script>
			$("#newLinea").modal("show");
		</script>
	@endif
<div class="modal fade" id="delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h3 class="text-muted">¿Esta seguro que desea eliminar esta linea?</h3>				
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-warning text-center">Aceptar</a> <a href="" class="btn btn-danger text-center">Eliminar</a>	
			</div>
		</div>
	</div>
</div>
</div>
<script>
	new Vue({
		el:"#appControllerLineas",
		data:{
			nombre:"",
			sigla:"",
			sublineas:[],
			semilleros:[],
			fillSublinea:{"id":"","id_linea_investigacion":"","nombre":""},
		},methods:{
			getSublineas:function(id){
				var url = "getSublineas/"+id;
				axios.get(url).then(response=>{
					this.sublineas = response.data;
				});
				//this.getSublineas(id);
					$("#listSublineas").css("display","block");
			},
			editSublinea:function(sublinea){
				this.fillSublinea.id = sublinea.id;
				this.fillSublinea.id_linea_investigacion = sublinea.id_linea_investigacion;
				this.fillSublinea.nombre = sublinea.nombre;
				$("#editSublinea").modal("show");
			},
			updateSublinea:function(id){
				var url = "../sublinea/"+id;
				axios.put(url,this.fillSublinea).then(response=>{
						var id = response.data;
						this.getSublineas(id);
						$("#editSublinea").modal("hide");
				});
			},
			createSublinea:function(){
				var url = "../sublinea";
				axios.post(url,{
					nombre: this.nombre
				}).then(response=>{
					var id = response.data;
					this.getSublineas(id);
					$("#newSubLinea").modal("hide");
				});
			},
			deleteSublinea:function(id){
				var url = "../sublinea/"+id;
				axios.delete(url).then(response=>{
					var id = response.data;
					this.getSublineas(id);
				});
			},//Crud para semilleros 
			getSemilleros:function(id){
				var url = "../semillero/"+id;
				axios.get(url).then(response=>{
						this.semilleros = response.data;
				});
				$("#tableSemillero").css("display","block");
				this.getSemilleros();
			},
			createSemillero:function(){
				var url = "../semillero";
				axios.post(url,{
					nombre:this.nombre,
					sigla:this.sigla,
				}).then(response=>{
					alert("Semillero creado correctamente");
				});
			},
			delete:function(){
				var url = "../Semillero/"+id;
				axios.post(url).then(response=>{
					alert("create.blade.php");
				});
			}
		}
	});
</script>
</script>
@endsection
