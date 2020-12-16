new Vue({
    el:"#appSubLinea",
    created:function() {
        //alert('aplicacion area');
        this.getSubLinea();
        this.getLinea();   
        },   
    data:{
        fillSubLinea:{"id":"","id_linea_invest":"","nombre":"","descripcion":""},
        sublineas:[],
        lineas:[],
        id_linea_invest:"",
        nombre:"",
        descripcion:"",
        accion:"",
    },

    methods:{
        getSubLinea:function(){
            const url = "/listaSubLinea";
            axios.get(url).then(responce => {
                this.sublineas = responce.data; 
                //alert(responce.data);               
            });            
        },

        getLinea:function(){
            const url = "/listaLinea";
            axios.get(url).then(responce => {
                this.lineas = responce.data; 
                //alert(responce.data);               
            });            
        },
        getSubLineaSemilleros:function(grupo){
            const url = "/SubLineaSemilleros/"+grupo;
            axios.get(url).then(responce => {
            $(location).attr("href","SubLineaSemilleros/"+grupo)           
            });            
        },  

        createSubLineaInvestigacion:function(){
            var url = "sublineainvestigacion"; //mirar esto si no funciona
            
            axios.post(url,{
                id_linea_invest:this.id_linea_invest,
                nombre:this.nombre,
                descripcion:this.descripcion,
            }).then(response=>{
                $("#newSubLineaInvestigacion").modal("hide");
                this.id_linea_invest = "";
                this.nombre = "";
                this.descripcion = "";
                this.getSubLinea();
            });
    },
    nuevoSubLinea: function(){
        $("#newSubLineaInvestigacion").modal("show");
        this.fillSubLinea.id_linea_invest = "";
        this.fillSubLinea.nombre = "";
        this.fillSubLinea.descripcion = "";
    },

    editarSubLineaInvestigacion: function(sublinea){
        this.fillSubLinea.id = sublinea.id;
        this.fillSubLinea.id_linea_invest = sublinea.id_linea_invest;	
        this.fillSubLinea.nombre = sublinea.nombre;
        this.fillSubLinea.descripcion = sublinea.descripcion;
        $("#editSubLineaInvestigacion").modal("show");
    },

    updateSubLineaInvestigacion:function(id){
        var url = "sublineainvestigacion/"+id;
        axios.put(url,this.fillSubLinea).then(response=>{
            this.getSubLinea();
            $("#editSubLineaInvestigacion").modal("hide");
        });
    },
    eliminarSubLineaInvestigacion: function(sublinea){
        var url = "sublineainvestigacion/" + sublinea;
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
                this.getSubLinea();
            }
        });


    },

},
});