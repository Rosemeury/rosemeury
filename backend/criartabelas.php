<?php 
include "conexao.php";

// ==================================================================
mysqli_query($db, "
CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  nome varchar(255),
  email varchar(255),
  senha varchar(255),
  PRIMARY KEY (id)
)");

mysqli_query($db, "
CREATE TABLE imoveis (
  id int NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  titulo varchar(255),
  situacao varchar(255),
  tipo varchar(255),
  suites int,
  vagas int,
  quartos int,
  banheiros int,
  metragem varchar(255),
  rua varchar(255),
  bairro varchar(255),
  cidade varchar(255),
  estado char(255),
  imagem01 varchar(255),
  imagem02 varchar(255),
  imagem03 varchar(255),
  imagem04 varchar(255),
  imagem05 varchar(255),
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
)");

// ==================================================================
$nome = 'Master';
$email = 'master@master.com';
$senha = '123';

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

$db -> close();

header('Location: cadastro');
exit();

// ==================================================================

?>