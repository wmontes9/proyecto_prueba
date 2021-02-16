new Vue({
    el:"#appLinea",
    created:function() {
        //alert('aplicacion area');
        this.getLinea();   
        this.getGrupo();          
    },   
    data:{
        fillLinea:{"id":"","id_grupo_invest":"","nombre":"","descripcion":""},
        lineas:[],
        grupos:[],
        id_grupo_invest:"",
        nombre:"",
        descripcion:"",
        accion:"",
    },
    methods:{
        getLinea:function(){
            const url = "/listaLinea";
            axios.get(url).then(responce => {
                this.lineas = responce.data; 
                //alert(responce.data);               
            });            
        },
        getGrupo:function(){
            const url = "/listaGrupoInvestigacion";
            axios.get(url).then(responce => {
                this.grupos = responce.data; 
                //alert(responce.data);               
            });            
        },
        createLineaInvestigacion:function(){
            var url = "lineainvestigacion"; //mirar esto si no funciona
            axios.post(url,{
                id_grupo_invest:this.id_grupo_invest,
                nombre:this.nombre,
                descripcion:this.descripcion,
            }).then(response=>{
                $("#newLineaInvestigacion").modal("hide");
                this.id_grupo_invest = "";
                this.nombre = "";
                this.descripcion = "";
                this.getLinea();
            });
    },
    nuevoLinea: function(){
        $("#newLineaInvestigacion").modal("show");
        this.fillLinea.id_grupo_invest = "";
        this.fillLinea.nombre = "";
        this.fillLinea.descripcion = "";
    },
    editarLineaInvestigacion: function(linea){
        this.fillLinea.id = linea.id;
        this.fillLinea.id_grupo_invest = linea.id_grupo_invest;	
        this.fillLinea.nombre = linea.nombre;
        this.fillLinea.descripcion = linea.descripcion;
        $("#editLineaInvestigacion").modal("show");
    },

    updateLineaInvestigacion:function(id){
        var url = "lineainvestigacion/"+id;
        axios.put(url,this.fillLinea).then(response=>{
            this.getLinea();
            $("#editLineaInvestigacion").modal("hide");
        });
    },
    eliminarLineaInvestigacion: function(linea){
        var url = "lineainvestigacion/" + linea;
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
                this.getLinea();
            }
        });
    },




},
});