//Vue.use(Vue2Editor);
Vue.use(VueFormWizard);
new Vue({
	el:"#appComentarios",
	created:function(){
		this.getComentarios();
	},
	mounted: function(){
		this.getComentarios();
	},
	
	data:{
		fillComentario:{"id":"","id_usuario":"","descripcion":"","estado":""},
		comentarios:[],
		descripcion:"",
		contenidotext:"",
	},
	methods:{
		mytable(){
			const newLocal = '#comentarioindex';
			$(function(){
				$(newLocal).DataTable();
			});
		},
		onComplete: function(){
			$("#formUpdateEvento").submit();
		},
		getComentarios:function(){
			var url = "/admin/getcomentarios";
			axios.get(url).then(response=>{
			  this.comentarios = response.data;
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
			editComentario:function(comentario){
                this.id = comentario.id;
				this.fillComentario.id = comentario.id;
                this.fillComentario.id_usuario = comentario.id_usuario;
				this.fillComentario.descripcion = comentario.descripcion;
				this.fillComentario.estado = comentario.estado;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id;
            	$("#formUpdateComentario").attr("action",url);
				$("#editComentario").modal("show");
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