const cargarJSONArrayBtn = document.querySelector('#cargarJSONArray');
cargarJSONArrayBtn.addEventListener('click', obtenerDatos);

function obtenerDatos(){
    const url = '../SupeListInic01.php';
    
    fetch(url)
        .then(respuesta => respuesta.json())
        .then(resultado => mostrarHTML(resultado));
}

function mostrarHTML(empleados){
    const contenido = document.querySelector('.contenido');
    let html = '';
    empleados.forEach(empleado => {
        const {SServPubli, SCategoria, SFoto} = empleado;
        html += `
            <p>Empleado: ${SServPubli}</p>
            <p>Empresa: ${SCategoria}</p>
            <p>Foto: ${SFoto}</p>
        `
    });
    contenido.innerHTML = html;
}