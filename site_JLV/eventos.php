
        <?php 
        //chamando o header na pagina	
        include_once 'header.php';

		//iniciando a sessao caso ainda nao haja uma inicializada
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		//chamando o arquivo de conexao
		require 'conexao.php';
		
		//sql query como uma string selecionando todos os dados dos evento na tabela
		$sqlpublic="SELECT * FROM evento where eventstatus = 0";
        $sqlprivate="SELECT * FROM evento where eventstatus = 1";

		/* Está retornando, de dentro da tabela representada pela variável "$connect",
		um array que contém todos os resultados que atendem aos requisitos da consulta
		dentro de "$sql".
		*/
		$resultado= mysqli_query($connect,$sqlpublic);
        $resultadoprivate= mysqli_query($connect,$sqlprivate);

        if($adm == '1'){
            $admevent = "<h3 class='light'><br><br><br><br> Eventos para administradores </h3>";
        }
        else{

            $admevent = "";

        }

        ?>

        <br><br>



        <h3 class="light"> Eventos </h3>

        <br><br><br><br>


		<table class="depoimento">
			<?php
			    /* Enquanto o array que contém os resultados da consulta tiver pelo menos 1 index,
				"$dadosevent" irá buscar um array contendo os dados do index.
                */
                
                if (mysqli_num_rows($resultado)>0){
                     while($dadosevent =mysqli_fetch_array($resultado)){
                        $idevent=['id_evento'];
						$eventname = $dadosevent['eventnom'];
						$tema = $dadosevent['tema'];
						$descevent = $dadosevent['descevent']
          
            ?>
			
			<thead>
				<tr>
					<th> <?php echo "$eventname &nbsp-&nbsp $tema";?></th>
				</tr>
			</thead>
			<tbody>
				<div class="dep">
					<tr>

						<td> 
							<?php
								echo "<p class='center'> $descevent </p>";
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

        <?php
            echo $admevent;
        ?>
                   
        <table class="depoimento">
			<?php
			    /* Enquanto o array que contém os resultados da consulta tiver pelo menos 1 index,
				"$dadosevent" irá buscar um array contendo os dados do index.
                */
                
                if (mysqli_num_rows($resultadoprivate)>0 and $adm == '1'){
                     while($dadosevent =mysqli_fetch_array($resultadoprivate)){
                        $idevent=['id_evento'];
						$eventname = $dadosevent['eventnom'];
						$tema = $dadosevent['tema'];
						$descevent = $dadosevent['descevent']
          
            ?>
			
			<thead>
				<tr>
					<th> <?php echo "$eventname &nbsp-&nbsp $tema";?></th>
				</tr>
			</thead>
			<tbody>
				<div class="dep">
					<tr>

						<td> 
							<?php
								echo "<p class='center'> $descevent </p>";
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