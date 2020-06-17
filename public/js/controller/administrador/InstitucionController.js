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
        datosActualizar:{
            id:null,
            razon_social:null,
            nit:null,
            tiempo_constitucion:null,
            email:null,
            telefono:null,
            direccion:null,
            num_empleados:null,
        },         
        listaEmpresas:null, 
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
        // editar:function(id, razon_social, nit, tiempo_constitucion, correo, telefono, direccion, num_empleados){
        //     this.datosActualizar.id = id;
        //     this.datosActualizar.razon_social = razon_social;
        //     this.datosActualizar.nit = nit;
        //     this.datosActualizar.tiempo_constitucion = tiempo_constitucion;
        //     this.datosActualizar.correo = correo;
        //     this.datosActualizar.telefono = telefono;
        //     this.datosActualizar.direccion = direccion;
        //     this.datosActualizar.num_empleados = num_empleados;
        // },
        // listarInstituciones: function(){
        //     var url = 'listarInstituciones'
        //     axios.get(url).then(responce => {
        //         this.instituciones = responce.data
        //     });
        // },
        // nuevaInstitucion: function() {
        //     var url = 'nuevaInstitucion'
        //     axios.post(url,this.nuevainstitucion).then(responce => {
        //         $('#insert_i').modal('hide');
        //         location.reload();
        //     })
        //   },
        // actualizarInstitucion:function(){
        //     let url = "editarInstitucion/" + this.datosActualizar.id

        //     axios.put(url,this.datosActualizar).then(responce => {
        //         if(responce.data === 'success'){
        //             alert('registro actualizado');
        //         } else {
        //             alert('error');
        //         }
        //     })
        // },
        // eliminarInstitucion:function(){
        //     let url = "eliminarInstitucion/" + this.datosActualizar.id

        //     axios.delete(url).then(responce => {
        //         if(responce.data === 'success'){
        //             alert('registro eliminado');
        //         } else {
        //             alert('error');
        //         }
        //     })
        // }, 
        consultarDatosInstitucion:function(){
            let url = "/datosInstitucion";
            axios.post(url).then(responce => {
                console.log(responce.data);
                app.finalCarga()
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
        buscarInstitucion:function(){
            if(this.nit_consulta !== null){
                let url = 'instituciones/consultaInstitucion/' + this.nit_consulta;
                axios.get(url).then(responce => {                    ;
                        if(responce.data.indexOf('html') !== -1){
                            responce.data = "";
                        }else{                            
                            this.listaEmpresas = (this.verificarData(responce.data) !== null) ? responce.data : alert('No se encontraron resultados.');
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
        validarFormulario:function(){
            $('span.badge').get().forEach(element =>{
                element.textContent = "0";
            });
            let form = $('form#formEmpresa');

            $(form).find('input[name!="ciiu"],textarea').get().forEach(element => {
                if(element.value == ""){
                    element.className += " is-invalid ";
                    this.errores(element);
                }else{
                    if($(element).hasClass('is-invalid') == true){
                        $(element).removeClass('is-invalid');
                    }
                    $(element).addClass('is-valid');                    
                }
            });            
        },
        errores:function(element){
            let idTab = $(element).parents('div[role="tabpanel"]').attr('id'),
                badge = $('ul#pills-tab').find('a[href="#' + idTab + '"]').children()[0];
                badge.textContent = Number(badge.textContent) + 1;
        }
    },
});