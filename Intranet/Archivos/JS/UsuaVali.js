function validar(){
    var UNumEmpl = $("#UNumeroEmpleado").val(),
        UStatus  = $("#UStatus").val(),
        UNombre  = $("#UNombre").val(),
        UPaterno = $("#UPaterno").val(),
        UMaterno = $("#UMaterno").val(),
        UPueFuna = $("#UPuestoFuncional").val(),
        UFoto    = $("#UFoto").val(),
        UFechAlt = $("#UFechaAlta").val(),
        UFechBaj = $("#UFechaBaja").val(),
        UFechMod = $("#UFechMod").val(),
        UServAct = $("#UServidorAct").val();
    

    if ( UNumEmpl == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UNumeroEmpleado.focus();
        return false;
    }else if ( UStatus == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UStatus.focus();
        return false;
    }else if ( UNombre == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UNombre.focus();
        return false;
    }else if ( UPaterno == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UPaterno.focus();
        return false;
    }else if ( UMaterno == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UMaterno.focus();
        return false;
    }else if ( UPueFuna == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UPuestoFuncional.focus();
        return false;
    }else if ( UFoto == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UFoto.focus();
        return false;
    }else if ( UFechAlt == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UFechaAlta.focus();
        return false;
    }else if ( UFechBaj == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UFechaBaja.focus();
        return false;
    }else if ( UFechMod == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UFechMod.focus();
        return false;
    }else if ( UServAct == "" ) {
        $("#mensaje1").fadeIn();
        document.formulario.UServidorAct.focus();
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
