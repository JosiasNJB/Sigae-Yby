<?php

// ESSE CÓDIGO CORRESPONDE À PÁGINA 'CADASTRAR EVENTO'

/*
 * O seguinte codigo abre uma conexao com o BD e adiciona um evento nele.
 * As informacoes de um evento sao recebidas atraves de uma requisicao POST.
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
	// A criacao de um evento precisa dos seguintes parametros:
	// tipo - tipo de evento (ex: festa, palestra, batalha de rima etc...)
	// quando - data do post
	// para quem - público ou privado
	// descricao - descricao a respeito do que se trata o evento

	if (isset($_POST['tipo']) && isset($_POST['quando']) && isset($_POST['paraQuem']) && isset($_POST['descricao'])) {

		//POST
		//GET
		//FILES
		
		// Aqui sao obtidos os parametros
		$tipo = $_POST['tipo'];
		$quando = $_POST['quando'];
		$paraQuem = $_POST['paraQuem'];
		$descricao = $_POST['descricao']

		// A proxima linha insere um novo evento no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		$consulta = $db_con->prepare("INSERT INTO eventos(tipo, quando, paraQuem, descricao) VALUES('$tipo', '$quando', '$paraQuem', '$descricao')");
		if ($consulta->execute()) {

			// Se o evento foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 1

			$resposta["sucesso"] = 1; // ESSA MENSAGEM É VISTA NA TELA? SE SIM, POSSO ALTERAR NÉ?

		} else {
			// Se o evento nao foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar evento no BD: " . $consulta->error;
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