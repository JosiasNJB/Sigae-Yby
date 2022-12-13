
        <?php 
        //chamando o header na pagina	
        include_once 'header.php';

		//iniciando a sessao caso ainda nao haja uma inicializada
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		//chamando o arquivo de conexao
		
		//sql query como uma string selecionando todos os dados dos evento na tabela
		$sql="SELECT FK_ALUNO_matricula as mat, nome, titulo, deschist FROM itemhist
		inner join aluno a on(FK_ALUNO_matricula = a.matricula) group by matricula";


		/* Está retornando, de dentro da tabela representada pela variável "$connect",
		um array que contém todos os resultados que atendem aos requisitos da consulta
		dentro de "$sql".
		*/
		$resultado= mysqli_query($connect,$sql);

        ?>

        <br><br>

		<?php
			if (mysqli_num_rows($resultado)==0){
				$stat = "<div class='my-wrapper valign-wrapper center-align'><h5> Parece que não há nenhum item no agora, favor volte mais tarde. </h5></div>";
			}
			else{
				$stat = "<h3 class='light'> Histórico de alunos </h3>";

			}
			echo $stat;
			if (mysqli_num_rows($resultado)>0){


		?>


        <br><br><br>

		<?php
			while($dados =mysqli_fetch_array($resultado)){
			

		?>
		<table class="depoimento">
			<br>
			<?php
			    /* Enquanto o array que contém os resultados da consulta tiver pelo menos 1 index,
				"$dadosevent" irá buscar um array contendo os dados do index.
                */
						$matricula = $dados['mat'];
						$nome = $dados['nome'];
						$titulo = $dados['titulo'];
						$desc= $dados['deschist'];

						$sql2 = "SELECT titulo, deschist from itemhist
						inner join aluno a on(FK_ALUNO_matricula = a.matricula) 
						where FK_ALUNO_matricula = '$matricula'";
						$resultado2= mysqli_query($connect,$sql2);
          
            ?>
			
			<thead>
				
				<tr>
					<th class="titlerelat"> <?php echo "$matricula &nbsp-&nbsp $nome";?></th>
				</tr>
			</thead>
			<tbody>
				<div >
							<?php
								if(mysqli_num_rows($resultado2)>0){
									while($dados2 =mysqli_fetch_array($resultado2)){
										echo "<tr class='bodyrelat'><td><p class='center'> <b>$dados2[0]</b> </p></td></tr>
										<tr ><td><p class='center'> $dados2[1] </p></td></tr>";
									}
								}
							?>
					<tr>
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