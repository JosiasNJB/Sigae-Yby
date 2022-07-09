
		<?php

			//chamando o arquivo de conexao
			require 'conexao.php';
			
			//isset determina que o botao foi ativado.
			if(isset($_POST['btn_D'])){

				//inicializando array de erros
				$erros = array();

				//obtendo os valores dos formularios via post
				$tema=$_POST['tema'];
				$grupo=$_POST['grupo'];
				$dep=$_POST['dep'];

				//preenchendo o array de erros
				if(empty($tema)){
					$erros[] = "<li>O campo tema precisa ser preenchido</li>";
				}

				if(empty($grupo)){
					$erros[] = "<li>O campo grupo precisa ser preenchido</li>";
				}

				if(empty($dep)){
					$erros[] = "<li>O campo departamento precisa ser preenchido</li>";
				}

				//imprimindo os erros
				if(!empty($erros)){

					foreach($erros as $erro){
						echo $erro;
					}
				}

				else{

					//Sql query para inserir os valores obtidos na tabela 		
					$sql = "INSERT INTO depoimentos(tema, grupo, dep) VALUES('$tema', '$grupo', '$dep');";
					
					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de inicio.
					*/ 
					if (mysqli_query($connect, $sql)){
						header('location: index.php');
					}
					else{
						header('location: depoimentos.php');
					}
				
				}
				
			}

			//chamando o header na pagina	
			include_once 'header.php';

		?>	
		
		<!-- A tag <section> para marcar as seções de conteúdo de uma página.-->
		<section>
			<br><br>
			<h3>Depoimentos</h3>
			<br><br>

			<!-- Resumidamente, tag <form> possibilita que trabalhemos com formulários.-->
				
			<form method="post">
				<div class="row">
					
					<div class="input-field col s6">
						<input id="tema" type="text" class="validate" name="tema">
						<label for="tema">Tema:</label>
					</div>

					<div class="input-field col s6">
						<input id="grupo" type="text" class="validate" name="grupo">
						<label for="grupo">Grupo a que pertence:</label>
					</div>

				</div>

				<div class="input-field col s12">
					<textarea id="textarea1" class="materialize-textarea" name="dep"></textarea>
					<label for="textarea1">Seu Depoimento:</label>
			    </div>

				<br>
				<br>

				<div class="btnSubmit">
					<button class="btn waves-effect waves-light" type="submit" name="btn_D"> Enviar</button>
				</div>

				<br>

			</form>
		</section>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>	