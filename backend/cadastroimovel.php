<?php 
include "conexao.php";

// ==================================================================
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['media'])) {
    $pastaUploads = 'uploads/';
    if (!file_exists($pastaUploads)) {
        mkdir($pastaUploads, 0777, true);
    }

    $arquivoJson = 'media.json';

    // Verificar se o arquivo já existe e pegar o último ID
    if (file_exists($arquivoJson)) {
        $conteudo = file_get_contents($arquivoJson);
        $medias = json_decode($conteudo, true);
        $ultimoId = end($medias)['id'];
        $novoId = $ultimoId + 1;
    } else {
        $medias = [];
        $novoId = 1;
    }

    // Capturar os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $secao = $_POST['secao'];
    $link = $_POST['link'];
    $arquivoMedia = $_FILES['media']['name'];
    $caminhoMedia = $pastaUploads . basename($arquivoMedia);

    if (move_uploaded_file($_FILES['media']['tmp_name'], $caminhoMedia)) {
        $media = [
            'id' => $novoId,
            'titulo' => $titulo,
            'descricao' => $descricao,
            'url' => $caminhoMedia,
            'tipo' => mime_content_type($caminhoMedia),
            'secao' => $secao,
            'link' => $link
        ];

        $medias[] = $media;

        $conteudoAtualizado = json_encode($medias, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($arquivoJson, $conteudoAtualizado, LOCK_EX);

        echo "Detalhes do arquivo salvos com sucesso!";
    } else {
        echo "Falha ao fazer o upload do arquivo.";
    }
}
// ==================================================================

$_SESSION["imoveis"] = ' Card Cadastrado com Sucesso!';
header('Location: cadastro');
exit();


$db -> close();

?>