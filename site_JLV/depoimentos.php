
        <?php 
        //chamando o header na pagina	
        include_once 'header.php';

		//iniciando a sessao caso ainda nao haja uma inicializada
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		//chamando o arquivo de conexao
		require 'conexao.php';
		
		//sql query como uma string selecionando todos os dados dos depoimentos na tabela
		$sql="SELECT * FROM depoimentos";

		/* Está retornando, de dentro da tabela representada pela variável "$connect",
		um array que contém todos os resultados que atendem aos requisitos da consulta
		dentro de "$sql".
		*/
		$resultado= mysqli_query($connect,$sql);
        ?>

        <br><br>



        <h3 class="light"> Depoimentos </h3>

        <br><br><br><br>


		<table class="depoimento">
			<?php
			    /* Enquanto o array que contém os resultados da consulta tiver pelo menos 1 index,
				"$dados" irá buscar um array contendo os dados do index.
                */
                if (mysqli_num_rows($resultado)>0){
                     while($dados =mysqli_fetch_array($resultado)){
						$tema = $dados['tema'];
						$grupo = $dados['grupo'];
						$dep = $dados['dep']
          
            ?>
			
			<thead>
				<tr>
					<th> <?php echo "$tema &nbsp-&nbsp $grupo";?></th>
				</tr>
			</thead>
			<tbody>
				<div class="dep">
					<tr>

						<td> 
							<?php
								echo "<p class='center'> $dep </p>";
							?>
						</td>

					</tr>
				</div>
				<?php
						}
					}
				?>
			</tbody>

		</table>
   
        <br><br><br><br>

        <!-- chamando o footer na pagina -->	
        <?php include_once 'footer.php';?>                        