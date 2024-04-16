//-------------------------------------------------------------------------
//Funcion de alta 
document.addEventListener('click', 
function (event) { 
  if (event.target.classList.contains('Nuev')) {
        // Redirigir a la página de modificación
        window.location.href = 'PWRegistro.php?PaAMB01=A&PaAMB02=0';
    }
  else if (event.target.classList.contains('Modi')) {
     // Botón de Modificar presionado
     const id = event.target.getAttribute('data-id');
     // Redirigir a la página de modificación con el ID
     window.location.href = 'PWRegistro.php?PaAMB01=M&PaAMB02=' + id;
    } 
 else if (event.target.classList.contains('Elim')) {
    // Botón de Modificar presionado
    const id = event.target.getAttribute('data-id');
    // Redirigir a la página de modificación con el ID
    if (confirm('¿Estás seguro de que deseas eliminar el registro?')) 
      { window.location.href = 'PWRegistro.php?PaAMB01=B&PaAMB02=' + id; }
 }    
});

//-------------------------------------------------------------------------

function CargEjer(Param)
{ alert(Param);
  location.href = "PWRegistroList.php?Param1="+Param; }

function CargaEsta(Param)
{ location.href = "PWRegistroList.php?Param2="+Param; }

function CargImag(Param1,Param2,Param3,Param4)
{ Ruta = "ImgPagSubiArch.php?Param1="+Param1+
							"&Param2="+Param2+
							"&Param3="+Param3+
							"&Param4="+Param4; 
  Dime = "width=450 height=350 top=10 left=10 scrollbars";
  Cata = window.open(Ruta,"Carga documento",Dime);
}

//----------------------------------------------------------------
function validar(){
    var AFechaInicio = $("#AFechaInicio").val(),
    AFechaTermino = $("#AFechaTermino").val(),
    ADenominacion = $("#ADenominacion").val(),
    AFundamento = $("#AFundamento").val(),
    AHipervinculo = $("#AHipervinculo").val(),
    AAreaResp = $("#AAreaResp").val(),
    ANota = $("#ANota").val();
    

    if ( AFechaInicio == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.AFechaInicio.focus();
        return false;
    }else if ( AFechaTermino == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.AFechaTermino.focus();
        return false;
    }else if ( ADenominacion == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.ADenominacion.focus();
        return false;
    }else if ( AFundamento == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.AFundamento.focus();
        return false;
    }else if ( AHipervinculo == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.AHipervinculo.focus();
        return false;
    }else if ( AAreaResp == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.AAreaResp.focus();
        return false;
    }else if ( ANota == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.ANota.focus();
        return false;
    }else {
        document.formulario.submit();
    }
}

function checaMensaje(valor) {
    var dato = valor;

    if ( dato != "") {
        $("#mensaje1").fadeOut();
    }
}

//-------------------------------------------------------
function validarFormulario() {
    const formulario = document.getElementById('miFormulario');
    const campos = formulario.querySelectorAll('input');

    campos.forEach(campo => {
        const tipo = campo.type;
        const valor = campo.value;

        switch (tipo) {
            case 'text':
                // Validación para campos de texto
                if (valor.trim() === '') {
                    mostrarError('El campo ' + campo.name + ' es obligatorio.');
                }
                // Puedes agregar más validaciones para texto si es necesario
                break;
            case 'email':
                // Validación para correo electrónico
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(valor)) {
                    mostrarError('El campo ' + campo.name + ' no tiene un formato de correo electrónico válido.');
                }
                break;
            case 'number':
                // Validación para campos numéricos
                if (isNaN(valor)) {
                    mostrarError('El campo ' + campo.name + ' debe ser un número.');
                }
                // Puedes agregar más validaciones numéricas si es necesario
                break;
            case 'date':
                    // Validación para campos de fecha
                    if (valor === '') {
                        mostrarError('El campo ' + campo.name + ' es obligatorio.');
                    }
                    else        
                     { const dateObject = new Date(fecha);
                       if (!isNaN(dateObject.getTime()) ) 
                     {
                        mostrarError('El campo ' + campo.name + ' es obligatorio.');
                     }}
x                    break;
            case 'time':
                    // Validación para campos de hora
                    if (valor === '') {
                        mostrarError('El campo ' + campo.name + ' es obligatorio.');
                    }
                    // Puedes agregar validaciones adicionales para la hora si es necesario
                    break;
                default:
                // Otra lógica para otros tipos de campos
                break;
        }
    });
}

function mostrarError(mensaje) {
    // Aquí puedes mostrar los mensajes de error, ya sea agregando elementos HTML para mostrarlos en la página o utilizando console.log() para fines de demostración.
    console.error(mensaje);
    // Ejemplo para mostrar errores en un elemento div con id "errores"
    // const erroresDiv = document.getElementById('errores');
    // erroresDiv.innerHTML += '<p>' + mensaje + '</p>';
}
