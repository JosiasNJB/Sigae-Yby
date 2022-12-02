<?php
 
/*
 * O codigo seguinte retorna a imagem de um produto.
 * Essa e uma requisicao do tipo GET. É retornado somente 
 * uma string contendo a imagem no formato de codificação base64. 
 */

// conexão com bd
require_once('conexao_db.php');

// array que guarda a resposta da requisicao
$resposta = "";


// Verifica se o parametro id foi enviado na requisicao
if (isset($_GET["id"])) {
	
	// Aqui sao obtidos os parametros
	$id = $_GET['id'];
 
	// Obtem do BD a imagem do produto com id especificado na requisicao GET
	$consulta = $db_con->prepare("SELECT img FROM produtos WHERE id = $id");
 
	if ($consulta->execute()) {
		if ($consulta->rowCount() > 0) {
 
			// Se o produto existe, a imagem é colocada  
			// no array de resposta.
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);
			$resposta = $linha["img"];
		} 
	}
}

// Fecha a conexao com o BD
$db_con = null;

// entrega a resposta para o cliente
echo $resposta;
?>