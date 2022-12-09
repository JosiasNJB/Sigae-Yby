<?php
//Classe de cliente
include_once 'classUsuario.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


if(isset($_POST['Enviar'])){
	
	//Limpa os dados dos campos e envia pelo método POST para o arquivo de conexão
    $siape = mysqli_escape_string($conexao,$_POST['Siape']);
	$nome = mysqli_escape_string($conexao,$_POST['nome'],);
    $telefone = mysqli_escape_string($conexao,$_POST['telefone']);
    $email = mysqli_escape_string($conexao,$_POST['email']);
	$senha = md5(mysqli_escape_string($conexao,$_POST['senha'])); //Senha criptografada com o MD5
	//Sanitizando o campo de nome
	$nomeSanitize = filter_var($nome, FILTER_SANITIZE_STRING);
	//$sobrenomeSanitize = filter_var($sobrenome, FILTER_SANITIZE_STRING);
	//Validando o campo de e-mail
	$emailValidate = filter_var($email, FILTER_VALIDATE_EMAIL);

    //atribuindo valores
	$usuario = new Usuario();
    $usuario->setSiape($siape);
	$usuario->setNome($nomeSanitize);
    $usuario->setTelefone($telefone);
    $usuario->setEmail($emailValidate);
	$usuario->setSenha($senha);
	
	if($usuario->insert()){
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: formEnd.php');
    }
	else{
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
		header('Location: admcadastro.php');
    }
}

?>
