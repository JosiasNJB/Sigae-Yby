<?php
 
/*
 * O seguinte codigo abre uma conexao com o BD e adiciona um admnistrador nele.
 * As informacoes de um administrador sao recebidas atraves de uma requisicao POST.
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
	// A criacao de um administrador precisa dos seguintes parametros:

	// email - preco do admnistrador
	// siape - SIAPE do admnistrador
	// senha - senha do administrador -->  PRECISA DE OUTRA VARIÁVEL PARA A CONFIRMACAO?

	if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['siape']) && isset($_POST['senha'])) {
		
		// Aqui sao obtidos os parametros
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$siape = $_POST['siape'];
		$siape = $_POST['senha'];
		
		// A proxima linha insere um novo aluno no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		$consulta = $db_con->prepare("INSERT INTO cadastro(nome, email, siape, senha) VALUES('$nome', '$email', '$siape', '$senha')");
		if ($consulta->execute()) {
			// Se o admnistrador foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 1
			$resposta["sucesso"] = 1;
		} else {
			// Se o admnistrador nao foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar admnistrador no BD: " . $consulta->error;
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