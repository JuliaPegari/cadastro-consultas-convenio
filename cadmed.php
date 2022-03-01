<!DOCTYPE html>
<html>
<head>
	<title> Gravando fornecedor </title>
	<meta charset="utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="imagens/icon.jpg">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/estilo.css">	
</head>
<body>
	<div class="container-fluid">
		<div class="form-signin" style="background: #eee;">			
		<?php
		   include_once 'conexao.php';
			$nome =$_POST['txtnome'];
			$telefone = $_POST['txtfone'];
			$celular = $_POST['txtcelular'];
			$crm = $_POST['txtcrm'];
			$especi = $_POST['txtespeci'];
			try 
			{
				$sql = "INSERT INTO medicos(med_nome,med_telefone, med_celular,med_crm,med_especialidade) VALUES (:nome, :telefone, :celular, :crm, :especi)";
				$stmt = $conn->prepare( $sql );
				$stmt->bindParam( ':nome', $nome );
				$stmt->bindParam( ':telefone', $telefone );
				$stmt->bindParam( ':celular', $celular );
                $stmt->bindParam( ':crm', $crm );
                $stmt->bindParam( ':especi', $especi );
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
	
</html>
