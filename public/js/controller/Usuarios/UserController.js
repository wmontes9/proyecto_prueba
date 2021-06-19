Vue.use(VueFormWizard)
new Vue({
	el:"#appuser",
	created:function(){
		this.getGrupos()
        this.getDepartamentos()
		this.getUser()
	},
	data:{
        filluser:{"id_municipio":"","nombre":"", "apellido":"",
        "tipo_documento":"","num_identificacion":"","direccion":"",
        "telefono":"","email":"","password":"","administrador":"",
        "staf":"","activo":"","url_imagen":"","rol":""},
		users:[],
		roles:[],
        departamentos:[],
        municipios:[],
		id_municipio:"",
		nombre:"",
		apellido:"",
		tipo_documento:"",
		num_identificacion:"",
        direccion:"",
        telefono:"",
        email:"",
        password:"",
        administrador:"",
        staf:"",
        activo:"",
        url_imagen:"",
	},
	methods:{
		mytable(){
			const newLocal = '#userindex';
			$(function(){
				$(newLocal).DataTable();
			});
		},
		getUser:function(){
			var url = "/admin/listausers";
			axios.get(url).then(response=>{
			  this.users = response.data
			  this.rol = this.users[0]['grupos'][0]['nombre'];
			  //alert(this.users[0]['grupos'][0]['nombre']);
			  this.mytable()
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
			editUser:function(user){
				this.filluser.id_municipio = user.id_municipio;
				this.filluser.nombre = user.nombre;
				this.filluser.apellido = user.apellido;
				this.filluser.tipo_documento = user.tipo_documento;
				this.filluser.num_identificacion = user.num_identificacion;
				this.filluser.direccion = user.direccion;
				this.filluser.telefono = user.telefono;
				this.filluser.email = user.email;
				this.filluser.password = user.password;
				this.filluser.administrador = user.administrador;
				this.filluser.staf = user.staf;
				this.filluser.activo = user.activo;
				this.filluser.rol = user.grupos[0]['id_grupo'];
				this.filluser.url_imagen = user.url_imagen;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id_solucion;
            	$("#formUpdateUser").attr("action",url);
				$("#editUser").modal("show");
			},
			deleteSolucion:function(solucion){
				var url = "solucion/"+solucion;
		    	axios.delete(url).then(response=>{                    
                    //$("#detailcompetencia").modal("hide");
                    if(response.data != 0){
						$.sweetModal({
							content: 'No se ha podido eliminar ya que tiene usuarios asociadas ',
							icon: $.sweetModal.ICON_WARNING
						});
                   }else{
                      	 $.sweetModal({
                             content: 'Solución eliminada correctamente',
                             icon: $.sweetModal.ICON_SUCCESS
                     	});
                     	this.getSoluciones();
                   }
		    	});
			},
			getGrupos:function(){
				var url = "/categorias";
				axios.get(url).then(responce => {
					this.roles = responce.data;
				});
			},
			getDepartamentos:function(){
				var url = "/departamentos"
				axios.get(url).then(responce => {
					this.departamentos = responce.data;
				});
			},
			onChange: function onChange() {
				var id_departamento = event.target.value;
				var url = "/municipios/"+id_departamento;
				axios.get(url).then(responce => {
					this.municipios = responce.data;
				});
			}        
    },
  });