<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$sql = "INSERT INTO meta VALUES ('$_POST[codigoMeta]','$_POST[nombreMeta]', '$_POST[fechaIniMeta]', '$_POST[fechafinMeta]', '$_POST[montoMeta]', '$_POST[descripcionMeta]', '1','$_POST[estadoMeta]')";

$result = mysql_query($sql);
$respuesta = new stdClass();//nuevo Ajax

if(!$result){
	//echo "Error en la sentencia SQL ".mysql_error();
	$respuesta->mensaje ="No se pudo guardar.";//nuevo Ajax
}else{
	//echo "Meta agregada!";
	//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";
	//echo "<br><a href='../agregarMeta.html'> Agregar meta </a> ";
	//echo "<br><a href='../agregarActividad.html'> Agregar actividad </a> ";
	$respuesta->mensaje ="Proyecto creado.";//nuevo Ajax
}
@mysql_close($conexion);
echo json_encode($respuesta);//nuevo Ajax
?>