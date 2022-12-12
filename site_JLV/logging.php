<?php
    //chamando os arquivos
	require_once("conexao.php");
	include("classUsuario.php");

    //começando a sessão
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //isset para verificar se o botao foi apertado
	if(isset($_POST['btn_login'])){

        //
		$usuario = new Usuario();
		$siape = filter_var($_POST['siape'], FILTER_SANITIZE_STRING);
		$senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

		//Condição se os campos de login e senha estão vazios
		if(empty($siape) or empty($senha)){
			//Guardando no array de erro
			$erros[] = "<li class ='center' > O campo login/senha precisa ser preenchido </li>";
			$_SESSION['erros'] = $erros;
			header('Location: login.php');
		}
		else{

			$cripto = md5($senha);
			$usuario->setSiape($siape);
			$usuario->setSenha($cripto);
			$consulta = $usuario->login();
			
			if ($consulta){

				//Sessão para logar o usuário
				$_SESSION['logado'] = true;
				$siape = $usuario->getSiape();
				//Sessão para guardar o id do usuário logado
				$_SESSION['siape'] = $siape;
				//Manda o usuário para a página principal
				header('Location: index.php');
                
            }
			else{
				//Avisa que houve um erro com os dados
				$erros[] = "<li class ='center' >Usuário e senha não conferem.</li>";
				$_SESSION['erros'] = $erros;
                header('Location: login.php');
            }
		}
	}
?>
