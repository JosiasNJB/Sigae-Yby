<?php

// ESSE CÓDIGO CORRESPONDE À PÁGINA 'CADASTRAR ALUNO'

/*
 * O seguinte codigo abre uma conexao com o BD e adiciona um aluno nele.
 * As informacoes de um aluno sao recebidas atraves de uma requisicao POST.
 */

// conexão com bd
require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
	
	// Primeiro, verifica-se se todos os parametros foram enviados pelo cliente (adm).
	// A criacao de um aluno precisa dos seguintes parametros:
	// nome - nome do aluno
	// matricula - matricula do aluno
	// email - email do aluno
	// telefone - telefone do aluno
	// assistencia - se o aluno recebe assistência estudantil ------> DÚVIDA SE É POST
	// etnia - etnia do aluno

	if (isset($_POST['nome']) && isset($_POST['matricula']) && isset($_POST['email']) && isset($_POST['telefone']) 
	&& isset($_POST['assistencia']) && isset($_POST['etnia'])) {

		//POST
		//GET
		//FILES
		
		// Aqui sao obtidos os parametros
		$nome = $_POST['nome'];
		$preco = $_POST['matricula'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone']
		$assistencia = $_POST['assistencia']
		$etnia = $_POST['etnia']

		// A proxima linha insere um novo aluno no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		$consulta = $db_con->prepare("INSERT INTO alunos(nome, matricula, email, telefone, assistencia, etnia) VALUES('$nome', '$matricula', '$email', '$telefone', '$assistencia', '$etnia')");
		if ($consulta->execute()) {

			// Se o aluno foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 1
			$resposta["sucesso"] = 1; // ESSA MENSAGEM É VISTA NA TELA? SE SIM, POSSO ALTERAR NÉ?

		} else {
			// Se o aluno nao foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar aluno no BD: " . $consulta->error;
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