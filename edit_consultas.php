<?php
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM consultas WHERE con_codipk = '$id'";
$result=$conn->prepare($query);
$result->execute();
$reg=$result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="imagens/icon.jpg">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="css/estilo.css">

		<title>Editar Consultas</title>			
	</head>
	<body>
	<div class="container-fluid" style="background: #eee;">
		<h2 class="bg-primary text-white">Editar Consultas</h2>			
		<form method="POST" action="proc_edit_consultas.php">
			<input type="hidden" name="id" value="<?php echo $reg['con_codipk']; ?>">
			<div class="form-group">
				<label>Data:</label>
				<input type="date" class="form-control" style="width:30%" value="<?php echo $reg['con_data']; ?>" placeholder="Digite aqui" name="txtdata" required autofocus>
			</div>
			<div class="form-group">
				<label>Hora:</label>
				<input type="time" class="form-control" style="width:30%" value="<?php echo $reg['con_hora']; ?>" placeholder="Digite aqui" name="txthora" required autofocus>
			</div>
			<div class="form-group">
				<label>Diagnóstico:</label>
				<br>
				<textarea class="form-control" rows=4 cols=80  placeholder="Digite aqui" name="txtdiagnostico" required autofocus><?php echo $reg['con_diagnostico']; ?></textarea>			
			</div>
			<div class="form-group">
				<label>Tratamento:</label>
				<br>
				<textarea class="form-control" rows=4 cols=80 placeholder="Digite aqui" name="txttratamento" required autofocus> <?php echo $reg['con_tratamento']; ?></textarea>			
			</div>
			<div class="row text-center">
				<div class="col">					
					<input type="submit" name="btnCadCliente" value="Salvar Alterações" class="btn btn-outline-primary">
				</div>
				<div class="col">										
					<a href="con_consultas.php" class="btn btn-outline-primary"> Listagem </a>
				</div>
			</div>
		</form>
	</div>

</body>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.js"></script>
	<script>
	 $(document).ready(function () { 
		$("#txtfone").mask('(000) 0000-0000',{ placeholder:'(___) ____-____'});
		$("#txtcelular").mask('(000) 00000-0000',{ placeholder:'(___) _____-____'});
    });
	</script>  
</html>