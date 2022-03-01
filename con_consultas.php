<?php
include_once 'conexao.php';
$query = "SELECT * FROM consultas order by con_data,con_hora";
$result=$conn->prepare($query);
$result->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imagens/consulta.png">
    <title>Listagem de Consultas</title>
	<link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="container-fluid" style="background: #eee;">
		<h2 class="bg-primary text-white"> <img src="imagens/consulta.png" width=44 height=44>        Listagem de Consultas</h2>
		<table class="table table-striped table-primary table-bordered">
			<tr>
				<th width="30%">Paciente</th>
				<th width="30%">Médico</th>
				<th width="10%">Data</th>
				<th width="20%">Hora</th>
				<th width="5%"></th>
				<th width="5%"></th>
			</tr>

	<?php
	function data($dateSql){
		$ano= substr($dateSql, 0,4);
		$mes= substr($dateSql, 5,2);
		$dia= substr($dateSql, 8,2);
		return $dia."/".$mes."/".$ano;
	}
     $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;	
	$total=  $result->rowCount();
	$registros=5;
	$numPaginas = ceil($total/$registros);   
	$inicio = ($registros*$pagina)-$registros; 
	$consulta = "SELECT * FROM consultas order by con_data,con_hora limit $inicio,$registros"; 
	$resultado=$conn->prepare($consulta);
	$resultado->execute();
	$total=  $resultado->rowCount();
	while ($reg=$resultado->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			$query2 = "SELECT * FROM pacientes where pac_codipk=".$reg['pac_codifk'];
			$result2=$conn->prepare($query2);
			$result2->execute();
			$reg2=$result2->fetch(PDO::FETCH_ASSOC);
			echo "<td>".$reg2['pac_nome']."</td>";
			
			$query3 = "SELECT * FROM medicos where med_codipk=".$reg['med_codifk'];
			$result3=$conn->prepare($query3);
			$result3->execute();
			$reg3=$result3->fetch(PDO::FETCH_ASSOC);
			echo "<td>".$reg3['med_nome']."</td>";
			echo "<td>".data($reg['con_data'])."</td>";
			echo "<td>".$reg['con_hora']."</td>";
       		echo "<td align='center'>". "<a href='edit_consultas.php?id=".$reg['con_codipk']."'> <img src=imagens/botao_editar.png width='25px' height='25px'></a> </td>";
			echo "<td align='center'>". "<a href='excluir_consultas.php?id=".$reg['con_codipk']."'> <img src=imagens/botao_excluir.png width='25px' height='25px'> </a></td>";	
			echo "</tr>";	
		}
		echo "</table>";
		echo "Páginas:  ";
		for($i = 1; $i < $numPaginas + 1; $i++) { 
			echo "<a id='link' href='con_pacientes.php?pagina=$i'>".$i."</a>"; 
		}

	?>
	</table>
	<br>
	<div class="row text-center">
	    <div class="col">					
			<a href="index.html" class="btn btn-outline-primary"> Home </a>
		</div>
	</div>
	<br><br>    
    </div> <!-- /container -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
