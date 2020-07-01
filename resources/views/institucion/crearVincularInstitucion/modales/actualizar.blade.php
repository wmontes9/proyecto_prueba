<!--modal Actualizar Institucion-->
<div id="act_i" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h3 class="modal-title text-center w-50">Actualizar Institucion</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="">
                        @{{datosActualizar}}
                <div class="container-fluid">
            
                <div class="row">                              
                        <div class="col-md-6">
                            <input type="hidden" name="id_act" class="form-control my-1" v-model="datosActualizar.id">
                        </div>
                </div>

                    
                <div class="row">
                    <div class="col-md-6">
                        <label for="#ctg_item" class="my-1 text-left w-100"><b>Razon_Social</b></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="nombre_insert" class="form-control my-1" v-model="datosActualizar.razon_social">
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="#ctg_item" class="my-1 text-left w-100"><b>Nit</b></label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="nombre_insert" class="form-control my-1" v-model="datosActualizar.nit">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="#ctg_item" class="my-1 text-left w-100"><b>Tiempo_Constitucion</b></label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="nombre_insert" class="form-control my-1" v-model="datosActualizar.tiempo_constitucion">
                </div>
            </div>    

            <div class="row">
                <div class="col-md-6">
                    <label for="#ctg_item" class="my-1 text-left w-100"><b>Correo</b></label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="nombre_insert" class="form-control my-1" v-model="datosActualizar.correo">
                </div>
            </div>    
            
            <div class="row">
                <div class="col-md-6">
                    <label for="#ctg_item" class="my-1 text-left w-100"><b>Telefono</b></label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="nombre_insert" class="form-control my-1" v-model="datosActualizar.telefono">
                </div>
            </div> 
            
            <div class="row">
                <div class="col-md-6">
                    <label for="#ctg_item" class="my-1 text-left w-100"><b>Direccion</b></label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="nombre_insert" class="form-control my-1" v-model="datosActualizar.direccion">
                </div>
            </div> 
            
            <div class="row">
                <div class="col-md-6">
                    <label for="#ctg_item" class="my-1 text-left w-100"><b>Num_Empleados</b></label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="nombre_insert" class="form-control my-1" v-model="datosActualizar.num_empleados">
                </div>
            </div> 
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-outline-success mx-3 my-4" name="act_i" v-on:click="actualizarInstitucion()">Guardar Cambios</button>
                        <button type="button" class="btn btn-outline-danger mx-3" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                </form>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>