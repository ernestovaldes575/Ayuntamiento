<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ejemplo</title>
</head>
<body>

<h2>Formulario de Ejemplo</h2>

<form id="miFormulario">
    <label for="nombre">Nombre:</label>
    <input type="text" id="V03" name="C03" onchange="blur" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="V04" name="C04" required><br><br>

    <label for="mensaje">Mensaje:</label><br>
    <textarea id="V05" name="C05" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" value="Enviar">

</form>

<h2>Datos del Formulario</h2>
<div id="datosFormulario">

</div>

<script>

    //?Obtenemos el id del formulario
    const formulario = document.getElementById('miFormulario');
    const inputC03 = document.getElementById('V03');
    
    formulario.addEventListener('submit',)
    
    
    
    
    
    inputC03.addEventListener('blur', alerta);

    function alerta(evt){

        console.log(evt.target.name)
    }

    console.log(inputC03);

    //?
    formulario.addEventListener('submit', function(evt) {

        //?Previene por default el comportamiento del submit
        evt.preventDefault();
        
        //? // Crear un nuevo objeto FormData basado en el formulario
        const formData = new FormData(formulario);

        //?// Obtener el elemento en el cual mostraremos los datos del formulario
        const datosFormulario = document.getElementById('datosFormulario');
        datosFormulario.innerHTML = ''; // Limpiar la lista antes de agregar nuevos datos

        //?
        formData.forEach((valor, clave) => {
            const listItem = document.createElement('a');
            listItem.textContent = `${clave}: ${valor}`;
            datosFormulario.appendChild(listItem);
        });
    });
</script>

</body>
</html>
