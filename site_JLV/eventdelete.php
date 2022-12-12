<?php
    //iniciando a sessao caso ainda nao haja uma inicializada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //incluindo "conexao.php"
    include 'conexao.php';

    //obtendo id do usuario selecionado via get

    if(isset($_GET['id_evento'])){
        $_SESSION['id_evento'] = $_GET['id_evento'];

    }

    $req = $_SESSION['id_evento'];

    $sql = "DELETE FROM evento WHERE id_evento = $req";

    $del = mysqli_query($connect, $sql);

    mysqli_close($connect);

    header('location: altevent.php');


?>
