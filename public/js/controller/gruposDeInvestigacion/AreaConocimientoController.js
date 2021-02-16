new Vue({
    el:"#appArea",
    created:function() {
        //alert('aplicacion area');
        this.getArea();               
    },   
    data:{
        fillArea:{"id_area_conocimiento":"","nombre":""},
        areas:[],
        nombre:"",
        accion:"",
    },
    methods:{
        getArea:function(){
            const url = "/listaArea";
            axios.get(url).then(responce => {
                this.areas = responce.data; 
                //alert(responce.data);               
            });            
        },
        createAreaConocimiento:function(){
            var url = "areaconocimiento"; //mirar esto si no funciona
            axios.post(url,{
                nombre:this.nombre
            }).then(response=>{
                $("#newAreaConocimiento").modal("hide");
                this.nombre = "";
                this.getArea();
            });
    },
    nuevoArea: function(){
        $("#newAreaConocimiento").modal("show");
        this.fillArea.nombre = "";
    },
    editarAreaConocimiento: function(area){
        this.fillArea.id = area.id_area_conocimiento;
        this.fillArea.nombre = area.nombre;		
        $("#editAreaConocimiento").modal("show");
    },

    updateAreaConocimiento:function(id){
        var url = "areaconocimiento/"+id;
        axios.put(url,this.fillArea).then(response=>{
            this.getArea();
            $("#editAreaConocimiento").modal("hide");
        });
    },
    eliminarAreaConocimiento: function(area){
        var url = "areaconocimiento/" + area;
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
                this.getArea();
            }
        });
    },




},
});