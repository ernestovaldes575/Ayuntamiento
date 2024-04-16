<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/build/css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center">
    <form id="PideDato" class="">
        <div class="bg-secondary p-5 shadow-lg mt-5">
            <div class="mb-4">
                <label for="nombre" class="text-white fw-semibold">Nombre:</label>
                <input type="text" id="VT01" name="nombre" class="form-control"/>
            </div>
            <div class="mb-4">
                <label for="apellido" class="text-white fw-semibold">Apellido:</label>
                <input type="text" id="VN02" name="apellido" class="form-control">
            </div>
            <div class="mb-4">   
                <label for="email" class="text-white fw-semibold">Email:</label>
                <input type="email" id="VC03" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" class="form-control" disabled >Leer Campos</button>
        </div>
    </form>


</body>
</html>

<script>
    const btnSubmit = document.querySelector('#PideDato button[type="submit"]')
    console.log(btnSubmit);

    leerCampos();
    comprobarFormulario()

    function leerCampos(){
        // Obtener el formulario por su ID
        var formulario = document.getElementById("PideDato");
        // Obtener todos los campos del formulario
        var campos = formulario.querySelectorAll('input');
        // Iterar sobre los campos y obtiene sus valores

        campos.forEach(function(campo){
            NombreID = campo.id;
            ANombID = NombreID.split("");
            ValiID = ANombID[1];

            if(ValiID != 'N'){ 
                switch (ValiID) {
                    case 'T': //Texto 
                        ValiCamp = 'valiText'
                        break;
                    case 'C'://Correo
                        ValiCamp = 'valiCorr'
                        break;
                    case 'F': //Fecha
                        ValiCamp = 'valiFech'
                        break;
                    case 'N': //Numeros
                        ValiCamp = 'valiNume'
                        break;
                    default:
                        break;
                }
                //!Seleccion de atributos del formulario
                // ?const inputTitulo = document.querySelector('#V03');
                EjecInst = "const "+NombreID+" = document.querySelector('#"+NombreID+"');";
                eval(EjecInst);
                //!Asignacion de Eventos
                // ?inputTitulo.addEventListener('blur',valiText);
                EjecInst = ""+NombreID+".addEventListener('blur',"+ValiCamp+");";
                eval(EjecInst);
                console.log(NombreID + ": " + campo.value);
            }
        });
    }



    function valiText(evt){
        // console.log(evt.target.parentElement);
        if(evt.target.value.trim()===''){
            console.log(evt.target.value);
            mostrarAlerta(`El campo ${evt.target.id} es obligatorios`, evt.target.parentElement);
            formulario[evt.target.id] = '';
            return; //?Termina la Ejecucion de la sentencia IF
        }
            limpiarAlerta(evt.target.parentElement);
            leerCampos();
            console.log(evt.target.values);
            comprobarFormulario();
    }





    function valiCorr(evt){
        // console.log(evt.target.parentElement);
        if(evt.target.value.trim()===''){
            mostrarAlerta(`El campo ${evt.target.id} es obligatorio`, evt.target.parentElement);
            formulario[evt.target.name] = '';
            comprobarFormulario();
            return; //?Termina la Ejecucion de la sentencia IF
        }
        limpiarAlerta(evt.target.parentElement);
        
        //Llenar valores
        // formulario[evt.target.name] = evt.target.value.trim().toLowerCase();
        
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
        var formulario = document.getElementById('PideDato');
        var campos = formulario.querySelectorAll('input');
        var valores = {}

        campos.forEach(function(input){


            NombreID = input.id;
            ANombID = NombreID.split("");
            ValiID = ANombID[1];

            if(ValiID != 'N'){ 
            valores[input.id] = input.value;
            if(Object.values(valores).includes('')) {
                btnSubmit.disabled = true;
            }else{
                btnSubmit.disabled = false;
            }
        }})
    }
</script>