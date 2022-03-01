<?php
include_once("conexao.php");

$id = $_POST['id'];
$data = $_POST['txtdata'];
$hora=$_POST['txthora'];
$diag=$_POST['txtdiagnostico'];
$trata=$_POST['txttratamento'];

try 
	{
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare('UPDATE consultas SET con_data=:data,  con_hora=:hora, con_diagnostico=:diag, con_tratamento=:trata
	WHERE con_codipk=:id');
   $stmt->execute(array(
    ':id'   => $id,
    ':data' => $data,
	':hora'=> $hora,
	':diag' => $diag,
	':trata' => $trata
   ));
		header("Location: con_consultas.php");
	}
	catch (PDOException $e) {
		
		header("Location: edit_consultas.php?id=$id");
	}
?>