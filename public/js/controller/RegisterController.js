new Vue({
    created:function(){
        this.getIdentificationTypes()
        this.getRoles()
    },
    el:'#registro',
    data:{
        identificationTypes:[],
        roles:[],
    },
    methods: {
        getIdentificationTypes:function(){
            var url = "listaTiposId";
            axios.get(url).then(responce => {
                this.identificationTypes = responce.data;
            });
        },
        getRoles:function(){
            var url = "listaRoles";
            axios.get(url).then(responce => {
                this.roles = responce.data;
            });
        }        
    },
})