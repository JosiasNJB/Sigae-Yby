<?php
    //iniciando a sessao caso ainda nao haja uma inicializada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //incluindo "conexao.php"
    include 'conexao.php';

    //obtendo id do usuario selecionado via get

    if(isset($_GET['matricula'])){
        $_SESSION['matricula'] = $_GET['matricula'];

    }

    $req = $_SESSION['matricula'];

    $sql = "DELETE FROM aluno WHERE matricula = $req";

    $del = mysqli_query($connect, $sql);

    mysqli_close($connect);

    header('location: altdados.php');


?>
