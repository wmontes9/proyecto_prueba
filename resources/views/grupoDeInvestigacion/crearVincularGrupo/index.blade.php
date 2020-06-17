<div class="container-fluid" id="grupoInvestigacion">
    <h1>Grupos de Investigacion</h1>
    <hr/>
    <div class="row">
        <div class="col-md-8">
            <div class="input-group mb-2">
                <input type="text" name="consulta_sigla" id="consulta_sigla" class="form-control">
                <div class="input-group-append">
                    <button type="button" id="buscar_grupo" class="btn btn-warning" v-on:click="consultarGrupo">
                        <i class="fas fa-search"></i> Consultar Grupo
                    </button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="thead-dark">
                        <th>Sigla</th>
                        <th>Nombre</th>
                        <th>Logo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(grupo, index) in grupos">
                        <td v-text="grupo.sigla"></td>
                        <td v-text="grupo.nombre"></td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#verGrupo" class="btn btn-dark" v-on:click="verGrupoInvestigacion(grupo)">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="modal fade" role="dialog" id="verGrupo">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h3 class="modal-title text-center w-50" v-text="verGrupo.sigla"></h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid" v-bind:src="'{{asset('storage/imgGrupo')}}' + '/' + verGrupo.logo" alt="logo">
                            <p class="text-center" v-text="verGrupo.nombre"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="h4 text-center">
                Crear Grupo de Investigacion
            </h4>
            <form action="{{route('crearGrupo')}}" method="post" enctype="multipart/form-data">
                @csrf    
                <div class="input_group">
                    <label for="sigla">Sigla</label>
                    <input type="text" name="sigla" id="sigla" class="form-control">
                </div>
                <div class="input_group">
                    <label for="nombre">Nombre del Grupo</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="input_group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control">
                </div>
                <button type="submit" class="btn btn-dark mt-1">Enviar Datos</button>    
            </form>            
        </div>
    </div>
</div>