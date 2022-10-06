
		<?php

			//iniciando a sessao caso ainda nao haja uma inicializada
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}

			//chamando o arquivo de conexao
			require 'conexao.php';

			//obtendo id do usuario selecionado via get	
			if(isset($_GET['id'])){
				$_SESSION['id2'] = $_GET['id'];

			}

			//Isset determina que os campos do formulario nao sao nulos.
			if(isset($_POST['btn_Send'])){

				//inicializando array de erros
				$erros = array();

				//Criando e atribuindo às respectivas variaveis os valores inseridos nos campos do formulario.
				$id2 = $_SESSION['id2'];
				$nome=$_POST['nome'];
				$email=$_POST['email'];
				$senha = $_POST['senha'];
				if(isset($_POST['etnia'])){
					$etnia = $_POST['etnia'];
				}

				//preenchendo o array de erros
				else{
					$erros[] = "<li>O campo etnia precisa ser preenchido</li>";
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

				if(empty($senha)){
					$erros[] = "<li>O campo senha precisa ser preenchido</li>";
				}

				if(empty($erros)){

					//criptografando a senha
					$senha=md5($senha);

					//Sql query para inserir os valores obtidos na tabela
					$sql="UPDATE user set nome='$nome', email='$email', senha='$senha', etnia='$etnia' WHERE id_user = $id2 ;";

					
					
					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de login.
					*/ 
					if (mysqli_query($connect, $sql)){
						header('location: admpag.php');
					}
					else{
						header('location: update.php');
					}
				
				}

			}

			//chamando o header na pagina	
			include_once 'header.php';

		?>

		<br><br>
        <h3>Update</h3>
		<br><br>

        <section>
			<!-- a tag <form> possibilita o uso de formularios -->
			<form class="col s12" method="post" >

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">
					
					<div class="input-field col s5">
						<input id="nome" type="text" class="validate" name="nome" placeholder=" ">
						<label for="nome">Nome</label>
					</div>

					<div class="input-field col s5 pull-s1">
						<input id="email" type="text" class="validate" name="email" placeholder="">
						<label for="email">E-Mail</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
						  <input id="senha" type="password" class="validate" name="senha" placeholder="">
						  <label for="textarea1">Senha</label>
					</div>
				</div>

				<br>
				<p class="centerp">Como você se autodeclara?&nbsp;</p>
				<br>

				<div class="input-field col s6">

					<br>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Preto"/>
						  <span>Preto</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Pardo" />
						  <span>Pardo</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Branco" />
						  <span>Branco</span>
						</label>
					</p>

                    <p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Indigena" />
						  <span>Indígena</span>
						</label>
					</p>
	
					<p class="centerp">
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Outro"/>
						  <span>Outro</span>
						</label>
					</p>
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
