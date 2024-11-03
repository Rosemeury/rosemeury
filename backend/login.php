<?php 
include "conexao.php";

// *********************************************************************************************

    // Capturar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // var_dump($email);

    // Arquivo JSON
    $arquivoJson = 'usuarios.json';

    if (file_exists($arquivoJson)) {
      $conteudo = file_get_contents($arquivoJson);
      $usuarios = json_decode($conteudo, true);
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $email && $senha === $usuario['senha']) {

              $_SESSION["email"] = $email;
              $_SESSION["id"] = $user['1'];
              header('Location: inicio');
              exit();
            } else {
              $_SESSION["message"] = 'Email ou senha incorretos!';
              header('Location: login');
              exit();
            }
        }
        $_SESSION["message"] = 'Email ou senha incorretos!';
    } else {
        $_SESSION["message"] = 'Nenhum usuário encontrado!';
    }

// *********************************************************************************************

$medias = [];

if (file_exists($arquivoJson)) {
    $conteudo = file_get_contents($arquivoJson);
    $medias = json_decode($conteudo, true);
}

?>