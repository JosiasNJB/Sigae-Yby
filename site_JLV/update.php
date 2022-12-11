
		<?php

			//iniciando a sessao caso ainda nao haja uma inicializada
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}

			include_once 'header.php';

			//obtendo id do usuario selecionado via get	
			if(isset($_GET['siape'])){
				$_SESSION['siape2'] = $_GET['siape'];

			}

			$siape2 = $_SESSION['siape2'];
			$sql2="SELECT * FROM usuario WHERE Siape = $siape2;";
			$resultado= mysqli_query($connect,$sql2);
			$array2 = mysqli_fetch_array($resultado);
			//var_dump($array2);
			$placehsiape =  $array2['Siape'];
			$placehname = $array2['nome'];
			$placehemail = $array2['email'];
			$placehtel = $array2['telefone'];
			
			//Isset determina que os campos do formulario nao sao nulos.
			if(isset($_POST['btn_Send'])){

				//inicializando array de erros
				$erros = array();

				//Criando e atribuindo às respectivas variaveis os valores inseridos nos campos do formulario.
				$siape=$_POST['siape'];
				$nome=$_POST['nome'];
				$email=$_POST['email'];
				$senha = $_POST['senha'];
				$tel = $_POST['telefone'];
				//preenchendo o array de erros

				if(empty($siape)){
					$erros[] = "<li>O campo siape precisa ser preenchido</li>";
				}

				if(empty($nome)){
					$erros[] = "<li>O campo nome precisa ser preenchido</li>";
				}

				if(empty($email)){
					$erros[] = "<li>O campo email precisa ser preenchido corretamente</li>";
				}
				else{
					//usando filtros de validacao
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
						$erros[] = "<li>O campo email precisa ser preenchido corretamente</li>";
					}
				}
				if(empty($tel)){
					$erros[] = "<li>O campo telefone precisa ser preenchido</li>";
				}

				if(empty($senha)){
					$erros[] = "<li>O campo senha precisa ser preenchido</li>";
				}

				if(empty($erros)){

					//criptografando a senha
					$senha=md5($senha);

					//Sql query para inserir os valores obtidos na tabela
					$sql="UPDATE usuario set nome='$nome', email='$email', senha='$senha', telefone='$tel' WHERE Siape = $siape2 ;";

					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de login.
					*/ 
					if (mysqli_query($connect, $sql)){
						header('location: login.php');
					}
					else{
						header('location: update.php');
					}
				}
			}


			//chamando o header na pagina	

		?>

		<br><br>
        <h3>Update</h3>
		<br><br>

        <section>
			<!-- a tag <form> possibilita o uso de formularios -->
			<form class="col s12" method="post" >

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">
					<div class="input-field col s10 pull-s1">
						  <input id="siape" type="text" class="validate" name="siape" value="<?php echo $placehsiape; ?> ">
						  <label for="siape">Siape</label>
					</div>
				</div>

				<div class="row">
					
					<div class="input-field col s5">
						<input id="nome" type="text" class="validate" name="nome" value="<?php echo $placehname; ?> ">
						<label for="nome">Nome</label>
					</div>

					<div class="input-field col s5 pull-s1">
						<input id="telefone" type="tel" class="validate" name="telefone" value="<?php echo $placehtel; ?> ">
						<label for="telefone">Telefone</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
					<input id="email" type="text" class="validate" name="email" value="<?php echo $placehemail; ?>">
						<label for="email">E-Mail</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
						  <input id="senha" type="password" class="validate" name="senha">
						  <label for="senha">Senha</label>
					</div>
				</div>



				<br>

				<div class="btnSubmit">
				<button class="btn waves-effect waves-light" type="submit" name="btn_Send"> Enviar</button>

				</div>

				<br>

				<div>
					<ul>
						<?php
							//imprimindo os erros
							if(!empty($erros)){
								foreach($erros as $erro){
									echo $erro;

								}
							}
						?>
					</ul>
				</div>

				<br>

			</form>


		</section>

		<br><br><br>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>
