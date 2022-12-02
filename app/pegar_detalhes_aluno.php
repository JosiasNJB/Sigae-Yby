<?php
 
/*
 * O codigo seguinte retorna os dados detalhados de um aluno.
 * Essa e uma requisicao do tipo GET. Um aluno e identificado 
 * pelo campo id.
 * 
 * GET
 * POST
 * FILES
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
	 
		// SEM BANCO DE DADOS VERDADEIRO
		// Obtem do BD os detalhes do produto com id especificado na requisicao GET
		$consulta = $db_con->prepare("SELECT * FROM produtos WHERE id = $id"); //CONSULTAR
	 
		if ($consulta->execute()) {
			if ($consulta->rowCount() > 0) {
	 
				// Se o ALUNO existe, os dados completos do ALUNO 
				// sao adicionados no array de resposta. 
				
				$linha = $consulta->fetch(PDO::FETCH_ASSOC);
	 
				$resposta["nome"] = $linha["nome"];
				$resposta["matricula"] = $linha["matricula"];
				$resposta["email"] = $linha["email"];
				$resposta["telefone"] = $linha["telefone"];
				$resposta["assistencia"] = $linha["assistencia"];

				
				// Caso o aluno exista no BD, o cliente 
				// recebe a chave "sucesso" com valor 1.
				$resposta["sucesso"] = 1;
				
			} else {
				// Caso o aluno nao exista no BD, o cliente 
				// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
				// motivo da falha.
				$resposta["sucesso"] = 0;
				$resposta["erro"] = "Aluno não encontrado";
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
	$resposta["error"] = "usuario ou senha não confere"; // VER OQ TEM DE INCOMPATIVEL
}
// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>