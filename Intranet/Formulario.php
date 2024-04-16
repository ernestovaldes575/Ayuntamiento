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
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mensaje">Mensaje:</label><br>
    <textarea id="mensaje" name="mensaje" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" value="Enviar">
</form>

<h2>Datos del Formulario</h2>
<ul id="datosFormulario"></ul>

<script>
    const formulario = document.getElementById('miFormulario');

    formulario.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(formulario);
        const datosFormulario = document.getElementById('datosFormulario');
        datosFormulario.innerHTML = ''; // Limpiar la lista antes de agregar nuevos datos

        formData.forEach((valor, clave) => {
            const listItem = document.createElement('li');
            listItem.textContent = `${clave}: ${valor}`;
            datosFormulario.appendChild(listItem);
        });
    });
</script>

</body>
</html>
