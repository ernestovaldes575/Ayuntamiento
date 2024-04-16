<%@LANGUAGE="JAVASCRIPT" CODEPAGE="1252"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Foto del Servidor Público</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="/Css/stylesIntra.css" />
</head>
<body>
<!--#include virtual="/Intranet/Encabezados/EncabezadoI.asp" -->
<%
//Datos del Servidor Publico
AEncaMae = String(Request.Cookies("CEncaMae")).split("|")
ConsServ = AEncaMae[3] 
NumeEmpl = AEncaMae[4] 

/* Param0:	0.-Archivo con mismo nombre 1.- Archivo con nombre por parte del usuario
   Param1:	Ruta del del archivo
	Param2:	Nombre del archvio por el usuario
	Param3:	Archivo con extencion
	Param4:	Redireccionara a otro archivo SinP.- Sin redireccionar pagina */
Tipo = "1"
Ruta = "/ExpElectro/"+ClavAyun+"/Adminis/ServidorPub/Fotos/"
Nomb = NumeEmpl+"F"
Pagi = "/Intranet/Adminis/Servidor/Expediente/ATSerPubSalvArch.asp"
Response.Cookies("CSubirArch") = Tipo+"|"+Ruta+"|"+Nomb+"|Arch_ext|"+Pagi+"|"		
Response.Redirect("/SubeArchivos/SubiArch.asp")//
%>
</body>
</html>

