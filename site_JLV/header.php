<!DOCTYPE html>
<html>
	<!-- A tag <head> tem o papel de definir o cabeçalho do documento com informações que não serão exibidas dentro do conteúdo da página.-->
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
		<link rel="icon" type ="image/x-icon" href="img/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<?php

			//iniciando a sessao caso ainda nao haja uma inicializada
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			
			//chamando o arquivo de conexao
			require 'conexao.php';

			//isset para que logado não fique indefinido
			if(!isset($_SESSION['logado'])){
				$_SESSION['logado'] = false;
			}

			$admpag = "";
			$altdados = "";
			$adm = "";
			$dep = "";
			$aluno = "";
			
			if($_SESSION['logado'] == true){

				//obtendo a variavel de sessao para colocar na query
				$siape = $_SESSION['siape'];

				//sql query para obter nome e identificador de adm do usuario 
				$sql = "SELECT nome, siape from usuario where siape = $siape;";

				//Msqli_query aplica a string "$sql"
				$resultado = mysqli_query($connect, $sql);

				//array contendo os dados do usuario
				$array = mysqli_fetch_array($resultado);
				
				//atribuindo valores do array em variaveis
				$nome = $array[0];
				$siape = $array['1'];

				//diferenciando header para usuarios administradores
				$img ="src='img/iflogodark.png'";
				$admpag = "<li><a class='menuheader' href='admpag.php'> Administrador</a></li>";
				$perfil = "<li><a class='menuheader' href='profile.php'> $nome </li>
				<li><a href='profile.php'><img class='profile' $img alt='LogoIF'></a></li>";
				$dep = "<li><a class='menuheader' href='depoimentos.php'>Depoimentos</a></li>";
				$aluno = "<li><a class='menuheader' href='alunos.php'> Histórico </a></li>";
				$onoff = "";

			}
			//diferenciando o header caso o usuario nao esteja logado
			else{
				$admpag = "";
				$altdados = "";
				$dep = "<li><a class='menuheader' href='cdep.php'>Depoimentos</a></li>";
				$aluno = "";
				//$img = "src='img/iflogo.png'";
				$perfil = "";
				$onoff = "<li><a class='menuheader' href='login.php'>Login</a></li>";
			}
			
			
		?>

		<title> Yby </title>

	</head>

	<!-- A tag <body> é basicamente o corpo do nosso documento.-->
	<body>

		<header>

			<!-- A tag <figure> serve para marcar diagramas, ilustrações, fotos, e fragmentos de código.-->
			<figure>
				<a href="index.php"><img src="img/icon-forest-0.png" id="treeimg"alt="Yby"></a>
				<td> Yby </td> 
			</figure> 
			
			<!-- header com php para diferenciar se o usuario esta logado ou nao -->
			<div class="menu valign-wrapper">

				<li><a class='menuheader' href="index.php">Home</a></li>
				<!-- Repurpose depoimentos.php into showing the depoimentos stored in the database
				maybe make another page that only shows up when the pessoa is logged in to make the depoimentos meant to be stored
				maybe make a personal pessoa page where you can do the depoimentos and it shows pessoa info
				and from there you'd be able to log off and alter your own data like on the update page-->
				<li><a class='menuheader' href="graph.php">Gráficos</a></li>
				<li><a class='menuheader' href='eventos.php'> Eventos</a></li>
				<?php echo $dep; ?>
				<?php echo $aluno; ?>
				<?php echo $onoff; ?>
				<?php echo $admpag; ?>
				<?php echo $perfil; ?>
				
				
				
			</div>
				
		</header>
