<?php
//Iniciar  Sessão se a sessão não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//Classe de usuario
include_once 'classUsuario.php';


//verifica se o botão editar foi acionado
if(isset($_POST['btn_Send'])){

	//sanitiza os campos do formulário
    $siape=filter_var($_POST['siape'], FILTER_SANITIZE_NUMBER_INT);
	$nome=filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$senha=md5(filter_var($_POST['senha'], FILTER_SANITIZE_STRING));
	$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$tel=filter_var($_POST['telefone'], FILTER_SANITIZE_NUMBER_INT);
	
    //preenchendo o array de erros

	if(empty($nome)){
		$erros[] = "<li class ='center'>O campo nome precisa ser preenchido</li>";
	}

	if(empty($tel)){
		$erros[] = "<li class ='center'>O campo telefone precisa ser preenchido</li>";
	}

	if(empty($email)){
		$erros[] = "<li class ='center'>O campo email precisa ser preenchido</li>";
	}
	else{
		//usando filtros de validacao
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$erros[] = "<li class ='center'>O campo email precisa ser preenchido corretamente</li>";
		}
	}

    if(empty($_POST['senha'])){
		$erros[] = "<li class ='center'>O campo senha precisa ser preenchido</li>";
	}

    if(empty($erros)){
        //atribuindo valores
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setTel($tel);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $usuario->update($siape);
        $_SESSION['erros'] = array();
        header('Location: login.php');
    }
    else{
        $_SESSION['erros'] = $erros;
        header('Location: update.php');

    }

}



?>