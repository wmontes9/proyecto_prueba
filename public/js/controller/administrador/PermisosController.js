new Vue({
    created:function(){  
        this.controlBotones("div#editar_permisos",true);                
    }, 
    mounted:function() {
        app.estado($("div#estado"),this.estados.off);        
    },   
    el:"#permisos",
    data:{
        permisosParaAsignar:null,
        permisosParaRemover:null,
        estados:{            
            off:["<i class='fas fa-arrow-circle-up'></i>",
                "Por favor seleccione un grupo"],
            load:['<i class="fas fa-spinner rotar"></i>',
                "Cargando..."],
            empty:['<i class="fas fa-ellipsis-h"></i>',
                "No hay datos para el grupo seleccionado."],
            on:null,
        },
        grupo:null, 
    },
    methods: {
        editarPermisos:function(event){                   
            this.controlBotones("table#grupos", true);
        },
        controlBotones:function(selector, action){
            this.botones(selector).forEach(element => {
                return (action === true) ? element.disabled = "disabled" : element.disabled = "";
            });
        },
        botones:function(selector){
            return $(selector).find("button").get(); 
        },
        seleccionarAgregar:function(event){            
            (this.verificar("ul#lista_permisos input[type='checkbox']").length > 0) ? $('button#add').removeAttr('disabled') : $('button#add').attr('disabled',true);
            this.pintarSeleccionado(event);
        },
        seleccionarRemover:function(){
            if(this.verificar("ul#lista_permisos_asignados input[type='checkbox']").length > 0) {
                $('div#control_permisos').slideDown(500);
                this.controlBotones('div#consulta_permisos',false);
            }else{
                $('div#control_permisos').slideUp(500);
                this.controlBotones('div#consulta_permisos',true);
            }
            this.pintarSeleccionado(event);
        },
        pintarSeleccionado:function(e){
            if(e.currentTarget.checked === true){                                               
                return $(e.currentTarget).parent("li").css({
                    background:"#7E7E7E",
                    color:"white",
                });
            }else{
                return $(e.currentTarget).parent("li").css({
                    background:"white",
                    color:"black",
                });
            }  
        },
        verificar:function(selector){
            return $(selector).get().filter(element => element.checked === true);            
        },
        agregarPermisosA:function(){           
            this.permisosParaAsignar = $("ul#lista_permisos li").children('input[type="checkbox"]').get().filter(element => element.checked === true);            
        },
        filtrarPermisos:function(event){            
            $("ul#lista_permisos").children().get().forEach(element => {                
                if ($(element).find("label").text().indexOf($(event.currentTarget).val()) == -1){                    
                    $(element).attr('style','display:none !important');
                }else{
                    $(element).removeAttr('style');
                }
            });
        },
        consultar:function(event){                                    
            this.estados.on = null;            
            $(event.currentTarget).attr('disabled',true);
            app.estado($("div#estado"),this.estados.load);
            var url = '/permisos/consultar/' + this.grupo;
            axios.get(url).then(responce => {                
                if(responce.data !== undefined && responce.data.length > 0){                  
                    app.estado($("div#estado"));                                 
                    this.estados.on = responce.data;
                }else{
                    app.estado($("div#estado"),this.estados.empty);                                                     
                }
                $(event.target).removeAttr('disabled');                
            });            
        },               
    },
});