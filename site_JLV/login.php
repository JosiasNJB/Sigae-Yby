
		<?php
				
			//chamando o header na pagina	
			include_once 'header.php';		
				
		?>

		<section>
		
		<h3>Login</h3>
			<br><br>
			<!-- a tag <form> possibilita o uso de formularios -->

			<form class="col m6 " action="logging.php" method="post">

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">

					<div class="input-field col s10 pull-s1">
						<input id="siape" type="text" name="siape" class="validate">
						<label for="siape">Siape </label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
						<input id="senha" type="password" name="senha" class="validate">
						<label for="senha">Senha</label>
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
							//imprimindo os erros
							if(!empty($_SESSION['erros'])){
								foreach($_SESSION['erros'] as $erro){
									echo $erro;

								}
							}
							$_SESSION['erros'] = array();
						?>
					</ul>
				</div>
				
				<br>

			</form>
			

		</section>

		<br>
		<br>

		<div>
			<a href="admcadastro.php"> Não tem uma conta? Cadastre-se agora!</a>
		</div>

		<br>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>
