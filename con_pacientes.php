<?php
include_once 'conexao.php';
$query = "SELECT * FROM pacientes order by pac_nome";
$result=$conn->prepare($query);
$result->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imagens/medico.png">
    <title>Listagem de Pacientes</title>
	<link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="container-fluid" style="background: #eee;">
		<h2 class="bg-primary text-white"> <img src="imagens/paciente.png" width=44 height=44>        Listagem de Pacientes</h2>
		<table class="table table-striped table-primary table-bordered">
			<tr>
				<th width="5%">Id</th>
				<th width="30%">Nome</th>
				<th width="10%">Cidade</th>
				<th width="20%">Telefone</th>
				<th width="20%">Celular</th>
				<th width="5%"></th>
				<th width="5%"></th>
			</tr>

	<?php
     $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;	
	$total=  $result->rowCount();
	$registros=5;
	$numPaginas = ceil($total/$registros);   
	$inicio = ($registros*$pagina)-$registros; 
	$consulta = "SELECT * FROM pacientes order by pac_nome limit $inicio,$registros"; 
	$resultado=$conn->prepare($consulta);
	$resultado->execute();
	$total=  $resultado->rowCount();
	while ($reg=$resultado->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>".$reg['pac_codipk']."</td>";
			echo "<td>".$reg['pac_nome']."</td>";
			echo "<td>".$reg['pac_cidade']."</td>";
			echo "<td>".$reg['pac_telefone']."</td>";
			echo "<td>".$reg['pac_celular']."</td>";
       		echo "<td align='center'>". "<a href='edit_pacientes.php?id=".$reg['pac_codipk']."'> <img src=imagens/botao_editar.png width='25px' height='25px'></a> </td>";
			echo "<td align='center'>". "<a href='excluir_pacientes.php?id=".$reg['pac_codipk']."'> <img src=imagens/botao_excluir.png width='25px' height='25px'> </a></td>";	
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
