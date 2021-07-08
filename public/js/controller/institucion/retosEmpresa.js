new Vue({
    el:"#retosEmpresa",
    data:{
        reto:{
            titulo:null,
            pregunta:null,
            necesidad:null,
            url_imagen:null,
        },
    },
    methods:{
        verReto:function(datos){         
            this.reto.titulo = datos.titulo;
            this.reto.pregunta = datos.pregunta;
            this.reto.necesidad = datos.necesidad;
            this.reto.url_imagen = datos.url_imagen;           
            $("#mostrarReto").modal("show");
        },
    }
});