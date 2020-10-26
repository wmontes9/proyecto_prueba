new Vue({
    el:"#appSectores",
    created:function() {
        this.getSectores();               
    },   
    data:{
        fillSector:{"id":"","nombre":""},
        sectores:[],
        retos:[],
        nombre:"",
        accion:"",
    },
    methods:{
        getSectores:function(){
            const url = "/listaSectores";
            axios.get(url).then(responce => {
                this.sectores = responce.data;                
            });            
        },
        createSectorEconomico:function(){
                var url = "SectorEconomico";
                axios.post(url,{
                    nombre:this.nombre
                }).then(response=>{
                    $("#newSectorEconomico").modal("hide");
                    this.nombre = "";
                    this.getSectores();
                });
        },
        nuevoSectorEconomico: function(){
            $("#newSectorEconomico").modal("show");
            this.fillSector.nombre = "";
        },
        editarSectorEconomico: function(sector){
            this.fillSector.id = sector.id_sector_economico;
            this.fillSector.nombre = sector.nombre;		
            $("#editSectorEconomico").modal("show");
        },
        updateSectorEconomico:function(id){
			var url = "SectorEconomico/"+id;
			axios.put(url,this.fillSector).then(response=>{
				this.getSectores();
				$("#editSectorEconomico").modal("hide");
			});
		},
        eliminarSectorEconomico: function(sector){
			var url = "SectorEconomico/" + sector;
			axios.delete(url).then(response=>{                    				
				if(response.data != 0){
					$.sweetModal({
						content: 'No se ha podido eliminar posee retos  asociadas',
						icon: $.sweetModal.ICON_WARNING
					});
				}else{
						$.sweetModal({
							content: 'Reto eliminado correctamente',
							icon: $.sweetModal.ICON_SUCCESS
					});
					this.getSectores();
				}
			});
		},
        retosSector:function(sector){
            const url = "RetosSector/"+sector;
            axios.get(url).then(responce => {
               $(location).attr("href","RetosSector/"+sector);              
            });  
        }
    },    
});