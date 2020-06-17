new Vue({
    el:"#retosEmpresa",
    data:{
        reto:{
            enunciado:null,
            descripcion:null,
            url_imagen:null,
        },
    },
    methods:{
        verReto:function(datos){            
            this.reto.enunciado = datos.enunciado;
            this.reto.descripcion = datos.descripcion;
            this.reto.url_imagen = datos.url_imagen;           
            $("#mostrarReto").modal("show");
        },
    }
});