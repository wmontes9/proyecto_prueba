new Vue({
	el:"#appSoluciones",
	created:function(){
		this.getSoluciones();
		this.getRetos()
	},
	data:{
		fillSolucion:{"id_solucion":"","id_reto":"","titulo":"","justificacion":"","planteamiento":"","image_solucion":"","referencias":"","estado":""},
		solucions:[],
		retos:[],
		titulo:"",
		justificacion:"",
		planteamiento:"",
		referencias:"",
		image_solucion:"",
        file:"",
	},
	methods:{
		getSoluciones:function(){
			var url = "getSolucion";
			axios.get(url).then(response=>{
			  this.solucions = response.data
			});
			},
			getRetos:function(){
				var url = "getretos";
				axios.get(url).then(response=>{
				  this.retos = response.data
				});
				},
			createSolucion:function(){
				var url = "solucion";
				axios.post(url,{
					id_reto:this.id_reto,
					titulo:this.titulo,
					justificacion:this.justificacion,
					planteamiento:this.planteamiento,
					referencias:this.referencias,
					image_solucion:this.image_solucion,       
				}).then(response=>{
					this.getSoluciones();
					$("#newSolucion").modal("hide");
					this.titulo = "";
					this.justificacion = "";
					this.planteamiento = "";
					this.referencias = "";
					this.image_solucions = "";
				});
			},
			editSolucion:function(solucion){
				this.id_solucion = solucion.id_solucion;
				this.fillSolucion.id_reto = solucion.id_reto;
				this.fillSolucion.titulo = solucion.titulo;
				this.fillSolucion.justificacion = solucion.justificacion;
				this.fillSolucion.planteamiento = solucion.planteamiento;
				this.fillSolucion.referencias = solucion.referencias;
				this.fillSolucion.image_solucion = solucion.image_solucion;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id_solucion;
            	$("#formUpdateSolucion").attr("action",url);
				$("#editSolucion").modal("show");
			},
			deleteSolucion:function(solucion){
				var url = "solucion/"+solucion;
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
                     	this.getSoluciones();
                   }
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