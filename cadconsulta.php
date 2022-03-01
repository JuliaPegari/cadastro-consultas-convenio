<!DOCTYPE html>
<html>
<head>
	<title> Consultas </title>
	<meta charset="utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imagens/icon.jpg">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">	
</head>
<body>
	<div class="container-fluid">
		<div class="form-signin" style="background: #eee;">			
		<?php
		   include_once 'conexao.php';
			$paciente =$_POST['txtpaciente'];
			$medico = $_POST['txtmedico'];
			$data = $_POST['txtdata'];
			$hora = $_POST['txthora'];
			$diag = $_POST['txtdiagnostico'];
			$trata=$_POST['txttratamento'];
			try 
			{
				$sql = "INSERT INTO consultas(pac_codifk,med_codifk, con_data,con_hora,con_diagnostico,con_tratamento) VALUES (:paciente, :medico, :data, :hora, :diag, :trata)";
				$stmt = $conn->prepare( $sql );
				$stmt->bindParam( ':paciente', $paciente );
				$stmt->bindParam( ':medico', $medico );
				$stmt->bindParam( ':data', $data );
				$stmt->bindParam( ':hora', $hora );
				$stmt->bindParam( ':diag', $diag );
                   $stmt->bindParam( ':trata', $trata );
				$result = $stmt->execute();
				echo  "<h2 class='bg-primary text-white'> Cadastro realizado com sucesso! </h2>";
			}
			catch (PDOException $e) {
				echo "<h2 class='bg-primary text-white'> Erro ao efetuar o cadastro, favor verificar </h2>";
			}
		?>
		<br><br>
		<div class="row text-center">
		    <div class="col-6">					
				<a href="frmcadfor.html" class="btn btn-outline-primary" style="width: 140px;">Novo Cadastro </a>
			</div>
			<div class="col-6">					
				<a href="index.html" class="btn btn-outline-primary" style="width: 140px;"> Home </a>
			</div>
		</div>
		<br><br>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	
</html>
