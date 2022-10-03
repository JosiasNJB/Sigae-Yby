<?php

    //iniciando a sessao caso ainda nao haja uma inicializada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    //setando logado como falso para deslogar o usuario
    $_SESSION['logado'] = false;

    //redirecionando para a pagina de inicio
    header('location: index.php');

?>
