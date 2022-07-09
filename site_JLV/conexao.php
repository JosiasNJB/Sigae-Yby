<?php

    //estabelecendo as variaveis para conexao com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $db_name = "banco_NEABI";

    //abrindo a conexao com o banco de dados
    $connect = mysqli_connect($servername, $username, $password, $db_name);

    //erro de conexao
    if (mysqli_connect_error()){
        echo " Conection error: ". mysqli_connect_error();
    }


    //$conn = new mysqli('localhost', 'root', 'usbw', 'test2') or die('Conection error');

?>
