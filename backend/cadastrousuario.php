<?php 
include "conexao.php";

// ==================================================================
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = 'INSERT INTO users(nome, email, senha) VALUES(?, ?, ?)';
$stmt = $db->prepare($sql);
if(!$stmt){
    echo 'erro no insert: '. $db->errno .' - '. $db->error;
}

$var1 = $nome;
$var2 = $email;
$var3 = password_hash($senha, PASSWORD_DEFAULT);
$stmt->bind_param('sss', $var1, $var2, $var3);
$stmt->execute();
// ==================================================================

// ==================================================================

$_SESSION["usuario"] = 'Usuário Cadastrado com Sucesso!';

header('Location: cadastro');
exit();

// ==================================================================


$db -> close();

?>