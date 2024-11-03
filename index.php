<?php 

session_start();

$route = new Route();

class Route {

public function __construct() {
    $this->run();
}

public function run() {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if ($url == '/meury/') {
        require __DIR__ . '/pages/inicio.phtml';
    } 
    else if ($url == '/meury/inicio') {
        require __DIR__ . '/pages/inicio.phtml';
    } 
    // else if ($url == '/meury/contato') {
    //     require __DIR__ . '/pages/contato.phtml';
    // } 
    else if ($url == '/meury/cadastroImovelController') {
        if (isset($_SESSION["email"])) {
            require __DIR__ . '/backend/cadastroimovel.php';
        } else {
            header('Location: login');
            exit();
        }
    } 
    else if ($url == '/meury/cadastroUsuarioController') {
        if (isset($_SESSION["email"])) {
            require __DIR__ . '/backend/cadastrousuario.php';
        } else {
            header('Location: login');
            exit();
        }
    } 
    else if ($url == '/meury/loginController') {
        require __DIR__ . '/backend/login.php';
    }
    else if ($url == '/meury/criarTabelasController') {
        require __DIR__ . '/backend/criartabelas.php';
    }
    else if ($url == '/meury/vendas') {
        require __DIR__ . '/pages/vendas.phtml';
    } 


    // -------- ROTAS DO FETCH ---------------------
    else if ($url == '/meury/buscatipo') {
        require __DIR__ . '/pages/tipos.phtml';
    } 
    // --------------------------------------------



    else if ($url == '/meury/logout') {
        session_unset();
        header('Location: login');
        exit();
    }
     
    else if ($url == '/meury/login') {
        if (isset($_SESSION["email"])) {
            header('Location: cadastro');
            exit();
        } else {
            require __DIR__ . '/pages/login.phtml';
        }
    } 

    else if ($url == '/meury/cadastro') {
        if (isset($_SESSION["email"])) {
            require __DIR__ . '/pages/cadastro.phtml';
        } else {
            header('Location: login');
            exit();
        }
    } 
    else {
        require __DIR__ . '/pages/erro.html';
    }
} 

}

?>
