<?php
    //chamando os arquivos
	require("conexao.php");
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
			$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
		}
		else{

			$cripto = md5($senha);
			$usuario->setSiape($siape);
			$usuario->setSenha($cripto);
			$consulta = $usuario->login();

			if ($consulta){

				//Sessão para logar o usuário
				$_SESSION['logado'] = true;
				$id = $usuario->getIdUsuario();
				//Sessão para guardar o id do usuário logado
				$_SESSION['siape'] = $dados['Siape'];
				//Manda o usuário para a página principal
				header('Location: index.php');
                
            }
			else{
				//Avisa que houve um erro com os dados
				$erros[]="Usuário e senha não conferem.";
                header('Location: login.php');
            }
		}
	}
?>
