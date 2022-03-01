<?php
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM medicos WHERE med_codipk = '$id'";
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

		<title>Editar Medicos</title>			
	</head>
	<body>
	<div class="container-fluid" style="background: #eee;">
		<h2 class="bg-primary text-white">Editar Médicos</h2>			
		<form method="POST" action="proc_edit_medicos.php">
			<input type="hidden" name="id" value="<?php echo $reg['med_codipk']; ?>">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" class="form-control" value="<?php echo $reg['med_nome']; ?>"placeholder="Digite o nome completo" name="txtnome" required autofocus>
			</div>
			<div class="form-group">
				<label>Especialidade:</label>
				<input type="text" class="form-control" style="width:30%" value="<?php echo $reg['med_especialidade']; ?>"placeholder="Digite a especialidade médica" name="txtespeci"  required autofocus>
			</div>
			<div class="form-group">
				<label>CRM:</label>
				<input type="text" class="form-control" value="<?php echo $reg['med_crm']; ?>"style="width:30%" placeholder="Digite o CRM" name="txtcrm" required autofocus>
			</div>
            <div class="form-group">
				<label>Celular:</label>
				<input type="text" class="form-control" style="width:30%" value="<?php echo $reg['med_celular']; ?>" placeholder="Digite o numero celular" name="txtcelular" id="txtcelular" required autofocus>
			</div>
            <div class="form-group">
				<label>Telefone:</label>
				<input type="text" class="form-control" style="width:30%" value="<?php echo $reg['med_telefone']; ?>"placeholder="Digite o numero telefone" name="txtfone" id="txtfone" required autofocus>
			</div>		

			<div class="row text-center">
				<div class="col">					
					<input type="submit" name="btnCadCliente" value="Salvar Alterações" class="btn btn-outline-primary">
				</div>
				<div class="col">										
					<a href="con_medicos.php" class="btn btn-outline-primary"> Listagem </a>
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