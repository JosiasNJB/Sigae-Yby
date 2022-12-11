
		<?php

			//chamando o arquivo de conexao
			
			//chamando o header na pagina	
			include_once 'header.php';

			$sql="SELECT * FROM usuario WHERE Siape = $siape;";
			$resultado= mysqli_query($connect,$sql);
			$array = mysqli_fetch_array($resultado);
			$siape = $array[0];
			$nome = $array[1];
			$email = $array[2];
			$tel = $array[4];

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
					echo "$tel <br>";


				?>


			
			</h5>	
			
			
		</div>

		<p class="center"><br><br><a class="btn waves-effect waves-light green accent-4" href="update.php?siape=<?php echo $siape;?>"> Update</a><br></p>

		<p class="center"><br><br><a class="btn waves-effect waves-light red darken-4" href="logout.php">Log Out</a><br><br><br><br></p>


		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lobortis venenatis orci sed feugiat. Integer finibus justo eu nisi vestibulum venenatis. Duis eu consectetur justo. 
			Nullam consequat leo vel iaculis porttitor. Etiam laoreet at tortor id bibendum. Nulla bibendum enim risus, sit amet molestie sem feugiat et. 
			Sed aliquet purus laoreet nisl varius, in condimentum lorem dictum. Praesent viverra laoreet augue ut venenatis. In pulvinar eu quam quis suscipit. Nulla id felis a ipsum faucibus euismod. 
			Integer at pretium turpis, sit amet molestie nunc. <br>

		</p>
		<br><br><br>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>	