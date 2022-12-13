<?php
    //iniciando a sessao caso ainda nao haja uma inicializada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //incluindo "conexao.php"
    include 'conexao.php';

    //obtendo id do usuario selecionado via get

    if(isset($_GET['id_dep'])){
        $_SESSION['id_dep'] = $_GET['id_dep'];

    }

    $req = $_SESSION['id_dep'];

    $sql = "DELETE FROM depoimento WHERE id_dep = $req";

    $del = mysqli_query($connect, $sql);

    mysqli_close($connect);

    header('location: depoimentos.php');


?>
