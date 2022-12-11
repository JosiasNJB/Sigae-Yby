
        <?php 
        //chamando o header na pagina	
        include_once 'header.php';

		//iniciando a sessao caso ainda nao haja uma inicializada
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		
		//sql query como uma string selecionando todos os dados dos depoimentos na tabela
		$sql="SELECT * FROM depoimento";

		/* Está retornando, de dentro da tabela representada pela variável "$connect",
		um array que contém todos os resultados que atendem aos requisitos da consulta
		dentro de "$sql".
		*/
		$resultado= mysqli_query($connect,$sql);
        ?>

        <br><br>



        <h3 class="light"> Depoimentos de alunos</h3>

        <br><br><br><br>


		<table class="relatorio" >
			
			<thead>
				<tr>
					<th class="titlerelat">Josias Neves Jardim Borba &nbsp-&nbsp 20201tiimi0110</th>
				</tr>
			</thead>
			<tbody>
				<div >
                    <tr class="bodyrelat">
                        <td>
                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

                        </td>
                    </tr>
				</div>
			</tbody>
		<br>
		</table>

		<p class="center"><br><a class="btn waves-effect waves-light red darken-4" href="logout.php">Delete</a></p>

        <table class="relatorio" >
			
			<thead>
				<tr>
					<th class="titlerelat">Anônimo</th>
				</tr>
			</thead>
			<tbody>
				<div >
					<tr class="bodyrelat">

						<td> 
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

						</td>
                        <br>S

					</tr>
				</div>
			</tbody>
		<br>
		</table>

		<p class="center"><br><a class="btn waves-effect waves-light red darken-4" href="logout.php">Delete</a></p>
   
        <br><br><br><br>

        <!-- chamando o footer na pagina -->	
        <?php include_once 'footer.php';?>                        
