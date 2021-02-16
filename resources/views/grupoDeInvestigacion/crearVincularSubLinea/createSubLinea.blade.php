<form v-on:submit.prevent="createSubLineaInvestigacion()">
	<div class="modal fade" id="newSubLineaInvestigacion">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-center">SubLineaInvestigacion</h3>
                    <button class="close" data-dismiss="modal">&times;</button>					
				</div>
				<div class="modal-body">

					<div class=" form-group row"> 
                       <div class="col-md-6">
                            <label for="linea">Línea de investigación</label>
                            <select v-model="id_linea_invest" name="id_linea_invest" id="id_linea_invest" class="form-control" >
                            <option value="">--Seleccionar--</option>
                            <option v-for="linea in lineas" v-bind:value="linea.id">@{{linea.nombre}}</option>
                            </select>
                    	</div>
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