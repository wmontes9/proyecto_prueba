<div class="panel panel-default" id="listSublineas">
	<div class="panel-heading">sublineas de investigacion</div>
	<div class="panel-body">
		<a href="#newSubLinea" class="btn btn-primary" data-toggle="modal">Nuevo</a>
		<table class="table table-bordered" style="margin-top: 10px">
			<tr>
				<td>#</td>
				<td>nombre</td>
				<td colspan="3">Opciones</td>
			</tr>
			<tr v-for="sublinea in sublineas">
				<td>@{{sublinea.id}}</td>
				<td>@{{sublinea.nombre}}</td>
				<td><a href="" v-on:click.prevent="getSemilleros(sublinea.id)">Semilleros</a></td>
				<td><a href="" v-on:click.prevent="editSublinea(sublinea)"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
				<td><a href="" v-on:click.prevent="deleteSublinea(sublinea.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
			</tr>
		</table>
	</div>
</div>
@include("admin.sub_linea.create")

