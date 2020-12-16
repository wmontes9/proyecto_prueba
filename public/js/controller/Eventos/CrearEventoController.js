Vue.use(VueFormWizard)
new Vue({
  el: '#Eventos',
  created:function(){
},
  data:{
		fillReto:{"id":"","titulo":"","subtitulo":"","descripcion":"","lugar":"","fecha":"",
		"objetivo":"","ponentes":"",
		"url_imagen":""},
		id:"",
		titulo:"",
		subtitulo:"",
		descripcion:"",
		lugar:"",
		fecha:"",
		objetivo:"",
		ponentes:"",
		url_imagen:"",
		file:"",

	},
  methods: {
    onComplete: function() {
		$("#crearevento").submit();
		var url = "/eventos";
		axios.post(url,{
			titulo:this.titulo,
			subtitulo:this.subtitulo,
			descripcion:this.descripcion,
			lugar:this.lugar,
			fecha:this.fecha,
			objetivo:this.objetivo,
			ponentes:this.ponentes,
			url_imagen:this.url_imagen,   
        })
    },
    isLastStep() {
      if (this.$refs.wizard) {

        return this.$refs.wizard.isLastStep
      }
      return false
    }
  }
})

