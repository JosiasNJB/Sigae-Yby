<?php
 
/*
 * O seguinte codigo abre uma conexao com o BD e adiciona um item de histórico nele.
 * As informacoes de um item de histórico sao recebidas atraves de uma requisicao POST.
 */

// conexão com bd
require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
	
	// Primeiro, verifica-se se todos os parametros foram enviados pelo cliente.
	// A criacao de um item de histórico precisa dos seguintes parametros:
	// titulo - titulo do item de histórico
	// descricao - descricao do item de histórico
	// quando - data do item de histórico

	if (isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['quando'])) {
		
		// Aqui sao obtidos os parametros
		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		$quando = $_POST['quando'];
		
		// A proxima linha insere um novo item de histórico no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		$consulta = $db_con->prepare("INSERT INTO itemHistorico(titulo, descricao, quando) VALUES('$titulo', '$descricao', '$quando)");
		if ($consulta->execute()) {
			// Se o item de histórico foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 1
			$resposta["sucesso"] = 1;
		} else {
			// Se o item de histórico nao foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar item de histórico no BD: " . $consulta->error;
		}
	} else {
		// Se a requisicao foi feita incorretamente, ou seja, os parametros 
		// nao foram enviados corretamente para o servidor, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido nao preenchido";
	}
}
else {
	// senha ou usuario nao confere
	$resposta["sucesso"] = 0;
	$resposta["erro"] = "usuario ou senha não confere";
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>