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
