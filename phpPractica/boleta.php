<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Boleta</title>
<style type="text/css" >
		body {
  			font: normal medium/1.4 sans-serif;
  			background: linear-gradient( 0deg, #C0C0C0, #F8F8F8);
  		}
		table {
  			border-collapse: collapse;
  			width: 100%;
		}
		th, td {
  			padding: 0.25rem;
  			border: 1px solid #ccc;
		}
		tbody tr:nth-child(odd) {
  			background: #eee;
		}
		td {
			font-size: 12px;
		}

		.centro{
  			padding: 0.5rem;
  			background: #484848 ;
  			color: white;
  			text-align: center;
  			font-size: 21px;

		}

		#cuadro{
			width: 90%;
			background: #F8F8F8 ;
			padding: 25px;
			margin: 5px auto;
			border: 3px solid #D8D8D8;
		}
		#titulo{
			width: 100%;
			background: #282828;
			color:white;
			font-size: 12px;

		}
		#encabezado{
			font-size: 12px;
			text-align: left;
		}
	</style>
</head>

<body>
<table>
			<thead>
				<tr class="centro">
					<td rowspan="3">NÚMERO CORRELATIVO DEL REGISTRO</td>
					<td rowspan="3">FECHA DE EMISIÓN DEL COMPROBANTE DE PAGO</td>
					<td rowspan="3">FECHA DE VENCIMIENTO</td>
					<td colspan="3">COMPROBANTE DE PAGO O DOCUMENTO</td>
					<td colspan="3">INFORMACIÓN DEL CLIENTE</td>
					<td rowspan="3">VALOR FACTURADO DE LA EXPORTACIÓN</td>
				</tr>
				<tr class="centro">
					<td rowspan="2">TIPO</td>
					<td rowspan="2">Nro SERIE</td>
					<td rowspan="2">NÚMERO</td>
					<td colspan="2">DOCUMENTO DE IDENTIDAD</td>
					<td rowspan="2">APELLIDOS Y NOMBRES</td>
				</tr>
				<tr class="centro">
					<td>TIPO</td>
					<td>NÚMERO</td>
				</tr>
				<tbody>
					<?php while ($fila = mysql_fetch_array($resultado)){ ?>
						<tr>
							<td>
								<?php echo $fila['Num_boleta'];?>	
							</td>
							<td>
								<?php echo $fila['Fecha_emision'];?>
							</td>
							<td>
								<?php 
									$id = $fila['Id_cliente'];
									$resultado2 = mysql_query("SELECT * FROM CLIENTE WHERE Id_cliente=$id");
									while ($fila2 = mysql_fetch_array($resultado2)){ 
									echo $fila2['Nombre'];
									}
								?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</thead>
		</table>
</body>
</html>