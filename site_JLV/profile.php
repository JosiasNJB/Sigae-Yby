
		<?php

			//chamando o arquivo de conexao
			
			//chamando o header na pagina	
			include_once 'header.php';

			$sql="SELECT * FROM usuario WHERE siape = $siape;";
			$resultado= mysqli_query($connect,$sql);
			$array = mysqli_fetch_array($resultado);
			$siape = $array[0];
			$nome = $array[1];
			$email = $array[2];
			$tel = $array[4];

		?>
		<br><br>	
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
					echo "$tel <br>";


				?>


			
			</h5>	
			
			
		</div>
		<br><br>

		<br><br>

		<p class="center"><br><br><a class="btn waves-effect waves-light green accent-4" href="update.php?siape=<?php echo $siape;?>"> Update</a><br></p>

		<p class="center"><br><br><a class="btn waves-effect waves-light red darken-4" href="logout.php">Log Out</a><br><br><br><br></p>

		<br><br><br>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>	