<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$sql = "INSERT INTO proyecto VALUES ('$_POST[codigoProy]','$_POST[nombreProy]', '$_POST[fechaIniProy]', '$_POST[fechafinProy]', '$_POST[montoProy]', '$_POST[descripcionProy]', '123456','$_POST[estadoProy]')";

$result = mysql_query($sql);
$respuesta = new stdClass();//nuevo Ajax

if(!$result){
	//echo "Error en la sentencia SQL ".mysql_error();
	$respuesta->mensaje ="No se pudo guardar.";//nuevo Ajax
}else{
	//echo "Proyecto creado!";
	//echo "<br><a href='agregarObjetivo.html'> Agregar objetivo </a> ";
	$respuesta->mensaje ="Proyecto creado.";//nuevo Ajax
}
@mysql_close($conexion);


echo json_encode($respuesta);//nuevo Ajax

//echo "registro";
//echo "$_POST[fechaIniProy]";
//echo "Proyecto creado!";
//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";

?>