new Vue({
    el:"#appRetosSectores",
    created:function() {
        this.getretossector();               
    },   
    data:{
        retos:[],
    },
    methods:{
        getretossector:function(){
            const url = "/listaRetosSector";
            axios.get(url).then(responce => {
                this.retos = responce.data;           
            });            
        },  
        solucionesReto:function(reto){
            const url = "/SolucionesReto/"+reto;
            axios.get(url).then(responce => {
               $(location).attr("href","/SolucionesReto/"+reto);              
            });  
        }
    },    
});