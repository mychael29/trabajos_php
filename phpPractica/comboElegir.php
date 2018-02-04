<?php
require("datos_conexion.php");
$conexion = mysqli_connect($db_host,$db_usuario,$db_contra);
if(mysqli_connect_errno()){
	 echo"error";
		 exit();
 }
 
 mysqli_select_db($conexion,$db_nombre) or die ("no se encontro bbdd");
 $produc = $_REQUEST['produc'];
 $query="SELECT * FROM COMPRAS";
 $res = mysql_query($conexion,$query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form name="form1">
<select name = "produc">
<option value="" selected>Elige</option>
<?php while($row=mysql_fetch_array($res))
{?>
<option value="<?php echo $row['NUMERO_ORDENCOMPRA']?>"> <?php echo $row['NUMERO_ORDENCOMPRA'];?></option>
<?php } ?>
</select>
</form>
</body>
</html>