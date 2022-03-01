<?php
include_once("conexao.php");

$id = $_POST['id'];
$nome = $_POST['txtnome'];
$fone=$_POST['txtfone'];
$celular=$_POST['txtcelular'];
$crm = $_POST['txtcrm'];
$especi=$_POST['txtespeci'];

try 
	{
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare('UPDATE medicos SET med_nome=:nome,  med_telefone=:fone, med_celular=:celular, med_crm=:crm, med_especialidade=:especi WHERE med_codipk=:id');
   $stmt->execute(array(
    ':id'   => $id,
    ':nome' => $nome,
	':fone'=> $fone,
	':celular' => $celular,
	':crm' => $crm,
	':especi' => $especi
   ));
		header("Location: con_medicos.php");
	}
	catch (PDOException $e) {
		
		header("Location: edit_medicos.php?id=$id");
	}
?>