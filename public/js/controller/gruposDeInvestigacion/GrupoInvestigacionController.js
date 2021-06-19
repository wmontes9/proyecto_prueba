new Vue({
    el:"#appGrupoIn",
    created:function() {
        //alert('aplicacion area');
        this.getGrupoIn();               
    },   
    data:{
        fillGrupo:{"id":"","sigla":"","nombre":"","logo":""},
        grupos:[],
        sigla:"",
        nombre:"",
        logo:"",
        accion:"",
    },
    methods:{
        mytable(){
			const newLocal = '#tbgrupo';
			$(function(){
				$(newLocal).DataTable();
			});
		},
        
        getGrupoIn:function(){
            const url = "/listaGrupoInvestigacion";
            axios.get(url).then(responce => {
                this.grupos = responce.data; 
                this.mytable();
                //alert(responce.data);               
            });            
        },
        createGrupoInvestigacion:function(){
            var url = "grupoinvestigacion"; //mirar esto si no funciona
            axios.post(url,{
                sigla:this.sigla,
                nombre:this.nombre,
                logo:this.logo,
            }).then(response=>{
                $("#newGrupoInvestigacion").modal("hide");
                this.sigla = "";
                this.nombre = "";
                this.logo = "";
                this.getGrupoIn();
            });
    },
    nuevoGrupo: function(){
        $("#newGrupoInvestigacion").modal("show");
        this.fillGrupo.sigla = "";
        this.fillGrupo.nombre = "";
        this.fillGrupo.logo = "";
    },
    editarGrupoInvestigacion: function(grupo){
        this.fillGrupo.id = grupo.id;
        this.fillGrupo.sigla = grupo.sigla;	
        this.fillGrupo.nombre = grupo.nombre;
        this.fillGrupo.logo = grupo.logo;
        var ruta = $("#ruta").val();
        var url = ruta+""+grupo.id;
        $("#formUpdateLogo").attr("action",url);
        $("#editGrupoInvestigacion").modal("show");
    },

    

    updateGrupoInvestigacion:function(id){
        var url = "grupoinvestigacion/"+id;
        axios.put(url,this.fillGrupo).then(response=>{
            this.getGrupoIn();
            $("#editGrupoInvestigacion").modal("hide");
        });
    },
    eliminarGrupoInvestigacion: function(grupo){
        var url = "grupoinvestigacion/" + grupo;
        axios.delete(url).then(response=>{                    				
            if(response.data != 0){
                $.sweetModal({
                    content: 'No se ha podido eliminar ',
                    icon: $.sweetModal.ICON_WARNING
                });
            }else{
                    $.sweetModal({
                        content: 'eliminado correctamente',
                        icon: $.sweetModal.ICON_SUCCESS
                });
                this.getGrupoIn();
            }
        });
    },

},
});
