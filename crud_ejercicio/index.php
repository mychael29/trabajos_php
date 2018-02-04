<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link href="hoja.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	include("conexion.php");
	
	//-----------------------------------------paginacion----------------------------------------------//
	
	$tamagno_paginas=3;
  
    if(isset($_GET["pagina"])){
		
		if ($_GET["pagina"]==1){
			
			header("Location:index.php");
			
		}else{
			
			$pagina=$_GET["pagina"];
		}
		
	}else{
		
		$pagina=1;
	}
	
	$empezar_desde=($pagina-1)*$tamagno_paginas;
	$sql_total="SELECT nombre, apellido, email FROM usuarios";
	$resultado=$base->prepare($sql_total);
	$resultado->execute(array());
	$num_filas=$resultado->rowCount();
	$total_paginas=ceil($num_filas/$tamagno_paginas);
  
	//-------------------------------------------------------------------------------------------------//
	
	
	$registros=$base->query("SELECT * FROM usuarios LIMIT $empezar_desde,$tamagno_paginas")->fetchAll(PDO::FETCH_OBJ);
	if(isset($_POST["cr"])){
	    $nombre=$_POST["Nom"];
	    $apellido=$_POST["Ape"];
	    $email=$_POST["Email"];
	    $sql="INSERT INTO usuarios (nombre,apellido,password,email) VALUES(:nom,:ape,'aaaa',:email)";
	    $resultado=$base->prepare($sql);
	    $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":email"=>$email));
	    header("Location:index.php");
	}
?>	

<h1>GOLTERRA<span class="subtitulo"> Usuarios de prueba en GolTerra</span></h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 <div class="form">
    <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Equipo</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
   <?php
		foreach($registros as $persona):?>
   
   	<tr>
      <td><?php echo $persona->id_?></td>
      <td><?php echo $persona->nombre?></td>
      <td><?php echo $persona->apellido?></td>
      <td><?php echo $persona->email?></td>
     
      <td class="bot"><a href="borrar.php?Id=<?php echo $persona->id_?>"><button type='button' name='del' id='del' value='Borrar'>Borrar</button></a></td>
      <td></td>
      <td class='bot'><a href="editar.php?Id=<?php echo $persona->id_?> & nom=<?php echo $persona->nombre?> & ape=<?php echo $persona->apellido?> & email=<?php echo $persona->email?>"><button type='button' name='up' id='up' value='Actualizar'>Actualizar</button></a></td>
    </tr>
    <?php 
	endforeach;
	?>          
	<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name='Email' size='10' class='centrado'></td>
      <td class='bot'><button type='submit' name='cr' id='cr' value='Insertar'>Insertar</button></td></tr>  
      <tr><td></td></tr>  
  </table>
  </div>
  </form>
  
<?php
  //-----------------------------------------paginacion----------------------------------------------//
  
  for($i=1; $i<=$total_paginas; $i++){
	  echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
  }
?>

<p>&nbsp;</p>
</body>
</html>