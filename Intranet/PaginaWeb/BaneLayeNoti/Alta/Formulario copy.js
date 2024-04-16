document.addEventListener('DOMContentLoaded',function(){
    const formulario = {
        C03: '',
        C04: '',
        C05: '',
        C06: ''
    }
    
    //!Seleccion de atributos del formulario
    const inputTitulo = document.querySelector('#V03');
    const inputDescripcion = document.querySelector('#V04');
    const inputFechInic = document.querySelector('#V05');
    const inputFechTerm = document.querySelector('#V06');
    const btnSubmit = document.querySelector('#formulario button[type="submit"]');
    

    //!Asignacion de Eventos
    inputTitulo.addEventListener('blur',valiText);
    inputDescripcion.addEventListener('blur',valiText); 
    inputFechInic.addEventListener('blur',valiText);
    inputFechTerm.addEventListener('blur',valiText);

    

    
    function valiText(evt){
        // console.log(evt.target.parentElement);
        if(evt.target.value.trim()===''){
            mostrarAlerta(`El campo ${evt.target.id} es obligatorio`, evt.target.parentElement);
            formulario[evt.target.name] = '';
            comprobarFormulario();
            return; //?Termina la Ejecucion de la sentencia IF
        }
        limpiarAlerta(evt.target.parentElement);
        //Llenar valores
        formulario[evt.target.name] = evt.target.value.trim().toLowerCase();
        //VERIFICA QUE LOS CAMPOS ESTEN LLENOS
        comprobarFormulario();
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
        if(alerta){
            alerta.remove();
        }
    }

    function comprobarFormulario(){
        console.log(formulario);
        if(Object.values(formulario).includes('')){
            btnSubmit.classList.add('opacity-50');
            btnSubmit.disabled = true;
        }else{
            btnSubmit.classList.remove('opacity-50');
            btnSubmit.disabled = false;
        }
    }


})