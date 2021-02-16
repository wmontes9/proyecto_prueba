new Vue({
    el:"#appSemillero",
    created:function() {
        //alert('aplicacion area');
        this.getSemillero();
        this.getArea();
                  
    },   
    data:{
        fillSemillero:{"id":"","id_area_conocimiento":"","nombre":"","sigla":"","logo":""},
        semilleros:[],
        areas:[],
        id_area_conocimiento:"",
        nombre:"",
        sigla:"",
        logo:"",
        accion:"",
    },
    methods:{
        getSemillero:function(){
            const url = "/listaSemillero";
            axios.get(url).then(responce => {
                this.semilleros = responce.data; 
                //alert(responce.data);               
            });            
        },
        getArea:function(){
            const url = "/listaArea";
            axios.get(url).then(responce => {
                this.areas = responce.data; 
                //alert(responce.data);               
            });            
        },   
        createSemillero:function(){
            var url = "semilleros"; //mirar esto si no funciona
            axios.post(url,{
                id_area_conocimiento:this. id_area_conocimiento,
                nombre:this.nombre,
                sigla:this.sigla,
                logo:this.logo,
            }).then(response=>{
                $("#newSemillero").modal("hide");
                this.id_area_conocimiento = "";
                this.nombre = "";
                this.sigla = "";
                this.logo = "";
                this.getSemillero();
            });
    },
    nuevoSemillero: function(){
        $("#newSemillero").modal("show");
        this.fillSemillero.id_area_conocimiento = "";
        this.fillSemillero.nombre = "";
        this.fillSemillero.sigla = "";
        this.fillSemillero.logo = "";
    },

    editarSemillero: function(semillero){
        this.fillSemillero.id = semillero.id;
        this.fillSemillero.id_area_conocimiento = semillero.id_area_conocimiento;	
        this.fillSemillero.nombre = semillero.nombre;
        this.fillSemillero.sigla = semillero.sigla;
        this.fillSemillero.logo = semillero.logo;
        $("#editSemillero").modal("show");
    },

    updateSemillero:function(id){
        var url = "semilleros/"+id;
        axios.put(url,this.fillSemillero).then(response=>{
            this.getSemillero();
            $("#editSemillero").modal("hide");
        });
    },
    eliminarSemillero: function(semillero){
        var url = "semilleros/" + semillero;
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
                this.getSemillero();
            }
        });
    },
},
});