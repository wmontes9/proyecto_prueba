new Vue({
	el:"#appSoluciones",
	created:function(){
		this.getSoluciones();
	},
	data:{
		fillSolucions:{"id":"","id_reto":"","titulo":"","justificacion":"","planteamiento":"","image_solucion":""},
        solucions:[],
        NUM_RESULTS: 6, // Numero de resultados por página
        pag: 1, // Página inicial
	},
	methods:{
		getSoluciones:function(){
            var url = "getSolucionReto";
			axios.get(url).then(response=>{
			  this.solucions = response.data
			});
			},
			createReto:function(){
				var url = "retos";
				axios.post(url,{
					enunciado:this.enunciado,
					descripcion:this.descripcion,
					url_imagen:this.url_imagen,       
				}).then(response=>{
					this.getRetos();
					$("#newReto").modal("hide");
					this.enunciado = "";
					this.descripcion = "";
					this.url_imagen = "";
				});
			},
			editReto:function(reto){
				this.id = reto.id;
				this.fillReto.enunciado = reto.enunciado;
				this.fillReto.descripcion = reto.descripcion;
				this.fillReto.url_imagen = reto.url_imagen;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id;
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
			/*soluciones:function($id){
				var url = "getSolucion/"+$id
					axios.get(url).then(response=>{
						$(location).attr("href","solucion");
					});
			},*/
    },
  });