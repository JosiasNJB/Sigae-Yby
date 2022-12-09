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
	// deschist - descricao do item de histórico
	// fk_USUARIO_Siape - ******* do item de histórico // JOSIAS
	// horahist - hora do item de histórico
	// idHist - id do item de histórico
	// fk_ALUNO_matricula - **** do item de histórico // JOSIAS


	if (isset($_POST['titulo']) && isset($_POST['deschist']) && isset($_POST['fk_USUARIO_Siape']) && isset($_POST['horahist']) && isset($_POST['idHist']) && isset($_POST['fk_ALUNO_matricula'])) {
		
		// Aqui sao obtidos os parametros
		$titulo = $_POST['titulo'];
		$deschist = $_POST['deschist'];
		$fk_USUARIO_Siape = $_POST['fk_USUARIO_Siape'];
		$horahist = $_POST['horahist'];
		$idHist = $_POST['idHist'];
		$fk_ALUNO_matricula = $_POST['fk_ALUNO_matricula'];

		
		// A proxima linha insere um novo item de histórico no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		$consulta = $db_con->prepare("INSERT INTO itemhist(titulo, deschist, fk_USUARIO_Siape, horahist, idHist, fk_ALUNO_matricula) VALUES('$titulo', '$titulo', '$deschist', '$fk_USUARIO_Siape', '$horahist', '$idHist', '$fk_ALUNO_matricula')");
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
	// titulo, deschist, fk_USUARIO_Siape, horahist, idHist ou fk_ALUNO_matricula não conferem
	$resposta["sucesso"] = 0;
	$resposta["erro"] = "titulo, deschist, fk_USUARIO_Siape, horahist, idHist ou fk_ALUNO_matricula não conferem";
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>