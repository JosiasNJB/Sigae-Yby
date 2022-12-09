<?php

    //estabelecendo os valores para conexao com o banco de dados
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB", "banco_siape");

    //abrindo a conexao com o banco de dados
    $connect = mysqli_connect(HOST, USER, PASSWORD, DB);

    //erro de conexao
    if (mysqli_connect_error()){
        echo " Conection error: ". mysqli_connect_error();
    }


    //$conn = new mysqli('localhost', 'root', 'usbw', 'test2') or die('Conection error');

?>
