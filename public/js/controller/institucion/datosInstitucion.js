new Vue({
    created:function(){                 
        /**
         * Procedimientos estandar.(AppController)
         */
        app.estado($("div#estado"),this.estados.off); 
        app.cargando();        

        this.consultarDatosInstitucion();        
    },        
    el:'#institucion',
    data:{                       
        datosActualizar:null,                 
        estados:{            
            off:["<i class='fas fa-arrow-circle-up'></i>",
                "Por favor especificar valores de busqueda."],
            load:['<i class="fas fa-spinner rotar"></i>',
                "Cargando..."],
            empty:['<i class="fas fa-ellipsis-h"></i>',
                "No se encontraron coincidencias."],
            on:null,
        },              
        datosQuitarActividad:{
            id_clase:null,
            id_institucion:null,
        },
        texto:null,
        filtro:'descripcion', 
        act_seleccionadas: new Array,                             
    },
    methods:{   
        consultarDatosInstitucion:function(){                        
            let url = "/datosInstitucion";
            axios.post(url).then(responce => {                
                this.datosActualizar = responce.data;                           
                $(this.datosActualizar[0].actividades).get().forEach(element => {                    
                    this.act_seleccionadas.push(element.pivot.codigo 
                        +':'+ element.pivot.id_clase 
                        +':'+ element.descripcion
                        +':'+ element.pivot.tipo);
                });
                app.finalCarga();                                                                      
            });            
        },
        actualizarDatosInstitucion:function(){            
            let url = "actualizarDatosInstitucion/" + this.datosActualizar[0].id_institucion;                
            axios.put(url,this.datosActualizar[0]).then(responce => {                
                app.buttonDone($("button#actualizar"),"Guardar Cambios");                                
                this.tool("button#actualizar",'Datos actualizados. :)');                
                this.reload();                
            });
        },
        editarDato:function(event){
            return $(event.currentTarget).parents('div.input-group').find('input, select, textarea').get().forEach(element => {
                $(element).removeAttr('disabled').focus();
            });
        },
        desactivar:function(event){            
            return $(event.currentTarget).attr({'disabled':'disabled'});            
        }, 
        activar:function(selector){
            return $(selector).removeAttr('disabled');
        },              
        consultaCodCIIU:function(){
            this.estados.on = null;                   
            app.estado($("div#estado"),this.estados.load);
            let url = "/consultaCIIU/" + this.texto + "/filtro/" + this.filtro;
            axios.get(url).then(responce => {
                if(typeof responce.data !== undefined && responce.data.length > 0){                    
                    this.estados.on = responce.data;
                    app.estado($("div#estado"));
                }else{
                    app.estado($("div#estado"),this.estados.empty);
                }  
                this.texto = "";                           
            });
        },
        verificarActividadesEconomicas:function(event){                                      
                let valor = event.currentTarget.value + ':' + event.currentTarget.placeholder;
                if(event.currentTarget.checked === true){                    
                    if(this.act_seleccionadas.length < 4){
                        if(!this.verificarActSelectionadas(valor).length > 0){
                        this.act_seleccionadas.push(valor);
                        }
                    } else {
                        event.currentTarget.checked = false;             
                        alert('Ya ha seleccionado el tope maximo de actividades.');                       
                    } 
                }else{                    
                    this.act_seleccionadas = this.act_seleccionadas.filter(element => {
                        return element.indexOf(valor.split(':')[0]) == -1;
                    }) ;
                }                
        },
        quitarActividad:function(index, valor){  
            let inputCheked = $("ul#listaActividadesConsultadas").find("input[value='" + valor + "']");            
            if(typeof inputCheked[0] !== undefined && inputCheked.length > 0){
                inputCheked[0].checked = false;
            }
            return this.act_seleccionadas.splice(index,1);
        },
        verificarActSelectionadas:function(texto){
            return $(this.act_seleccionadas).get().filter(element =>{
                return String(element).indexOf(texto) !== -1;
            });
        },
        eliminarActividad:function(id_clase, id_institucion, tipo, id_button){                         
            if(confirm('Esta segur@?') == true && tipo !== 'primaria'){
                app.buttonLoading($('button#' + id_button),true);
                let url = "quitarActividad";  
                this.datosQuitarActividad.id_clase = id_clase;
                this.datosQuitarActividad.id_institucion = id_institucion;            
                axios.delete(url,{data:{
                        id_clase:id_clase,
                        id_institucion:id_institucion}
                }).then(responce => {                    
                    this.reload();
                    if($('button#' + id_button).get().length >0 ){
                        app.buttonDone($('button#' + id_button),'<i class="fas fa-times-circle"></i>');
                    }                                        
                });                                
            }else{
                alert('No se puede eliminar la actividad primaria.');
            }            
        },
        verificarActividadesSecundarias:function(actividades){
            return $(actividades).get().filter(element => {
                return element.pivot.tipo === 'secundaria';
            });
        },       
        sending:function(e){
            app.buttonLoading(e.target);
        },
        tool:function(selector, content = null){
            $(selector).tooltip({                
                title:(content !== null)?content : "Sueccess",
                placement:"bottom",
                trigger:"manual",
            });
            $(selector).tooltip("show");            
        },
        hideTool:function(event){            
            $(event.target).tooltip("hide");
        },
        reload:function(){          
            this.act_seleccionadas = new Array;
            this.consultarDatosInstitucion();
        },
    },
});