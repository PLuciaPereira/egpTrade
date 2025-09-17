$(document).ready (function(){
    $("#form-clientes").validate({
        rules:{
            razonSocial:{
                required: true,
            },
            domicilioFiscal:{
                required: true,
            }, 
            numero:{
                required: true,
                minlength:4
            },
            localidad:{
                required: true,
            },
            provincia:{
                required: true,
            },
            codigoPostal:{
                required: true,
                minlength:4
            },
            telefono:{
                required: true,
                minlength: 8,
                maxlength:11
            },
            email:{
                required: true,
                email:true
            },
            CUIT:{
                required:true,
                minlength: 11
            },
            condicion_id:{
                required:true
            }
        },
        messages:{
            razonSocial:{
                required:"El campo es obligatorio" 
            },
            domicilioFiscal:{
                required: "El campo es obligatorio"
            },
            numero:{
                required: "El campo es obligatorio",
                minlength: "Minimo 4 caracteres"
            },
            localidad:{
                required: "El campo es obligatorio"
            },
            provincia:{
                required: "El campo es obligatorio"
            },
            codigoPostal:{
                required: "El campo es obligatorio",
                minlength: "Minimo 4 caracteres"
            },
            telefono:{
                required: "El campo es obligatorio",
                minlength: "Minimo de 8 numeros",
                maxlength: "Maximo de 11 numeros"
            },
            email:{
                required: "El campo es obligatorio",
                email: "Ingrese un correo electronico valido"
            },
            CUIT:{
                required: "El campo es obligatorio",
                minlength: "El minimo de caracteres es de 11 (sin guiones)"
            },
            condicion_id:{
                required:"El campo es obligatorio"
            }
        }
    })
})
