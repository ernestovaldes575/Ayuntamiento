//-------------------------------------------------------------------------
//Funcion de alta 
document.addEventListener('click', 
function (event) { 
  if (event.target.classList.contains('Nuev')) {
    const id = event.target.getAttribute('data-id');    
        // Redirigir a la página de modificación
        window.location.href = 'SupeUnidRegi.php?Param2='+id;
    }
 else if (event.target.classList.contains('Elim')) {
    // Botón de Modificar presionado
    const id = event.target.getAttribute('data-id');
    const EstSeg = event.target.getAttribute('data-edo');
    // Redirigir a la página de modificación con el ID
    if (confirm('¿Estás seguro de que deseas eliminar el registro?')) 
      { window.location.href = 'SupeUnidRegi.php?Param1='+id; }
 }    
});
