<?php 
	//FALTA ORGANIZAR LO DEL ARCHIVO ADJUNTO PARA PODER EJECUTAR LA SENTENCIA Y AGREGUE A LA BD
	include("conexionDB.php");
	$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
	mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());


	//Verificar tipo de archivo adjuntado
	//$adjuntosPermitidos = array("image/jpg", "imagle/jpeg", "image/gif", "image/png");


	$sql = "INSERT INTO actividad VALUES ('$_POST[codigoActi]', '$_POST[nombreActi]', '$_POST[fechaIniActi]', '$_POST[fechafinActi]',
		'$_POST[montoActi]', '$_POST[descripcionActi]', 
		'$ADJUNTO',
		'1.1',
		'$_POST[estadoActi]' )";

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

?>
