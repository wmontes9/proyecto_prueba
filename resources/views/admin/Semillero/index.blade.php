<div class="row">
	<div class="container">
		<div class="panel panel-default" id="tableSemillero">
			<div class="panel-heading">Semilleros</div>
			<div class="panel-body">
				<a href="#newSemillero" class="btn btn-primary" data-toggle="modal">Nuevo</a>
				<table class="table table-bordered" style="margin-top: 10px">
					<tr>
						<td>#</td>
						<td>Sigla</td>
						<td>nombre</td>
						<td colspan="3">Opciones</td>
					</tr>
					<tr v-for="semillero in semilleros">
						<td> @{{semillero.id}} </td>
						<td> @{{semillero.sigla}} </td>
						<td> @{{semillero.nombre}} </td>
					</tr>
				</table>
				@include("admin.sub_linea.create")
			</div>
		</div>
	</div>
</div>
