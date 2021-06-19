new Vue({
    el:"#solucionesEmpresa",
    data:{
        solucion:{
            id_solucion:null,
            titulo:null,
            justificacion:null,
            planteamiento:null,
            image_solucion:null,

        },
    },
    methods:{
        verSolucion:function(datos){         
            this.solucion.titulo = datos.titulo;
            this.solucion.justificacion = datos.justificacion;
            this.solucion.planteamiento = datos.planteamiento;
            this.solucion.image_solucion = datos.image_solucion;           
            $("#mostrarSolucion").modal("show");
        },
    }
});