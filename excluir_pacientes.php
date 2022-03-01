<?php
include_once 'conexao.php';
$id = $_GET['id'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE FROM pacientes where pac_codipk='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
header("Location:con_pacientes.php");


?>