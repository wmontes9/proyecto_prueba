<form v-on:submit.prevent="createLineaInvestigacion()">
	<div class="modal fade" id="newLineaInvestigacion">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="background-color: rgba(40, 14, 4, 0.95); color: #fff;">
				<div class="modal-header">
					<h3 class="text-center">LineaInvestigacion</h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">

					<div class=" form-group"> 
                            <label for="grupo">Grupo</label>
                            <select v-model="id_grupo_invest" name="id_grupo_invest" id="id_grupo_invest" class="form-control" >
                            <option value="">--Seleccionar--</option>
                            <option v-for="grupo in grupos" v-bind:value="grupo.id">@{{grupo.nombre}}</option>
                            </select>
					</div>
					
                    <div class="form-group">
						<label for="">Nombre</label>
						<input type="text" v-model="nombre" class="form-control" required>
					</div>
                    <div class="form-group">
						<label for="">Descripcion</label>
						<input type="text" v-model="descripcion" class="form-control" required>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>				
				</div>
			</div>
		</div>
	</div>
</form>