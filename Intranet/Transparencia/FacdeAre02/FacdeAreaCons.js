//-------------------------------------------------------------------------
//Funcion de alta 
document.addEventListener('click', 
function (event) { 
  if (event.target.classList.contains('Nuev')) {
        // Redirigir a la página de modificación
        window.location.href = 'FacdeAreForm.php?PaCRUD01=A&PaCRUD02=0';
    }
  else if (event.target.classList.contains('Modi')) {
     // Botón de Modificar presionado
     const CampRefe = event.target.getAttribute('CampRefe');
     // Redirigir a la página de modificación con el ID
     window.location.href = 'FacdeAreForm.php?PaCRUD01=M&PaCRUD02=' + CampRefe;
    } 
 else if (event.target.classList.contains('Elim')) {
    // Botón de Modificar presionado
    const CampRefe= event.target.getAttribute('data-id');
    // Redirigir a la página de modificación con el ID
    if (confirm('¿Estás seguro de que deseas eliminar el registro?')) 
      { window.location.href = 'FacdeAreForm.php?PaCRUD01=B&PaCRUD02=' + CampRefe; }
 }    
});

//-------------------------------------------------------------------------
function CargaEjercicio(Param)
  { location.href = "FacdeAreCons.php?Param1="+Param; }