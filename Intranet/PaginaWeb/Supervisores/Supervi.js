//-------------------------------------------------------------------------
//Funcion de alta 
document.addEventListener('click', 
function (event) { 
  if (event.target.classList.contains('Nuev')) {
      // Redirigir a la página de modificación
      window.location.href = 'Supervi.php?PaCRUD01=A&PaCRUD02=0';
    }
 else if (event.target.classList.contains('Modi')) {
    // Botón de Modificar presionado
    const id = event.target.getAttribute('data-id');
    // Redirigir a la página de modificación con el ID
    window.location.href = 'Supervi.php?PaCRUD01=M&PaCRUD02='+id; 
 } 
 else if (event.target.classList.contains('Elim')) {
  // Botón de Modificar presionado
  const id = event.target.getAttribute('data-id');
  // Redirigir a la página de modificación con el ID
  if (confirm('¿Estás seguro de que deseas eliminar el registro?')) 
     window.location.href = 'Supervi.php?PaCRUD01=B&PaCRUD02='+id;
 }    
});

//Carga Imagen
function CargImag(Param1)
{ Ruta = "SuperviSubiArch.php?Param1="+Param1; 
    Dime = "width=450 height=350 top=10 left=10 scrollbars";
    Cata = window.open(Ruta,"Carga documento",Dime);
}
