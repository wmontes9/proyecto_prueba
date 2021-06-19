Vue.use(VueFormWizard)
new Vue({
  el: '#Retosmult',
  created:function(){
	this.getSectores();
},
  data:{
		fillReto:{"id_reto":"","titulo":"","pregunta":"","necesidad":"","causas":"","consecuencias":"",
		"interesados":"","region":"","ubicacion":"","condicion_e":"","tiempo_e":"","p_solucion":"","alcance":"",
		"condicion_fp":"","acciones_c":"","recursos_e":"","elementos_ps":"","evaluacion":"",
		"url_imagen":"","estado":""},
		retos:[],
		sectores:[],
		id_sector:"",
		titulo:"",
		errortitulo:"",
		pregunta:"",
		necesidad:"",
		causas:"",
		consecuencias:"",
		interesados:"",
		region:"",
		ubicacion:"",
		condicion_e:"",
		tiempo_e:"",
		p_solucion:"",
		alcance:"",
		condicion_fp:"",
		acciones_c:"",
		recursos_e:"",
		elementos_ps:"",
		evaluacion:"",
		url_imagen:"",
		estado:"",
		file:"",
		errores:[],

	},
  methods: {
	getSectores:function(){
		var url = "/listaSectores"
		axios.get(url).then(responce => {
			this.sectores = responce.data;
		});
	},
    getRetos:function(){
			var url = "/admin/getretos";
			axios.get(url).then(response=>{
			  this.retos = response.data
			});
			},
	onChange: function() {
		alert("Cambio de seccion");
	},
    onComplete: function() {
            this.errores = [];
			this.errortitulo='';
            if(this.titulo === '') {
				this.errortitulo=("El titulo es obligatorio");
                this.errores.push("El titulo es obligatorio.");
            }if(this.pregunta === '') {
                this.errores.push("La pregunta es obligatoria.");
            } else {
                $("#creareto").submit();
				var url = "/retos";
				axios.post(url,{
					titulo:this.titulo,
					pregunta:this.pregunta,
					necesidad:this.necesidad,
					causas:this.causas,
					consecuencias:this.consecuencias,
					interesados:this.interesados,
					id_sector:this.id_sector,
					region:this.region,
					ubicacion:this.ubicacion,
					condicion_e:this.condicion_e,
					tiempo_e:this.tiempo_e,
					p_solucion:this.p_solucion,
					alcance:this.alcance,
					condicion_fp:this.condicion_fp,
					acciones_c:this.acciones_c,
					recursos_e:this.recursos_e,
					elementos_ps:this.elementos_ps,
					evaluacion:this.evaluacion,
					url_imagen:this.url_imagen,
					estado:this.estado,    
				})
            }
                   
		
        //this.getRetos();
    },
    isLastStep() {
      if (this.$refs.wizard) {

        return this.$refs.wizard.isLastStep
      }
      return false
    }
  }
})

