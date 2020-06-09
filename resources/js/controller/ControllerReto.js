new Vue({
    created:function(){
        this.getListaRetos();
    },
    el:"#retos",
    data:{
        fillReto:{"id":"","Titulo":"","Pregunta":""},
        retos:null,
    },
    methods:{
        getListaRetos:function(){
            let url = "/retos/getretos";
            axios.get(url).then(responce => {
                this.retos = responce.data;             
            });                        
        }
       
    }
});