Vue.use(VueFormWizard)
new Vue({
    created:function(){
        this.getGrupos()
        this.getDepartamentos()
        this.getusuarios()
    },
    el:'#actualizacionuser',
    data:{
        
        fillusuario:{"id_municipio":"","nombre":"", "apellido":"",
        "tipo_documento":"","num_identificacion":"","direccion":"",
        "telefono":"","email":"","password":"","administrador":"",
        "staf":"","activo":"","url_imagen":""},
        usuario:[],
        identificationTypes:[],
        roles:[],
        departamentos:[],
        municipios:[],
        errores:[],
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
    },
    methods: {
        onComplete: function() {
            this.errores = [];
            if(this.fillusuario.nombre == '') {
                this.errores.push("El nombre es obligatorio.");
            } else {
                $("#target").submit();
            }
                   
        },
        onCompletee: function(){
            var ruta = $("#ruta").val();
            alert(this.id_usuario);
            	var url = ruta+""+this.id_usuario;
            	$("#formUpdateUsuario").attr("action",url);
			$("#formUpdateUsuario").submit();
		 },
        getusuarios:function(){
			var url = "perfil";
			axios.get(url).then(response=>{
                this.usuario= response.data
                //alert(this.usuario['nombre']);
                this.id_usuario = this.usuario['id_usuario'];
                this.fillusuario.nombre = this.usuario['nombre'];
                this.fillusuario.apellido = this.usuario['apellido'];
                this.fillusuario.url_imagen = this.usuario['url_imagen'];
                this.fillusuario.direccion = this.usuario['direccion'];
                this.fillusuario.telefono = this.usuario['telefono'];
                this.fillusuario.email = this.usuario['email'];
                var ruta = $("#ruta").val();
            	var url = ruta+""+this.id_usuario;
            	$("#formUpdateUsuario").attr("action",url);
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
})