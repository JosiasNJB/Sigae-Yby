
		<?php

			//chamando o arquivo de conexao
			require 'conexao.php';

			//isset determina que o botao foi ativado.
			if(isset($_POST['btn_C'])){

				//inicializando array de erros
				$erros = array();

				//obtendo os valores dos formularios via post
				$nome=$_POST['nome'];
				$snome=$_POST['snome'];
				$email=$_POST['email'];
				$tel=$_POST['tel'];
				$msg=$_POST['msg'];


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

				if(empty($snome)){
					$erros[] = "<li>O campo sobrenome precisa ser preenchido</li>";
				}

				if(empty($tel)){
					$erros[] = "<li>O campo telefone precisa ser preenchido</li>";
				}

				if(empty($msg)){
					$erros[] = "<li>O campo mensagem precisa ser preenchido</li>";
				}

				if(empty($erros)){

					//Sql query para inserir os valores obtidos na tabela
					$sql = "INSERT 	INTO contato(nome, sobrenome, email, telefone, mensagem) VALUES('$nome', '$snome', '$email', '$tel', '$msg');";
					
					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de inicio.
					*/ 
					if (mysqli_query($connect, $sql)){
						header('location: index.php');
					}
					else{
						header('location: contato.php');
					}

				}
			}

			//chamando o header na pagina	
			include_once 'header.php';

		?>
		
		<!-- A tag <section> para marcar as seções de conteúdo de uma página.-->
		<section>

			<h3>Contato</h3>
			<br><br>
				<!-- Resumidamente, tag <form> possibilita que trabalhemos com formulários.-->
				<form method="post">
					<div class="row">
						
						<div class="input-field col s5">
							<input id="nome" type="text" class="validate" name="nome">
							<label for="nome">Nome</label>
						</div>

						<div class="input-field col s5 pull-s1 ">
							<input id="sobrenome" type="text" class="validate" name="snome">
							<label for="sobrenome">Sobrenome:</label>
						</div>

					</div>

					<div class="row">
						<div class="input-field col s5 ">
							<input id="email" type="email" class="validate" name="email">
							<label for="email">E-Mail:</label>
						</div>

						<div class="input-field col s5 pull-s1">
							<input id="numero" type="tel" pattern="[0-9]{9}" class="validate" name="tel" >
							<label for="numero">Telefone:</label>
						</div>

					</div>

					<div class="row">
						<div class="input-field col s10 pull-s1">
							<textarea id="textarea1" class="materialize-textarea" name="msg"></textarea>
							<label for="textarea1">Mensagem:</label>
						</div>
						
					</div>

					<br>
					<br>

					<div class="btnSubmit">
					<button class="btn waves-effect waves-light" type="submit" name="btn_C"> Enviar</button>
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
				<p>
					<h3>Fale Conosco!</h3>

					<p class="centerp">
						Email: nomefalso@Brasil_TerraIndígena.com<br>
						Telefone: +45 666666-666<br>
						Instagram do Neabi: <a href="https://www.instagram.com/neabi.serra/">https://www.instagram.com/neabi.serra/</a>
					</p>

				</p>

				<br>

				<h3>Fale com o Campus Serra! </h3>
				
				<p class="centerp">
					Site official: <a href="https://serra.ifes.edu.br/">https://serra.ifes.edu.br/</a>
				</p>

				<br>
				<br>

				<p class="centerp">Encontre mais informações aqui: <a href="https://ifes.edu.br/noticias/2-uncategorised/19345-contatos-dos-neabi-no-ifes">https://ifes.edu.br/noticias/2-uncategorised/19345-contatos-dos-neabi-no-ifes<a></p>

				<br>
				<br>
			</section>

		<br><br>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>