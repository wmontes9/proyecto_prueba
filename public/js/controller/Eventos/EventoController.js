//import DataTable from 'laravel-vue-datatable';
Vue.use(VueFormWizard)
//Vue.use(DataTable);
new Vue({
	el:"#appEventos",
	created:function(){
		this.getEventos()
	},
	data:{
		fillEvento:{"id":"","titulo":"","subtitulo":"","descripcion":"","lugar":"","fecha":"","objetivo":"","url_imagen":"","ponentes":"","estado":""},
		eventos:[],
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
	methods:{
		mytable(){
			$(function(){
				$('#eventos'.DataTable())
			});
		},
		onComplete: function(){
			$("#formUpdateEvento").submit();
		 },
		getEventos:function(){
			var url = "getEventos";
			axios.get(url).then(response=>{
			  this.eventos = response.data
			  this.mytable();
			});
			},
			createEvento:function(){
				var url = "eventos";
				axios.post(url,{
					titulo:this.titulo,
					subtitulo:this.justificacion,
					descripcion:this.planteamiento,
                    lugar:this.referencias,
                    fecha:this.fecha,
                    objetivo:this.objetivo,
					ponentes:this.ponentes,
					estado:this.estado,
					url_imagen:this.url_imagen,       
				}).then(response=>{
					this.getSoluciones();
				});
			},
			editEvento:function(evento){
				this.id = evento.id;
				this.fillEvento.titulo = evento.titulo;
				this.fillEvento.subtitulo = evento.subtitulo;
				this.fillEvento.descripcion = evento.descripcion;
				this.fillEvento.lugar = evento.lugar;
				this.fillEvento.fecha = evento.fecha;
				this.fillEvento.objetivo = evento.objetivo;
				this.fillEvento.ponentes = evento.ponentes;
				this.fillEvento.estado = evento.estado;
				this.fillEvento.url_imagen = evento.url_imagen;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id;
            	$("#formUpdateEvento").attr("action",url);
				$("#editEvento").modal("show");
			},
			deleteEvento:function(evento){
				var url = "destroyer/"+evento;
		    	axios.post(url).then(response=>{             
                    
                      	 $.sweetModal({
                             content: 'Evento deshabilitado correctamente',
                             icon: $.sweetModal.ICON_SUCCESS
                     	});
                     	this.getEventos();
                   });
			},
			/*
			soluciones:function($id){
				var url = "solucion/"+$id
					axios.get(url).then(response=>{
						$(location).attr("href","solucion");
					});
			},*/
    },
  });