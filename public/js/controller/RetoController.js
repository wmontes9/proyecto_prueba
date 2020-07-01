new Vue({
	el:"#appRetos",
	created:function(){
		this.getRetos();
	},
	data:{
		fillReto:{"id_reto":"","titulo":"","pregunta":"","necesidad":"","causa":"","consecuencia":"",
		"interesados":"","tiempo_ejecucion":"","lugar":"","condicion_e":"","p_solucion":"","alcance":"",
		"condicion_p":"","accion":"","conocimiento":"","elementos":"","descripcion_s":"","evaluacion":"",
		"url_imagen":"","estado":""},
		retos:[],
		titulo:"",
		pregunta:"",
		necesidad:"",
		causa:"",
		consecuencia:"",
		interesados:"",
		tiempo_ejecucion:"",
		lugar:"",
		condicion_e:"",
		p_solucion:"",
		alcance:"",
		condicion_p:"",
		accion:"",
		conocimiento:"",
		elementos:"",
		descripcion_s:"",
		evaluacion:"",
		url_imagen:"",
		estado:"",
		file:"",

	},
	methods:{
		getRetos:function(){
			var url = "/admin/getretos";
			axios.get(url).then(response=>{
			  this.retos = response.data
			});
			},
			createReto:function(){
				var url = "retos";
				axios.post(url,{
					titulo:this.titulo,
					pregunta:this.pregunta,
					necesidad:this.necesidad,
					causa:this.causa,
					consecuencia:this.consecuencia,
					interesados:this.interesados,
					tiempo_ejecucion:this.tiempo_ejecucion,
					lugar:this.lugar,
					condicion_e:this.condicion_e,
					p_solucion:this.p_solucion,
					alcance:this.alcance,
					condicion_p:this.condicion_p,
					accion:this.accion,
					conocimiento:this.conocimiento,
					elementos:this.elementos,
					descripcion_s:this.descripcion_s,
					evaluacion:this.evaluacion,
					url_imagen:this.url_imagen,
					estado:this.estado,    
				}).then(response=>{
					this.getRetos();
					$("#newReto").modal("hide");

					this.titulo = "";
					this.pregunta = "";
					this.necesidad ="";
					this.causa = "";
					this.consecuencia = "";
					this.interesados = "";
					this.tiempo_ejecucion = "";
					this.lugar = "";
					this.condicion_e = "";
					this.p_solucion = "";
					this.alcance = "";
					this.condicion_p = "";
					this.accion = "";
					this.conocimiento = "";
					this.elementos = "";
					this.descripcion_s = "";
					this.evaluacion = "";
					this.url_imagen = "";
					this.estado = "";
				});
			},
			editReto:function(reto){
				this.id_reto = reto.id_reto;
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
				this.fillReto.estado = reto.estado;

				this.fillReto.url_imagen = reto.url_imagen;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id_reto;
            	$("#formUpdateReto").attr("action",url);
				$("#editReto").modal("show");
			},
			deleteReto:function(reto){
				var url = "retos/"+reto;
		    	axios.delete(url).then(response=>{                    
                    //$("#detailcompetencia").modal("hide");
                    if(response.data != 0){
						$.sweetModal({
							content: 'No se ha podido eliminar ya que tiene soluciones  asociadas ',
							icon: $.sweetModal.ICON_WARNING
						});
                   }else{
                      	 $.sweetModal({
                             content: 'Reto eliminado correctamente',
                             icon: $.sweetModal.ICON_SUCCESS
                     	});
                     	this.getRetos();
                   }
		    	});
			},
			soluciones:function($id){
				var url = "solucion/"+$id
					axios.get(url).then(response=>{
						$(location).attr("href","solucion");
					});
			},
			publicarReto:function(id){
				if(confirm('esta segur@ de publicar el reto?')){
					var url = "/admin/retos/publicar/" + id;
					axios.get(url).then(responce => {
						alert('reto publicado');
					});
				}
			}
    },
  });