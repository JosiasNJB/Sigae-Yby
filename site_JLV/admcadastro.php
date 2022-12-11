
		<?php
			//chamando o header na pagina	
			include_once 'header.php';

		?>	

		<br><br>
        <h3>Cadastro</h3>
		<br><br>

        <section>
			<!-- a tag <form> possibilita o uso de formularios -->
			<form class="col s12" action="criarUsuario.php" method="post">

				<!-- <div> é a tag usada para dividir e organizar o documento -->

				<div class="row">
					<div class="input-field col s10 pull-s1">
						  <input id="siape" type="number" class="validate" name="siape">
						  <label for="siape">Siape</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
						  <input id="admsenha" type="password" class="validate" name="admsenha">
						  <label for="admsenha">Senha de administrador</label>
					</div>
				</div>

				<div class="row">
					
					<div class="input-field col s5">
						<input id="nome" type="text" class="validate" name="nome">
						<label for="nome">Nome</label>
					</div>

					<div class="input-field col s5 pull-s1">
						<input id="telefone" type="tel" class="validate" name="telefone">
						<label for="telefone">Telefone</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
						<input id="email" type="text" class="validate" name="email">
						<label for="email">E-Mail</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
						  <input id="senha" type="password" class="validate" name="senha">
						  <label for="senha">Senha</label>
					</div>
				</div>

				<div class="btnSubmit">
					<button class="btn btn-outline-success" type="submit" name="btn_Send">Enviar</button>

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
				<br>
				<br>
				<br>

			</form>


		</section>

		<!-- chamando o footer na pagina -->		
		<?php include_once 'footer.php';?>
