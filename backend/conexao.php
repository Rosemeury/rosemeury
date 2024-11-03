<?php 
$db = new mysqli('localhost', 'root', '', 'meury');

if (!$db) {
    die("Conexão falhou: " . mysqli_connect_error());
} 

?>