new Vue({
    el:"#appSolucionesReto",
    created:function() {
        this.getsolucionesreto();               
    },   
    data:{
        soluciones:[],
    },
    methods:{
        getsolucionesreto:function(){
            const url = "/listaSolucionesReto";
            axios.get(url).then(responce => {
                this.soluciones = responce.data;         
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