<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$sql = "INSERT INTO objetivo VALUES ('$_POST[codigoObj]','$_POST[nombreObj]', '$_POST[fechaIniObj]', '$_POST[fechafinObj]', '$_POST[montoObj]', '$_POST[descripcionObj]',    'PRDIMA01'    ,'$_POST[estadoObj]')";

$result = mysql_query($sql);
$respuesta = new stdClass();

if(!$result){
	//echo "Error en la sentencia SQL ".mysql_error();
	$respuesta->mensaje ="Error en la sentencia";
}else{
	//echo "Objetivo agregado!";
	//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";
	//echo "<br><a href='../agregarMeta.html'> Agregar meta </a> ";
	$respuesta->mensaje ="Objetivo agregado";
}
@mysql_close($conexion);
echo json_encode($respuesta);

?>