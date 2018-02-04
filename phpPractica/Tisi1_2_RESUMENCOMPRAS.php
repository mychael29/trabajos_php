<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
 require("datos_conexion.php");
 $conexion = mysqli_connect($db_host,$db_usuario,$db_contra);
 if(mysqli_connect_errno()){
	 echo"error";
		 exit();
 }
 
 mysqli_select_db($conexion,$db_nombre) or die ("no se encontro bbdd");
 mysqli_set_charset($conexion,"utf8");
 $consulta="SELECT * FROM COMPRAS";
 
 $resultado = mysqli_query($conexion,$consulta);
 
 while(($fila=mysqli_fetch_row($resultado))==true){
	 
	 
	 
	 echo $fila[0] . " ||| ";
	 echo $fila[1] . " ||| ";
	 echo $fila[2] . " ||| ";
	 echo $fila[3] . " ||| ";
	 echo $fila[4] . " ||| ";
	 echo "<br>";
	 
 }
 
 if($resultado==false){
	 
	echo"fallo al acceder a la bbdd...";
		 
		 
 }
 mysqli_close($conexion);
?>
</body>
</html>