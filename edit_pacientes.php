<?php
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM pacientes WHERE pac_codipk = '$id'";
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

		<title>Editar Pacientes</title>			
	</head>
	<body>
	<div class="container-fluid" style="background: #eee;">
		<h2 class="bg-primary text-white">Editar Pacientes</h2>			
		<form method="POST" action="proc_edit_pacientes.php">
			<input type="hidden" name="id" value="<?php echo $reg['pac_codipk']; ?>">
			<div class="form-group">
				<label>Nome do Cliente:</label>
				<input type="text" value="<?php echo $reg['pac_nome']; ?>" class="form-control" placeholder="Digite aqui" name="txtnome" required autofocus>
			</div>
			<div class="form-group">
				<label>Endereço:</label>
				<input type="text" value="<?php echo $reg['pac_endereco']; ?>" class="form-control" placeholder="Digite aqui" name="txtend" required autofocus>
			</div>
			<div class="form-group">
				<label>Bairro:</label>
				<input type="text" class="form-control" value="<?php echo $reg['pac_bairro']; ?>" style="width:30%" placeholder="Digite aqui" name="txtbairro" required autofocus>
			</div>
			<div class="form-group">
				<label>Cidade:</label>
				<input type="text" class="form-control"  value="<?php echo $reg['pac_cidade']; ?>" style="width:30%" placeholder="Digite aqui" name="txtcidade" required autofocus>
			
			</div>
			<div class="form-group">
				<label>Telefone:</label>
				<input type="text" class="form-control" value="<?php echo $reg['pac_telefone']; ?>" style="width:30%" placeholder="Digite aqui" name="txtfone" id="txtfone" required autofocus>
			</div>
			 <div class="form-group">
				<label>Celular:</label>
				<input type="text" class="form-control"  value="<?php echo $reg['pac_celular']; ?>" style="width:30%" placeholder="Digite aqui" name="txtcelular" id="txtcelular" required autofocus>
			</div>
			<div class="form-group">
				<label>Data de Nascimento:</label>
				<input type="date" class="form-control" value="<?php echo $reg['pac_dtna']; ?>"style="width:30%" placeholder="Digite aqui" name="txtdata" required autofocus>
			</div>
			<div class="form-group">
				<label>Rg:</label>
				<input type="text" class="form-control" value="<?php echo $reg['pac_rg']; ?>" style="width:30%" placeholder="Digite aqui" name="txtrg" required autofocus>
			</div>
			<div class="form-group">
				<label for="txtcpf">CPF:</label><br>
				<input type="text"  class="form-control"  value="<?php echo $reg['pac_cpf']; ?>"style="width:20%" id="txtcpf" name="txtcpf" /><br><br>
			</div>	

			<div class="row text-center">
				<div class="col">					
					<input type="submit" name="btnCadCliente" value="Salvar Alterações" class="btn btn-outline-primary">
				</div>
				<div class="col">										
					<a href="con_pacientes.php" class="btn btn-outline-primary"> Listagem </a>
				</div>
			</div>
		</form>
	</div>

</body>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.js"></script>
	<script>
	 $(document).ready(function () { 
        $("#txtcpf").mask('000.000.000-00', {reverse: true, placeholder:'___.___.___-__'});
		$("#txtfone").mask('(000) 0000-0000',{ placeholder:'(___) ____-____'});
		$("#txtcelular").mask('(000) 00000-0000',{ placeholder:'(___) _____-____'});
    });
	</script>  
</html>