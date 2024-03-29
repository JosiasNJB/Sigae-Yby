<?php
//Incluindo o necessario
include_once 'classUsuario.php';

//Iniciar  Sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}




if(isset($_POST['btn_Send'])){
	$erros = array();
	//Limpa os dados dos campos e envia pelo método POST para o arquivo de conexão
    $admsenha = "1";
    $siape = mysqli_escape_string($connect,$_POST['siape']);
	$nome = mysqli_escape_string($connect,$_POST['nome'],);
    $tel = mysqli_escape_string($connect,$_POST['telefone']);
    $email = mysqli_escape_string($connect,$_POST['email']);
	$senha = md5(mysqli_escape_string($connect,$_POST['senha'])); //Senha criptografada com o MD5
	//Sanitizando o campo de nome
	$nomeSanitize = filter_var($nome, FILTER_SANITIZE_STRING);
    $sql = "SELECT siape FROM USUARIO where siape = $siape";
    $res = mysqli_query($connect, $sql);



	//preenchendo o array de erros

	if(empty($siape)){
		$erros[] = "<li>O campo siape precisa ser preenchido</li>";
	}
    elseif(mysqli_num_rows($res) > 0){
        $erros[] = "<li class ='center'>Siape já cadastrado</li>";
    }


	if(empty($nomeSanitize)){
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

    if($admsenha != $_POST['admsenha']){
        $erros[] = "<li class ='center'>Senha de administrador não confere.</li>";
        
    }
 
    if(empty($erros)){
        //atribuindo valores
        $usuario = new Usuario();
        $usuario->setSiape($siape);
        $usuario->setNome($nomeSanitize);
        $usuario->setTel($tel);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $usuario->insertuser();
        $_SESSION['erros'] = array();
        header('Location: login.php');
    }
    else{
        $_SESSION['erros'] = $erros;
        header('Location: admcadastro.php');

    }
}

?>
