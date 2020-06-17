const app = new Vue({      
    methods: {
        saludar:function(){
            return alert('Hola, todo Bien, todo correcto :)');
        },
        estado:function(obj,contenidos = null){
            this.limpiarEstado(obj);
            $(obj).removeClass('d-none');
            if(typeof contenidos !== undefined && contenidos !== null && contenidos.length == 2){
                $(obj).children().get().forEach(function(element, index){
                    $(element).append(contenidos[index]);
                }); 
            }else{  
                $(obj).addClass('d-none');
            }                     
        },
        limpiarEstado:function(obj){
            return $(obj).children().get().forEach(element => {
                $(element).empty();
            });
        },
        vaciarObjeto:function(obj){
            return $(obj).empty();
        },
        vistaCargando:function(){
            let loading = document.createElement('div'),
                icon = document.createElement('i');
                $(icon).addClass('fas fa-spinner rotar fa-2x');
                $(loading).css({
                    background:'white',
                    height:'100%',
                    width:'100%',
                    position:'fixed',
                    left:'0px',
                    top:'0px',
                    'z-index': '1039',
                    display:'flex',
                    'justify-content':'center',
                    'align-items':'center'
                });
            $(loading).attr('id','view-loading');
            loading.appendChild(icon);
            return loading;
        },
        cargando:function(){
            return $('body').append(this.vistaCargando());
        },        
        finalCarga:function(){
            return $("div#view-loading").fadeOut('slow');
        },
        buttonLoading:function(btn,clear = null){            
            if(clear === true && clear !== null){
                $(btn).empty();
            }
            $(btn).attr('disabled','disabled')
                .append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        },
        buttonDone:function(obj,content){
            this.clear(obj);
            $(obj).append(content).removeAttr('disabled');
        },
        clear:function(btn){            
            $(btn).empty();            
        },
        //Validacion de formularios        
        obtenerInputs:function(form, filtros){            
            let inputs = $(form).find("input").get().filter(element => {                
                return filtros.tipos.some(tipo => $(element).attr('type') === tipo) == true;                                                 
            });             
            if( Object.keys(filtros.otros).length > 0 ){
                let exepciones = (filtros.hasOwnProperty("idExepcion") == true) ? filtros.idExepcion : [];                
                for(const prop in filtros.otros){                    
                    $(form).find(`${filtros.otros[prop]}`).get().forEach(element => {                        
                        if(!exepciones.some(ex => $(element).attr('id') === ex)){
                            inputs.push(element);
                        }                                                  
                    });
                }
            }
            return inputs;
        },
        validarInputs:function(dataInputs){            
            let invalidInputs = dataInputs.filter(element => {
                return element.value == "";
            });
            return invalidInputs;
        },
    },
});
