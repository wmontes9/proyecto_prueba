new Vue({
    el:"#nav",
    created:function() {
        this.getRoles();               
    },   
    data:{
        roles:[],
        rolElegido:{ 
            rol:null,
        },
        rolActual:null,        
        reloadTo: "/home",
    },
    methods:{
        mytable(){
			const newLocal = '#retolist';
			$(function(){
				$(newLocal).DataTable();
			});
		},
        getRoles:function(){
            const url = "/listaRoles";
            axios.get(url).then(responce => {
                this.roles = responce.data;                
            });            
        },
        cambiaRol: function(){
            if($('#roles').val() !== ""){
                //$('#roles').parent().find('label').remove();
                const url =  '/cambiarRol';                
                axios.post(url,this.rolElegido).then(responce => {
                    location.href = this.reloadTo;  
                });
            }                        
        },  
        rolFocus:function(event){
            $(event.currentTarget).click();
            return $(event.currentTarget).parent("div.label-input").find("label").fadeOut();            
        },
        rolBlur:function(event){
            return $(event.currentTarget).parent("div.label-input").find("label").fadeIn();
        },
    },    
});