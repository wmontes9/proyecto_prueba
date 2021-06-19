<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <h1>Grupo Empresas</h1>                                
            <div>
                <div class="mb-3">                            
                    <input type="text" name="buscarEmpresa" id="buscar" v-model="nit_consulta" class="form-control" placeholder="N° nit de la institucion"/>
                </div>                 
                <button type="button" class="btn btn-warning w-100" v-on:click="buscarInstitucion" id="consultarInstitucion">
                    Buscar institución
                </button>                                            
            </div>   
            <div>
                <small>
                    Para registrar una institución.                    
                </small>                      
                <button type="button" class="btn btn-dark w-100" data-toggle="modal" data-target="#insert_i" data-backdrop="static">
                    Crear institución
                </button>       
            </div>
        </div>
        <div class="col-md-8">            
            <table class="table table-bordered table-sm mt-1" v-if="lista_empresas !== null">
                <thead>
                    <tr class="thead-dark text-center">
                        <th>Datos institución</th>
                        <th>Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(institucion, index) in lista_empresas">
                        <td>
                            <ul>
                                <li>
                                    <b>Razon social:</b> @{{institucion.razon_social}}
                                </li>
                                <li>
                                    <b>Nit:</b> @{{institucion.nit}}
                                </li>
                                <li>
                                    <b>Email:</b> @{{institucion.email}}
                                </li>
                                <li>
                                    <b>Teléfono:</b> @{{institucion.telefono}}
                                </li>
                                <li>
                                    <b>Dirección:</b> @{{institucion.direccion}}
                                </li>
                            </ul>    
                        </td>
                        <td>     
                            <form action="{{route('vincularInstitucion')}}" method="post">
                                @csrf                                
                                <input type="hidden" name="id_empresa" v-bind:value="institucion.id_institucion">
                                <button type="submit" class="btn btn-secondary w-100 h-100">
                                    <i class="fas fa-paper-plane"></i>
                                </button>                     
                            </form>       
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="alert alert-secondary mt-1" v-else>
                <h3 class="alert-heading"><i class="fas fa-info-circle fa-2x"></i></h3>
                <hr>
                <p>Por favor ingresar el nit de la institución.</p>
            </div>
        </div>
    </div>
</div>                
@include('institucion.crearVincularInstitucion.modales.insertar') 