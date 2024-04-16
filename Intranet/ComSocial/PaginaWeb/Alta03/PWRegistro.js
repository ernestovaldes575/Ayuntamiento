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

function CargaEjercicio(Param)
{ location.href = "PWRegistroList.php?Param1="+Param; }

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
