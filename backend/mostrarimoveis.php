<?php 
include "conexao.php";

$postData = file_get_contents('php://input');
$request = json_decode($postData, true);

$secaoProcurada = $request['secao'] ?? '';
$medias = [];

$arquivoJson = 'media.json';

if (file_exists($arquivoJson)) {
    $conteudo = file_get_contents($arquivoJson);
    $resultados = json_decode($conteudo, true);

    foreach ($resultados as $media) {
        if ($media['secao'] == $secaoProcurada) {
            $medias[] = $media;
        }
        if ($secaoProcurada === '') {
            $medias[] = $media;
        }
    }
}

// echo $secaoProcurada;
// print_r($resultados);

?>