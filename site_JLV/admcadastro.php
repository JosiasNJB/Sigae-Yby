
		<?php

			//chamando o arquivo de conexao
			require 'conexao.php';

			//isset determina que o botao foi ativado.
			if(isset($_POST['btn_Send'])){

				//inicializando array de erros
				$erros = array();

				//obtendo os valores dos formularios via post
				$nome=$_POST['nome'];
				$email=$_POST['email'];
				$senha = $_POST['senha'];

				//metodo temporario de implementar administrador
				$admsenha = "123456789";

				

				//preenchendo o array de erros
				if(empty($nome)){
					$erros[] = "<li>O campo nome precisa ser preenchido</li>";
				}

				if(empty($email)){
					$erros[] = "<li>O campo email precisa ser preenchido</li>";
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

				if(isset($_POST['etnia'])){
					$etnia = $_POST['etnia'];
				}
				else{
					$erros[] = "<li>O campo etnia precisa ser preenchido</li>";
				}

				//metodo temporario de implementar administrador
				if($admsenha != $_POST['admsenha']){
					$erros[] = "<li>Senha de administrador não confere.</li>";
					
				}
				
				//imprimindo os erros
				if(!empty($erros)){
					foreach($erros as $erro){
						echo $erro;
					}
				}

				else{
					//usando filtros
					$nome=filter_var($nome, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
				
					//criptografando a senha
					$senha=md5($senha);
					
					//Sql query para inserir os valores obtidos na tabela
					$sql="INSERT INTO user(nome, email, senha, etnia, adm) VALUES('$nome', '$email', '$senha', '$etnia', '1');";
					
					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de login.
					*/ 
					if (mysqli_query($connect, $sql)){
						header('location: login.php');
					}
					else{
						header('location: cadastro.php');
					}
				}
			}

			//chamando o header na pagina	
			include_once 'header.php';

		?>	

		<br><br>
        <h3>Cadastro</h3>
		<br><br>

        <section>
			<!-- a tag <form> possibilita o uso de formularios -->
			<form class="col s12" method="post">

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">
					<div class="input-field col s12">
						  <input id="senha" type="password" class="validate" name="admsenha">
						  <label for="textarea1">Senha de administrador</label>
					</div>
				</div>

				<div class="row">
					
					<div class="input-field col s6">
						<input id="nome" type="text" class="validate" name="nome">
						<label for="nome">Nome</label>
					</div>

					<div class="input-field col s6">
						<input id="email" type="text" class="validate" name="email">
						<label for="email">E-Mail</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						  <input id="senha" type="password" class="validate" name="senha">
						  <label for="textarea1">Senha</label>
					</div>
				</div>

				<br>

				<div class="input-field col s6">
					<p>Como você se autodeclara?&nbsp;</p>

					<br>
	
					<p>
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Preto"/>
						  <span>Preto</span>
						</label>
					</p>
	
					<p>
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Pardo" />
						  <span>Pardo</span>
						</label>
					</p>
	
					<p>
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Branco" />
						  <span>Branco</span>
						</label>
					</p>

                    <p>
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Indigena" />
						  <span>Indígena</span>
						</label>
					</p>
	
					<p>
						<label>
						  <input class="with-gap" name="etnia" type="radio" value="Outro"/>
						  <span>Outro</span>
						</label>
					</p>
				</div>

				<br>

				<div class="btnSubmit">
					<button class="btn btn-outline-success" type="submit" name="btn_Send">Enviar</button>
				</div>

				<br>
				<br>
				<br>
				<br>

			</form>


		</section>

		<!-- chamando o footer na pagina -->		
		<?php include_once 'footer.php';?>
