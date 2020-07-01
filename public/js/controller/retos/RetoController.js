new Vue({
    created:function(){
        app.cargando();
        this.getListaRetos();
    },
    el:"#retos",
    data:{
        fillReto:{"id_reto":"","titulo":"","pregunta":"","necesidad":"","causa":"","consecuencia":"",
		"interesados":"","tiempo_ejecucion":"","lugar":"","condicion_e":"","p_solucion":"","alcance":"",
		"condicion_p":"","accion":"","conocimiento":"","elementos":"","descripcion_s":"","evaluacion":"",
		"url_imagen":"","estado":""},
        retos:null,
    },
    methods:{
        getListaRetos:function(){
            let url = "/retos/listaRetos";
            axios.get(url).then(responce => {
                this.retos = responce.data;                
                app.finalCarga();
            });                        
        },
        editarReto:function(reto){
			this.fillReto.id_reto = reto.id_reto;
			this.fillReto.titulo = reto.titulo;
            this.fillReto.pregunta = reto.pregunta;
            this.fillReto.necesidad = reto.necesidad;
            this.fillReto.causa = reto.causa;
            this.fillReto.consecuencia = reto.consecuencia;
            this.fillReto.interesados = reto.interesados;
            this.fillReto.tiempo_ejecucion = reto.tiempo_ejecucion;
            this.fillReto.lugar = reto.lugar;
            this.fillReto.condicion_e = reto.condicion_e;
            this.fillReto.p_solucion = reto.p_solucion;
            this.fillReto.alcance = reto.alcance;
            this.fillReto.condicion_p = reto.condicion_p;
            this.fillReto.accion = reto.accion;
            this.fillReto.conocimiento = reto.conocimiento;
            this.fillReto.elementos = reto.elementos;
            this.fillReto.descripcion_s = reto.descripcion_s;
            this.fillReto.evaluacion = reto.evaluacion;
			this.fillReto.url_imagen = reto.url_imagen;		
			$("#editReto").modal("show");
        },
        eliminarReto:function(reto){
			var url = "eliminar/" + reto;
			axios.delete(url).then(response=>{                    				
				if(response.data != 0){
					$.sweetModal({
						content: 'No se ha podido eliminar ya que tiene soluciones  asociadas',
						icon: $.sweetModal.ICON_WARNING
					});
				}else{
						$.sweetModal({
							content: 'Reto eliminado correctamente',
							icon: $.sweetModal.ICON_SUCCESS
					});
					this.getListaRetos();
				}
			});
		},
    }
});