
		<?php

			//iniciando a sessao caso ainda nao haja uma inicializada
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			//chamando o header na pagina
			include_once 'header.php';

			include_once 'classUsuario.php';
			
			//obtendo id do usuario selecionado via get	
			if(isset($_GET['siape'])){
				//filter_var retorna false se o parâmetro não for inteiro, e caso contrário retorna um inteiro.
				$siape=filter_var($_GET['siape'], FILTER_VALIDATE_INT);
				
				//Se o id for inteiro, então será consultado o usuario pelo id
				if ($siape){
	
					//instancia o usuario
					$usuario = new Usuario();	
					//consulta o usuario pelo id
					$_SESSION['tableline']= $usuario->find($siape);
	
				}
				else{
					$_SESSION['erros'][] = "<li class ='center'>parâmetro inválido.</li>";
				}
			}

		?>

		<br><br>
        <h3>Update</h3>
		<br><br>

        <section>
			<!-- a tag <form> possibilita o uso de formularios -->
			<form class="col s12" action="updateUsuario.php" method="post" >

				<!-- <div> é a tag usada para dividir e organizar o documento -->
				<div class="row">
					<div class="input-field col s10 pull-s1">
						  <input id="siape" type="text" name="siape" value="<?php echo $_SESSION['tableline']['siape']; ?>"readonly>
						  <label for="siape">Siape</label>
					</div>
				</div>

				<div class="row">
					
					<div class="input-field col s5">
						<input id="nome" type="text" class="validate" name="nome" value="<?php echo $_SESSION['tableline']['nome']; ?> ">
						<label for="nome">Nome</label>
					</div>

					<div class="input-field col s5 pull-s1">
						<input id="telefone" type="tel" class="validate" name="telefone" value="<?php echo $_SESSION['tableline']['telefone']; ?> ">
						<label for="telefone">Telefone</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s10 pull-s1">
					<input id="email" type="text" class="validate" name="email" value="<?php echo $_SESSION['tableline']['email']; ?>">
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

		<br><br><br>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>
