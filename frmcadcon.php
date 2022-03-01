<!DOCTYPE html>
<html>
<head>
  <title>Consultas</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="imagens/icon.jpg">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo.css">
      
</head>

<body>
    
	<div class="container-fluid" style="background: #eee;">
		<h2 class="bg-primary text-white"><img src="imagens/paciente.png" width=44 height=44>Cadastrar Consultas</h2>
		<form name="frmcadcon" action="cadconsulta.php" method="POST">
			<div class="form-group">
				<label>Paciente:</label><br>
				<?php
					include('conexao.php');
					$sql="select * from pacientes order by pac_nome";
					$result=$conn->prepare($sql);
					$result->execute();
				?>
				<select style="width:30%" name="txtpaciente">
				<?php while ($reg=$result->fetch(PDO::FETCH_ASSOC)) {?>
					<option value="<?php echo $reg['pac_codipk'] ?>">
				<?php echo $reg['pac_nome'] ?> </option> 
				<?php }
				?>
				</select>			
			</div>
			<div class="form-group">
				<label>Médico:</label><br>
				<?php
					include('conexao.php');
					$sql="select * from medicos order by med_nome";
					$result=$conn->prepare($sql);
					$result->execute();
				?>
				<select style="width:30%" name="txtmedico">
				<?php while ($reg=$result->fetch(PDO::FETCH_ASSOC)) {?>
					<option value="<?php echo $reg['med_codipk'] ?>">
				<?php echo $reg['med_nome'] ?> </option> 
				<?php }
				?>
				</select>
			</div>
			<div class="form-group">
				<label>Data:</label>
				<input type="date" class="form-control" style="width:30%" placeholder="Digite aqui" name="txtdata" required autofocus>
			</div>
			<div class="form-group">
				<label>Hora:</label>
				<input type="time" class="form-control" style="width:30%" placeholder="Digite aqui" name="txthora" required autofocus>
			</div>
			<div class="form-group">
				<label>Diagnóstico:</label>
				<br>
				<textarea class="form-control" rows=4 cols=80 placeholder="Digite aqui" name="txtdiagnostico" required autofocus></textarea>			
			</div>
			<div class="form-group">
				<label>Tratamento:</label>
				<br>
				<textarea class="form-control" rows=4 cols=80 placeholder="Digite aqui" name="txttratamento" required autofocus></textarea>			
			</div>
			<button type="submit" class="btn btn-outline-primary" style="width: 140px;">Enviar</button>
			<button type="reset" class="btn btn-outline-primary" style="width: 140px;">Limpar</button>
			<a href="index.html"><button type="button" class="btn btn-outline-primary" style="width: 140px;">Home</button></a>
		</form>
	</div>
</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>