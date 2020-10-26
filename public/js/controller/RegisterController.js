new Vue({
    created:function(){
        this.getGrupos()
        this.getDepartamentos()
    },
    el:'#registro',
    data:{
        identificationTypes:[],
        roles:[],
        departamentos:[],
        municipios:[],
    },
    methods: {

        getGrupos:function(){
            var url = "listaGrupos";
            axios.get(url).then(responce => {
                this.roles = responce.data;
            });
        },
        getDepartamentos:function(){
            var url = "listaDepartamentos"
            axios.get(url).then(responce => {
                this.departamentos = responce.data;
            });
        },
        onChange: function onChange() {
            var id_departamento = event.target.value;
            var url = "listaMunicipios/"+id_departamento;
            axios.get(url).then(responce => {
                this.municipios = responce.data;
            });
        }        
    },
})