new Vue({
    el:"#grupoInvestigacion",
    data:{
        grupos:[],
        verGrupo:{
            nombre:"",
            sigla:"",
            logo:"",
        },
    },
    methods:{
        consultarGrupo:function(){
            if ($("input[name='consulta_sigla']").val() !== "") {
                console.log($("input[name='consulta_sigla']").val() );
            let url = "/investigacion/consulta_grupo/" + $("input[name='consulta_sigla']").val();
                axios.get(url).then(responce => {
                    this.grupos = responce.data;
                });
            }
        },
        verGrupoInvestigacion: function(datos){
            this.verGrupo.nombre = datos.nombre;
            this.verGrupo.sigla = datos.sigla;
            this.verGrupo.logo = datos.logo;
        }
    },
});