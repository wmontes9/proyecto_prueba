Vue.use(VueFormWizard)
new Vue({
	el:"#appRetos",
	created:function(){
		this.getRetos();
	},
	data:{
		fillReto:{"id_reto":"","titulo":"","pregunta":"","necesidad":"","causas":"","consecuencias":"",
		"interesados":"","region":"","ubicacion":"","condicion_e":"","tiempo_e":"","p_solucion":"","alcance":"",
		"condicion_fp":"","acciones_c":"","recursos_p":"","elementos_ps":"","evaluacion":"",
		"url_imagen":"","estado":""},
		retos:[],
		titulo:"",
		pregunta:"",
		necesidad:"",
		causas:"",
		consecuencias:"",
		interesados:"",
		tiempo_ejecucion:"",
		lugar:"",
		condicion_e:"",
		p_solucion:"",
		alcance:"",
		condicion_p:"",
		acciones_c:"",
		conocimiento:"",
		elementos:"",
		evaluacion:"",
		url_imagen:"",
		estado:"",
		file:"",

	},
	methods:{
		onCompletee: function(){
			$("#formUpdateReto").submit();
		 },
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
				this.fillReto.causas = reto.causas;
				this.fillReto.consecuencias = reto.consecuencias;
				this.fillReto.interesados = reto.interesados;
				this.fillReto.region = reto.region;
				this.fillReto.ubicacion = reto.ubicacion;
				this.fillReto.condicion_e = reto.condicion_e;
				this.fillReto.tiempo_e = reto.tiempo_e;
				this.fillReto.p_solucion = reto.p_solucion;
				this.fillReto.alcance = reto.alcance;
				this.fillReto.condicion_fp = reto.condicion_fp;
				this.fillReto.acciones_c = reto.acciones_c;
				this.fillReto.recursos_e = reto.recursos_e;
				this.fillReto.elementos_ps = reto.elementos_ps;
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