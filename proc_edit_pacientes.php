<?php
include_once("conexao.php");

$id = $_POST['id'];
$nome = $_POST['txtnome'];
$ende=$_POST['txtend'];
$bair=$_POST['txtbairo'];
$cida=$_POST['txtcidade'];
$fone=$_POST['txtfone'];
$celular=$_POST['txtcelular'];
$data=$_POST['txtdata'];
$rg= $_POST['txtrg'];
$cpf=$_POST['txtcpf'];

try 
	{
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare('UPDATE pacientes SET pac_nome=:nome,  pac_endereco=:ende, pac_bairro=:bair, pac_cidade=:cida,
     pac_telefone=:fone, pac_celular=:celular,pac_dtna=:data,
	pac_cpf=:cpf, pac_rg=:rg  WHERE pac_codipk=:id');
   $stmt->execute(array(
    ':id'   => $id,
    ':nome' => $nome,
	':ende' => $ende,
	':bair'=> $bair,
	':cida' => $cida,
	':fone' => $fone,
	':celular' => $celular,
	':data' => $data,
	':rg' => $rg,
	':cpf' => $cpf
   ));
		header("Location: con_pacientes.php");
	}
	catch (PDOException $e) {
		
		header("Location: edit_pacientes.php?id=$id");
	}
?>