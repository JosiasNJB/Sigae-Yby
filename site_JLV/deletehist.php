<?php
    //iniciando a sessao caso ainda nao haja uma inicializada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //incluindo "conexao.php"
    include 'conexao.php';

    //obtendo id do usuario selecionado via get

    if(isset($_GET['id_hist'])){
        $_SESSION['id_hist'] = $_GET['id_hist'];

    }

    $req = $_SESSION['id_hist'];

    $sql = "DELETE FROM itemhist WHERE id_hist = $req";

    $del = mysqli_query($connect, $sql);

    mysqli_close($connect);

    header('location: althist.php');


?>
