new Vue({
    created:function(){ 
        app.cargando();    
        this.getUsuariosAsociados();                
    },       
    el:"#usuariosAsociaodos",
    data:{
        id_institucion: $('input[name="id_institucion"]').val(),
        usuariosAsociados:[], 
        solicitudes:[],
        inhabilitados:[],
    },
    methods:{        
        getUsuariosAsociados:function(){               
            //this.usuariosAsociados = null;
            let url = '/instituciones/usuarios_vinculados/' + $('input[name="id_institucion"]').val();
            axios.get(url).then(responce => {  
                if(responce.data[0] == 0){
                    alert(responce.data[1]);
                    window.history.back();
                } else {
                    this.usuariosAsociados = responce.data.asociados;
                    this.solicitudes = responce.data.solicitudes;
                    this.inhabilitados = responce.data.inhabilitados;                
                    app.finalCarga();
                }
            });            
        },        
    },
});