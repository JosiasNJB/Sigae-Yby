<?php
 
/*
 * O codigo seguinte retorna os dados detalhados de um evento.
 * Essa e uma requisicao do tipo GET. Um evento e identificado 
 * pelo campo id.
 */

// conexão com bd
require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
 
	// Verifica se o parametro id foi enviado na requisicao
	if (isset($_GET["id"])) {
		
		// Aqui sao obtidos os parametros
		$id = $_GET['id'];
	 
		// Obtem do BD os detalhes do evento com id especificado na requisicao GET

		$consulta = $db_con->prepare("SELECT * FROM produtos WHERE id = $id"); // QUAL É??? JOSIAAS
	 
		if ($consulta->execute()) {
			if ($consulta->rowCount() > 0) {
	 
				// Se o evento existe, os dados completos do evento 
				// sao adicionados no array de resposta. A imagem nao 
				// e entregue agora pois ha um php exclusivo para obter 
				// a imagem do evento.
				$linha = $consulta->fetch(PDO::FETCH_ASSOC);
	 
				$resposta["idevento"] = $linha["idevento"];
				$resposta["evento"] = $linha["evento"];
				$resposta["tema"] = $linha["tema"];
				$resposta["descevent"] = $linha["descevent"];
				$resposta["eventstatus"] = $linha["eventstatus"];
			
				// Caso o evento exista no BD, o cliente 
				// recebe a chave "sucesso" com valor 1.
				$resposta["sucesso"] = 1;
				
			} else {
				// Caso o evento nao exista no BD, o cliente 
				// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
				// motivo da falha.
				$resposta["sucesso"] = 0;
				$resposta["erro"] = "Evento não encontrado";
			}
		} else {
			// Caso ocorra falha no BD, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro no BD: " . $consulta->error;
		}
	} else {
		// Se a requisicao foi feita incorretamente, ou seja, os parametros 
		// nao foram enviados corretamente para o servidor, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido não preenchido";
	}
}
else {
	// senha ou usuario nao confere
	$resposta["sucesso"] = 0;
	$resposta["error"] = "idevento, evento, tema, descevent ou eventstatus não confere";
}
// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>