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
<!--#include virtual="/Connections/ConeAdministracion.asp" -->
<%
//Datos del Servidor Publico
AEncaMae = String(Request.Cookies("CEncaMae")).split("|")
ConsServ = AEncaMae[3] 
NumeEmpl = AEncaMae[4] 

//Datos del Servidor Publico
ASubirArch = String(Request.Cookies("CSubirArch")).split("|")
Archivo = ASubirArch[3]

//Conexion a la Base de datos
ConeBase = new ActiveXObject("ADODB.Connection")
EjecComa = new ActiveXObject("ADODB.Command")
ConeBase.ConnectionString = MM_ConeAdministracion_STRING;
ConeBase.Open() 
EjecComa.ActiveConnection = ConeBase
EjecComa.CommandType = 1
EjecComa.Prepared=true 

EjecInst  = "UPDATE ATSerPub "
EjecInst += "SET SFoto  ='"+Archivo+"' "
EjecInst += "WHERE sconsecut = "+ConsServ+" and SAyuntamiento = '"+ClavAyun+"' "
Response.Write("1)<br>"+EjecInst+"<br><br>")
EjecComa.CommandText =  EjecInst
EjecComa.Execute()

  					
//Cierra la conexion
ConeBase.Close() 					

%>
<script language="javascript">
window.close();
opener.top.Lista.location.reload();
</script>
</body>
</html>

