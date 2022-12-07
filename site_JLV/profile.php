
		<?php

			//chamando o arquivo de conexao
			require 'conexao.php';
			
			//chamando o header na pagina	
			include_once 'header.php';

			$sql="SELECT * FROM usuario WHERE Siape = $siape;";
			$resultado= mysqli_query($connect,$sql);
			$array = mysqli_fetch_array($resultado);
			$nome = $array[1];
			$email = $array[2];
			$telefone = $array[4];
			
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

				if(empty($erros)){

					//Sql query para inserir os valores obtidos na tabela 		
					$sql = "INSERT INTO depoimentos(tema, grupo, dep) VALUES('$tema', '$grupo', '$dep');";
					
					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de inicio.
					*/ 
					if (mysqli_query($connect, $sql)){
						header('location: depoimentos.php');
					}
					else{
						header('location: profile.php');
					}
				
				}
				
			}

		?>	
		<h2>Pagina de Perfil</h2>
		<br><br><br>
		<div class="row">
			<figure>
				<div>
					<a href="#"><img class="if" <?php echo $img; ?> alt="LogoIF"></a>
				</div>
		</figure>
			
			<h5>
				<br><br><br>
				<?php
					echo "$nome <br>";
					echo "$email<br>";
					echo "$etnia <br>";


				?>


			
			</h5>	
			
			
		</div>
		<p class="center"><br><br><a class="btn waves-effect waves-light red darken-4" href="logout.php">Log Out</a><br><br><br><br></p>


		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lobortis venenatis orci sed feugiat. Integer finibus justo eu nisi vestibulum venenatis. Duis eu consectetur justo. 
			Nullam consequat leo vel iaculis porttitor. Etiam laoreet at tortor id bibendum. Nulla bibendum enim risus, sit amet molestie sem feugiat et. 
			Sed aliquet purus laoreet nisl varius, in condimentum lorem dictum. Praesent viverra laoreet augue ut venenatis. In pulvinar eu quam quis suscipit. Nulla id felis a ipsum faucibus euismod. 
			Integer at pretium turpis, sit amet molestie nunc. <br>

		</p>
		<br><br><br>

	
		<!-- A tag <section> para marcar as seções de conteúdo de uma página.-->
		<section>
			<h3>Depoimento</h3>
			<br><br>

			<!-- Resumidamente, tag <form> possibilita que trabalhemos com formulários.-->
				
			<form method="post">
				<div class="row">
					<div class="input-field col s4">
						<input id="tema" type="text" class="validate" name="tema">
						<label for="tema">Tema:</label>
					</div>

					<div class="input-field col s4 pull-s2">
						<input id="grupo" type="text" class="validate" name="grupo">
						<label for="grupo">Grupo a que pertence:</label>
					</div>

				</div>

				<div class="row">
					<div class="input-field col s8 pull-s2">
						<textarea id="textarea1" class="materialize-textarea" name="dep"></textarea>
						<label for="textarea1">Seu Depoimento:</label>
					</div>

				</div>

				<br>
				<br>

				<div class="btnSubmit">
					<button class="btn waves-effect waves-light" type="submit" name="btn_D"> Enviar</button>
					
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
		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>	