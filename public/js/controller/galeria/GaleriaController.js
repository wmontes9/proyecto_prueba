Vue.use(VueFormWizard)

new Vue({
	el:"#appGaleria",
	created:function(){
		this.getGaleria();
	},
	mounted: function(){
		this.getGaleria();
	},
	data:{
		fillGaleria:{"id":"","id_usuario":"","descripcion":"","url_imagen":"","estado":""},
		galerias:[],
		descripcion:"",
		url_imagen:"",
	},
	methods:{
		mytable(){
			const newLocal = '#tgaleria';
			$(function(){
				$(newLocal).DataTable();
			});
		},
		onComplete: function(){
			$("#formUpdateEvento").submit();
		},
		getGaleria:function(){
			var url = "/admin/getGalerias";
			axios.get(url).then(response=>{
			  this.galerias = response.data;
			  this.mytable();
			});
			},
			createEvento:function(){
				var url = "eventos";
				axios.post(url,{
					descripcion:this.descripcion,     
				}).then(response=>{
					this.getComentarios();
				});
			},
			editGaleria:function(galeria){
                this.id = galeria.id;
				this.fillGaleria.descripcion = galeria.descripcion;
				this.fillGaleria.url_imagen = galeria.url_imagen;
				this.fillGaleria.estado = galeria.estado;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id;
            	$("#formUpdateGaleria").attr("action",url);
				$("#editGaleria").modal("show");
			},
			deleteComentario:function(comentario){
				var url = "destroyer/"+comentario;
		    	axios.post(url).then(response=>{             
                    
                      	 $.sweetModal({
                             content: 'Comentario deshabilitado correctamente',
                             icon: $.sweetModal.ICON_SUCCESS
                     	});
                     	this.getComentarios();
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