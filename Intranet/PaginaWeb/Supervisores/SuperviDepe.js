//-------------------------------------------------------------------------
//Funcion de alta 
document.addEventListener('click', 
function (event) { 
  if (event.target.classList.contains('Modi')) {
    const id = event.target.getAttribute('data-id');    
    // Redirigir a la página de modificación
    window.location.href = 'SuperviDepeInc.php?Param1='+id;
    }
  else if (event.target.classList.contains('Regr')) {
      // Redirigir a la página de modificación con el ID
        window.location.href = '/Intranet/menuintranet.php'; 
   }   
});
