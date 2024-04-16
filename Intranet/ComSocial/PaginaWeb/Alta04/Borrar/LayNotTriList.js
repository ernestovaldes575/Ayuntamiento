function CargaEjercicio(Param)
{ location.href = "LayNotTriList.php?Param1="+Param; }

function CargaEsta(Param)
{ location.href = "LayNotTriList.php?Param2="+Param; }

function CargImag(Param1,Param2,Param3,Param4)
{ Ruta = "ImgPagSubiArch.php?Param1="+Param1+
							"&Param2="+Param2+
							"&Param3="+Param3+
							"&Param4="+Param4; 
  Dime = "width=450 height=350 top=10 left=10 scrollbars";
  Cata = window.open(Ruta,"Carga documento",Dime);
}
