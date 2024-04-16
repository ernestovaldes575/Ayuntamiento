const btnSubmit = document.querySelector('#PideDato button[type="submit"]');

const correo = {
    email: ''
} 

leerCampos();

function leerCampos(){
    var campos = document.querySelectorAll('#PideDato input');
    campos.forEach(function(campo){

        NombreID = campo.id;
        ANombID = NombreID.split("");
        ValiID = ANombID[1];

        if(ValiID != 'S'){ 
            //!Seleccion de atributos del formulario
            // ?const inputTitulo = document.querySelector('#V03');
            EjecInst = "const "+NombreID+" = document.querySelector('#"+NombreID+"');";
            eval(EjecInst);
            //!Asignacion de Eventos
            // ?inputTitulo.addEventListener('blur',valiText);
            EjecInst = ""+NombreID+".addEventListener('blur', valiText);";
            eval(EjecInst);
            // console.log(NombreID + ": " + campo.value);
        }
    });
}
function valiText(evt){
    // console.log(evt.target.parentElement);
    console.log(evt.target.value); 
    if((evt.target.value.trim()==='')){
        console.log('Error')
        mostrarAlerta('El campo es obligatorio', evt.target.parentElement);
        formulario[evt.target.id] = '';
        return; //?Termina la Ejecucion de la sentencia IF
    }
    if(evt.target.type === 'email' && !validaEmail(evt.target.value)){
        //Llamado de la funcion con dos parametros - "mensaje", "referencia"
        mostrarAlerta('El correo no es valido.', evt.target.parentElement);
        email[evt.target.name] = '';
        comprobarEmail();
        return;
    }
        limpiarAlerta(evt.target.parentElement);
        leerCampos();
        comprobarFormulario();
        // comprobarEmail();
}
function comprobarFormulario(){
    var campos = document.querySelectorAll('#PideDato input');
    var valores = {}
    campos.forEach(function(input){
        // console.log(input);

        NombreID = input.id;
        ANombID = NombreID.split("");
        ValiID = ANombID[1];

        if(ValiID !== 'S'){ 
        valores[input.id] = input.value;
            if(Object.values(valores).includes('')){
                btnSubmit.classList.add('opacity-50')
                btnSubmit.disabled = true;
            }else{
                btnSubmit.classList.remove('opacity-50')
                btnSubmit.disabled = false;
            }
        }
    })
}

function comprobarEmail(){
    console.log(Object.values(correo).includes());
}

function validaEmail(correo){
    //Expresión Regular
    const regex =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/ 
    const resultado = regex.test(correo);
    return resultado;
}
//!INYECTAR HTML
function mostrarAlerta(mensaje, referencia){
    limpiarAlerta(referencia);
    const error = document.createElement('DIV');
    error.textContent = mensaje;
    error.classList.add('Alerta');
    referencia.appendChild(error);
}
function limpiarAlerta(referencia){
    const alerta = referencia.querySelector('.Alerta');
        alerta?.remove();
}

