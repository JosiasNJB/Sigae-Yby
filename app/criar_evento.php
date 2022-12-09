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

	// idevento VAI ENTRAR MESMO?

	if (isset($_POST['idevento']) $_POST['evento']) && isset($_POST['tema']) && isset($_POST['descevent']) && isset($_POST['eventstatus']) {

		//POST
		//GET
		//FILES
		
		// Aqui sao obtidos os parametros
		$tipo = $_POST['idevento'];
		$quando = $_POST['evento'];
		$paraQuem = $_POST['tema'];
		$descricao = $_POST['descevent']
		$descricao = $_POST['eventstatus']


		// A proxima linha insere um novo evento no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.

		//EVENTOS CORRESPONDE A ENTIDADE DO MODELO CONCEITUAL?
		$consulta = $db_con->prepare("INSERT INTO eventos(idevento, evento, tema, descevent, eventstatus) VALUES('$idvento', '$evento', '$tema', '$descevent', '$eventstatus')");
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
	// idevento, evento, tema, descevent ou eventstatus não confere
	$resposta["sucesso"] = 0;
	$resposta["erro"] = "idevento, evento, tema, descevent ou eventstatus não confere";
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>