new Vue({
    created:function(){                 
        /**
         * Procedimientos estandar.(AppController)
         */
        app.estado($("div#estado"),this.estados.off); 
        app.cargando();
        app.finalCarga();                
    },        
    el:'#institucion',
    data:{
        app:null,
        nit_consulta:null,
        instituciones:[],
        nuevainstitucion:{
            razon_social:'',
            nit:'',
            tiempo_constitucion:'',
            correo:'',
            telefono:'',
            direccion:'',
            num_empleados:'',
        },   
        nit_consulta:null,             
        lista_empresas:null, 
        estados:{            
            off:["<i class='fas fa-arrow-circle-up'></i>",
                "Por favor especificar valores de busqueda."],
            load:['<i class="fas fa-spinner rotar"></i>',
                "Cargando..."],
            empty:['<i class="fas fa-ellipsis-h"></i>',
                "No se encontraron coincidencias."],
            on:null,
        }, 
        texto:null,
        filtro:'descripcion', 
        act_seleccionadas: new Array,                        
    },
    methods:{                
        buscarInstitucion:function(e){                 
            if(this.nit_consulta !== null){
                app.buttonLoading(e.currentTarget);
                let url = 'instituciones/consultaInstitucion/' + this.nit_consulta;
                axios.get(url).then(responce => {  
                    app.buttonDone($("button#consultarInstitucion").get(),"Buscar Intitucion"); 
                    if(responce.data.indexOf('html') !== -1){
                        responce.data = "";
                    }else{                                        
                        this.lista_empresas = (this.verificarData(responce.data) !== null) ? responce.data : alert('No se encontraron resultados.');                        
                        
                    }                   
                });
                   
            }else{
                alert('Debe especificar un valor de busqueda.');
            }
        },
        verificarData:function(data){
            return (typeof data !== undefined && data !== null && data.length > 0) ? data : null;
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
                        this.act_seleccionadas.push(valor) 
                    } else {
                        event.currentTarget.checked = false;                
                    alert('Ya ha seleccionado el tope maximo de actividades.');                       
                    } 
                }else{
                    this.act_seleccionadas = this.act_seleccionadas.filter(element => {
                        return element !== valor;
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
        errores:function(element){            
            let idTab = $(element).parents('div[role="tabpanel"]').attr('id'),
                badge = $('ul#pills-tab').find('a[href="#' + idTab + '"]').children()[0];
                badge.textContent = Number(badge.textContent) + 1;
        },
        validarFormulario2:function(){  
            $('span.badge').get().forEach(element =>{
                element.textContent = "0";
            });
            let form = $('form#formEmpresa');
            let listInputs = app.obtenerInputs(form,{
                tipos:['text','number','email','radio'],
                otros:['select', 'textarea'],
                idExepcion:['filtro']
            });              
            listInputs.forEach(element => {
                if($(element).hasClass('is-invalid') === true){
                    $(element).removeClass('is-invalid');
                }               
            });                    
            let invalidFormControl = app.validarInputs(listInputs);            
            if(invalidFormControl.length > 0){
                invalidFormControl.forEach(element => {
                    element.className += " is-invalid ";
                    this.errores(element);
                }); 
            }else{   
                let actividadPrimaria = $(form).find("input[name='primaria']").get();             
                if(actividadPrimaria.length > 0){
                    $("div#insert_i").modal("hide");
                    app.cargando();
                    $(form).submit();
                }else{
                   let alert = $("div#actividades_seleccionadas").find('div#actividades').get();
                   if($(alert).hasClass("alert-secondary")){
                        $(alert).removeClass("alert-secondary");
                        $(alert).addClass("alert-danger");
                   }else{
                        $(alert).hasClass("alert-secondary");
                   }
                    this.errores($("div#actividades_seleccionadas"));
                };
            }                      
        },
    },
});