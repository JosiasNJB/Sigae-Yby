<?php

// Abre uma conexao com o BD.

$host = "host = localhost;";
$port = "port = 330;";
$dbname = "dbname = banco_projetointegrador;";
$dbuser = "root";
$dbpassword	= "usbw";

// dados de conexao com o railway. Usar somente caso esteja usando railway
//$host        = "host = " . getenv("PGHOST") . ";";
//$port        = "port = " . getenv("PGPORT") . ";";
//$dbname      = "dbname = " . getenv("PGDATABASE") . ";";
//$dbuser 	 = getenv("PGUSER");
//$dbpassword	 = getenv("PGPASSWORD");

// para conectar ao mysql, substitua pgsql por mysql
$db_con= new PDO('mysql:' . $host . $port . $dbname, $dbuser, $dbpassword);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
