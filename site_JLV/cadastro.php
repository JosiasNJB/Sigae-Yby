
		<?php
			//chamando o header na pagina	
			include_once 'header.php';

			//isset determina que o botao foi ativado.
			if(isset($_POST['btn_Send'])){

				//inicializando array de erros
				$erros = array();

				//obtendo os valores dos formularios via post
				$matricula = $_POST['matricula'];
				$nome=$_POST['nome'];
				$email=$_POST['email'];

				$sql2 = "SELECT Matricula FROM ALUNO where Matricula = '$matricula';";
				$res = mysqli_query($connect, $sql2);

				//preenchendo o array de erros
				if(empty($matricula)){
					$erros[] = "<li class ='center'>O campo matricula precisa ser preenchido</li>";
				}
				elseif(mysqli_num_rows($res) > 0){
					$erros[] = "<li class ='center'>Matricula já cadastrada</li>";
				}

				if(empty($nome)){
					$erros[] = "<li class ='center'>O campo nome precisa ser preenchido</li>";
				}

				if(empty($email)){
					$erros[] = "<li class ='center'>O campo email precisa ser preenchido</li>";
				}
				else{
					//usando filtros de validacao
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
						$erros[] = "<li class ='center'>O campo email precisa ser preenchido corretamente</li>";
					}
				}

				if(isset($_POST['etnia'])){
					$etnia = $_POST['etnia'];
				}
				else{
					$erros[] = "<li class ='center'>O campo etnia precisa ser preenchido</li>";
				}

				if(isset($_POST['cota'])){
					$cota = $_POST['cota'];
				}
				else{
					$erros[] = "<li class ='center'>O campo cota precisa ser preenchido</li>";
				}

				if(isset($_POST['curso'])){
					$curso = $_POST['curso'];
				}
				else{
					$erros[] = "<li class ='center'>O campo curso precisa ser preenchido</li>";
				}

				if(isset($_POST['renda'])){
					$renda = $_POST['renda'];
				}
				else{
					$erros[] = "<li class ='center'>O campo renda precisa ser preenchido</li>";
				}


				if(empty($erros)){
					//usando filtros
					$nome=filter_var($nome, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

					//Sql query para inserir os valores obtidos na tabela 
					$sql="INSERT INTO aluno(Matricula, Nome, FK_ETNIA_id_etnia, FK_COTA_id_Cota, FK_RENDA_id_Renda) VALUES('$matricula', '$nome');";
					//var_dump($sql);
		
					/*Msqli_query aplica a string "$sql"
					e se o insert for devidamente realizado header direciona o usuario para a pagina de login.
					*/ 
					if(mysqli_query($connect, $sql)){
						echo 'meupau';
						//header('location: admpag.php');
					}
					else{
						echo 'dsjk';
						//header('location: cadastro.php');
					}
				}
			}
		?>	

		<br><br>
        <h3>Cadastro</h3>
		<br><br>

        <section>
			<!-- a tag <form> possibilita o uso de formularios -->
			<form class="col s12" method="post">

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">
					<div class="input-field col s10 pull-s1">

						  <input id="matricula" type="text" class="validate" name="matricula">
						  <label for="matricula">Matricula</label>
					</div>
				</div>

				<div class="row">
					
					<div class="input-field col s5">
						<input id="nome" type="text" class="validate" name="nome">
						<label for="nome">Nome</label>
					</div>

					<div class="input-field col s5 pull-s1">
						<input id="email" type="text" class="validate" name="email">
						<label for="email">E-Mail</label>
					</div>
				</div>

				<br><br><br>
				<!--
				<div class="row">
					<h6 class="col s4 push-s1 valign-wrapper"><b>Possui assistência?</b></h6>
					<div class="input-field col s5 pull-s1">
		
						<p>
							<label>
							<input class="with-gap col s2" name="assist" type="radio" value="1"/>
							<span>Sim</span>
							</label>
						</p>
		
						<p>
							<label>
							<input class="with-gap col s2 " name="assist" type="radio" value="2" />
							<span>Não</span>
							</label>
						</p>

					</div>
				</div>
				-->
					<br><br><br>

				<div class="row">
					<div class="input-field col s2 push-s1">
						<select name="etnia">
							<option value="" disabled selected>Etnia</option>
							<option value="1">Preto</option>
							<option value="2">Pardo</option>
							<option value="3">Branco</option>
							<option value="4">Indígena</option>
							<option value="5">Outro</option>
						</select>
					</div>

					<div class="input-field col s2 ">
						<select name="cota">
							<option value="" disabled selected>Cota</option>
							<option value="1">Ampla concorrência</option>
							<option value="2">Racial</option>
							<option value="3">Econômica</option>
							<option value="4">Necessidade Especial</option>
							<option value="5">Escolaridade</option>
						</select>
					</div>

					<div class="input-field col s2 pull-s1">
						<select name="curso">
							<option value="" disabled selected>Curso</option>
							<option value="1">Informática para Internet</option>
							<option value="2">Mecatrônica</option>
							<option value="3">IOT</option>
							<option value="4">Automação</option><
							<option value="5">Sistemas de Informação</option>
						</select>
					</div>

					<div class="input-field col s2 pull-s2">
						<select name="renda">
							<option value="" disabled selected>Renda(Salários minimos)</option>
							<option value="1">0 a 2</option>
							<option value="2">2 a 5</option>
							<option value="3">5 a 8</option>
							<option value="4">8 a 10</option>
							<option value="5">10+</option>
						</select>
					</div>

				</div>

				<br><br><br><br><br><br><br><br><br><br><br><br><br>
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

		<script>
			$(document).ready(function(){
				$('select').formSelect();
			});
		</script>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>
