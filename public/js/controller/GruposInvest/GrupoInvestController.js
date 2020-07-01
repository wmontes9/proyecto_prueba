new Vue({
    created:function(){
        //app.cargando();
        this.getListaGrupos();
    },
    el:"#grupo",
    data:{
        fillGrupo:{"id":"","sigla":"","nombre":"","logo":""},
        grupos:null,
    },
    methods:{
        getListaGrupos:function(){
            let url = "listaGrupos";
            axios.get(url).then(responce => {
                this.grupos = responce.data;
                //app.finalCarga();
            });
            
        },
        editarGrupo:function(grupo){
			this.fillGrupo.id = grupo.id;
			this.fillGrupo.sigla = grupo.sigla;
			this.fillGrupo.nombre = grupo.nombre;
			this.fillGrupo.logo = grupo.logo;		
			$("#editGrupo").modal("show");
        },
        eliminarGrupo:function(grupo){
			var url = "grupo/" + grupo;
			axios.delete(url).then(response=>{                    				
				if(response.data != 0){
					$.sweetModal({
						content: 'No se ha podido eliminar ya que tiene soluciones  asociadas',
						icon: $.sweetModal.ICON_WARNING
					});
				}else{
						$.sweetModal({
							content: 'Reto eliminado correctamente',
							icon: $.sweetModal.ICON_SUCCESS
					});
					this.getListaGrupos();
				}
			});
		},
    }
});