<?php
    //iniciando a sessao caso ainda nao haja uma inicializada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //incluindo "conexao.php"
    include 'conexao.php';

    //obtendo id do usuario selecionado via get

    if(isset($_GET['siape'])){
        $_SESSION['siape2'] = $_GET['siape'];

    }

    $req = $_SESSION['siape2'];

    $sql = "DELETE FROM usuario WHERE Siape = $req";

    $del = mysqli_query($connect, $sql);

    mysqli_close($connect);

    header('location: altadm.php');


?>
