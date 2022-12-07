
		<?php
			//iniciando a sessao caso ainda nao haja uma inicializada
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}

			//chamando o arquivo de conexao
			require 'conexao.php';

			//isset determina que o botao foi ativado.
			if (isset($_POST['btn_login'])){

				//inicializando array de erros
				$erros = array();

				//obtendo os valores dos formularios via post
				$em = $_POST['email'];		
				$sen = $_POST['senha'];

				//colocando mensagens no array de erros
				if(empty($em)){
					$erros[] = "<li>O campo email precisa ser preenchido</li>\n";
				}

				if(empty($sen)){
					$erros[] = "<li>O campo senha precisa ser preenchido</li>\n";
				}

				//imprimindo os erros

				else{

					//mysqli_escape_string - função que limpa os dados e evita sqlinjection e outros caracteres indevidos.
					//Cryptografando a senha
					$senha = md5(mysqli_escape_string($connect, $sen));

					//Query de sql como uma string obtendo id, email e senha do usuario quando a senha e email estao corretos
					$sql = "SELECT siape, email, senha from usuario where email = '$em' and senha = '$senha' ";
					
					/* Está retornando, de dentro da tabela representada pela variável "$connect",
					um array que contém todos os resultados que atendem aos requisitos da consulta
					dentro de "$sql".
					*/
					$resultado = mysqli_query($connect, $sql);


					/* Se o array que contém os resultados da consulta tiver pelo menos 1 index,
					"$dados" irá buscar um array contendo os dados do index,
					então ele salva um boolean que diz que o usuário está logado
					e salva o id do usuário, também redireciona para a pagina de inicio.
					*/
					if (mysqli_num_rows($resultado) > 0){
						
						$dados = mysqli_fetch_array($resultado);
						$_SESSION['logado'] = true;
						$_SESSION['idu'] = $dados['id_pessoa'];
						header("location: index.php");

					}

					//erro de usuario/senha errado
					else{
						$erros[] = "<li>Usuário e senha não conferem.</li>";
					}
				}
			}
				
			//chamando o header na pagina	
			include_once 'header.php';		
				
		?>

		<section>
		
		<h3>Login</h3>
			<br><br>
			<!-- a tag <form> possibilita o uso de formularios -->

			<form class="col m6 " method="post">

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">

					<div class="input-field col s10 pull-s1">
						<input id="email" type="text" name="email" class="validate">
						<label for="email">E-Mail </label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
						<input id="senha" type="password" name="senha" class="validate">
						<label for="textarea1">Senha</label>
					</div>
				</div>

				<br>

				<div class="btnSubmit">
				<button class="btn waves-effect waves-light" type="submit" name="btn_login"> Enviar</button>
				</div>

				<br>

				<div>
					<ul>
						<?php
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

		<br>
		<br>

		<div>
			<a href="admcadastro.php"> Cadastro de administrador</a>
		</div>

		<br>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>
