<?php
    //iniciando a sessao caso ainda nao haja uma inicializada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //incluindo "conexao.php"
    include 'conexao.php';

    //obtendo id do usuario selecionado via get
    if(isset($_GET['id'])){
        $_SESSION['id2'] = $_GET['id'];

    }

    $req = $_SESSION['id2'];

    $sql = "DELETE FROM user WHERE id_user = $req";

    $del = mysqli_query($connect, $sql);

    mysqli_close($connect);

    header('location: usuarios.php');

?>
