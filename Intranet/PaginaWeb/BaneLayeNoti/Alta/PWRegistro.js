//-------------------------------------------------------------------------

//Funcion de alta 
document.addEventListener('click', 
function (event) { 
  if(event.target.classList.contains('Nuev')) {
        // Redirigir a la página de modificación
        window.location.href = 'PWRegistro.php?PaAMB01=A&PaAMB02=0&PaAMB03=01';
    }
else if (event.target.classList.contains('Modi')) {
     // Botón de Modificar presionado
      const id = event.target.getAttribute('data-id');
      const EstSeg = event.target.getAttribute('data-edo');
     // Redirigir a la página de modificación con el ID
      window.location.href = 'PWRegistro.php?PaAMB01=M&PaAMB02='+ id+"&PaAMB03="+EstSeg;
    } 
else if (event.target.classList.contains('Elim')) {
    // Botón de Modificar presionado
    const id = event.target.getAttribute('data-id');
    const EstSeg = event.target.getAttribute('data-edo');
    // Redirigir a la página de modificación con el ID
    if (confirm('¿Estás seguro de que deseas eliminar el registro?')) 
      { window.location.href = 'PWRegistro.php?PaAMB01=B&PaAMB02=' +id+ "&PaAMB03="+EstSeg; }
}    
});

//-------------------------------------------------------------------------
function CargEjer(Param)
{ location.href = "PWRegistroList.php?Param1="+Param; }


function CargEsta(Param)
{ location.href = "PWRegistroList.php?Param2="+Param; }

function CarImgPa(Param1,Param2,Param3,Param4)
{ 
  Ruta = "ImagPagiSubiArch.php?Param1="+Param1+
							"&Param2="+Param2+
							"&Param3="+Param3+
							"&Param4="+Param4; 
  Dime = "width=450 height=350 top=10 left=10 scrollbars";
  Cata = window.open(Ruta,"Carga documento",Dime);
}

function CargArchi(Param1,Param2,Param3,Param4)
{ Ruta = "DocuVisuSubiArch.php?Param1="+Param1+
							"&Param2="+Param2+
							"&Param3="+Param3+
							"&Param4="+Param4; 
  Dime = "width=450 height=350 top=10 left=10 scrollbars";
  Cata = window.open(Ruta,"Carga documento",Dime);
}
