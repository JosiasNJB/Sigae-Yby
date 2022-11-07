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

    $sql = "DELETE FROM pessoa WHERE id_pessoa = $req";
    $sql2 = "DELETE FROM aluno WHERE FK_PESSOA_id_pessoa = $req";

    $del = mysqli_query($connect, $sql);
    $del2 = mysqli_query($connect, $sql2);

    mysqli_close($connect);

    header('location: admpag.php');

?>
