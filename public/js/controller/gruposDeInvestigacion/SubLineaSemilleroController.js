new Vue({
    el:"#appSubLineaSemillero",
    created:function() {
        this.getSubLineaSemilleros();               
    },   
    data:{
        SubLineaSemilleros:[],
    },
    methods:{
        getSubLineaSemilleros:function(){
            const url = "/listaSubLineaSemilleros";
            axios.get(url).then(responce => {
                this.SubLineaSemilleros = responce.data;           
            });            
        },  

      
       
    },    
});

