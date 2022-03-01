<meta charset="utf-8">
<?php
$servername="localhost";$port="3306";$username="root";$password="";$dbname="convenio";
    try {
	 $conn=new PDO("mysql:host=".$servername.";port=".$port.";charset=utf8;dbname=".$dbname,$username,$password);
	 } catch(PDOException $e) {
      echo "Erro gerado".$e->getMessage();
    }
?>