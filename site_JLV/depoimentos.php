
        <?php 
        //chamando o header na pagina	
        include_once 'header.php';

		//iniciando a sessao caso ainda nao haja uma inicializada
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		//chamando o arquivo de conexao
		
		//sql query como uma string selecionando todos os dados dos evento na tabela
		$sql="SELECT * FROM depoimento";

		/* Está retornando, de dentro da tabela representada pela variável "$connect",
		um array que contém todos os resultados que atendem aos requisitos da consulta
		dentro de "$sql".
		*/
		$resultado= mysqli_query($connect,$sql);

        ?>

        <br><br>

		<?php
			if (mysqli_num_rows($resultado)==0){
				$depstat = "<div class='my-wrapper valign-wrapper center-align'><h5> Parece que não há nenhum depoimento agora, favor volte mais tarde. </h5></div>";
			}
			else{
				$depstat = "<h3 class='light'> Depoimentos </h3>";

			}
			echo $depstat;
			if (mysqli_num_rows($resultado)>0){


		?>


        <br><br><br><br>


		<table class="depoimento">
			<?php
			    /* Enquanto o array que contém os resultados da consulta tiver pelo menos 1 index,
				"$dadosevent" irá buscar um array contendo os dados do index.
                */
                
                     while($dadosdep =mysqli_fetch_array($resultado)){
                        $iddep=['id_dep'];
						$tema = $dadosdep['tema'];
						$grupo = $dadosdep['grupo'];
						$descdep= $dadosdep['descdep']
          
            ?>
			
			<thead>
				<tr>
					<th class="titlerelat"> <?php echo "$tema &nbsp-&nbsp $grupo";?></th>
				</tr>
			</thead>
			<tbody>
				<div >
					<tr class="bodyrelat">

						<td> 
							<?php
								echo "<p class='center'> $descdep </p>";
							?>
						</td>

					</tr>
					<tr>
						<td class="center"><a class="btn waves-effect waves-light red darken-4" href="deletedep.php?id_dep=<?php echo $dadosdep['id_dep'];?>"> Delete</td>
					</tr>
					</div>
			</tbody>
		

			<?php
						}
					}
			?>

		</table>           

        <br><br><br><br>

        <!-- chamando o footer na pagina -->	
        <?php include_once 'footer.php';?>                        