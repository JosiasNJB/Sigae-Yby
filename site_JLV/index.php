
		<?php
			//chamando o header na pagina	
			include_once 'header.php';
		?>
		
		<!-- Carousel em progresso -->
		<div class="container">
			<div class="carousel carousel-slider" id="demo-carousel-indicators" data-indicators="true">

				<a class="carousel-item" href="https://www.sinasefeifes.org.br/sinasefe-ifes-endossa-mocao-de-repudio-do-foneabi-sobre-decisao-da-direcao-geral-do-campus-serra/"><img src="img/repudio.png"></a>
			
				<a class="carousel-item"  href="sis.php" > <img  src="img/situacaoEco.png" ></a>
			
				<a class="carousel-item" href="etnia.php"><img src="img/etnia.png"></a>
			
				<a class="carousel-item" href="desis.php"><img src="img/desistencia.png"></a>
			
				<a class="carousel-item" href="transp.php"><img src="img/transporte.png"></a>

			</div>	
		</div>

		<h3>Manifesto</h3>
			
			
		<br>
		
		
		<!-- Texto de manifesto | em desenvolvimento -->
		<p class="manifesto">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			At quis risus sed vulputate odio ut enim. Nunc lobortis mattis aliquam faucibus purus in massa tempor. 
			Faucibus a pellentesque sit amet porttitor eget dolor morbi non. 
			Amet venenatis urna cursus eget nunc scelerisque viverra. Et tortor at risus viverra adipiscing. 
			Mollis aliquam ut porttitor leo. Eu augue ut lectus arcu bibendum at varius vel. 
			At elementum eu facilisis sed odio morbi quis. 
			Sodales ut etiam sit amet nisl purus in. Dictumst quisque sagittis purus sit. 
			Pharetra massa massa ultricies mi quis hendrerit dolor magna. 
			Donec adipiscing tristique risus nec feugiat in fermentum posuere urna. 
			Tempor orci eu lobortis elementum nibh tellus molestie nunc. 
			Ornare arcu dui vivamus arcu felis bibendum ut. 
			Arcu odio ut sem nulla pharetra.
			<br>
			Malesuada proin libero nunc consequat interdum varius sit amet mattis. 
			Nisl condimentum id venenatis a condimentum. Eget nullam non nisi est. 
			In cursus turpis massa tincidunt dui ut. Ut morbi tincidunt augue interdum velit. 
			Neque egestas congue quisque egestas diam. Dolor magna eget est lorem ipsum dolor sit. 
			Eget velit aliquet sagittis id consectetur. 
			Viverra maecenas accumsan lacus vel facilisis volutpat. 
			Purus in massa tempor nec feugiat nisl pretium fusce. 
			Mattis aliquam faucibus purus in massa. 
			Imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. 
			Dolor morbi non arcu risus quis varius quam. 
			Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. 
			Enim sit amet venenatis urna cursus eget nunc. 
			Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus. 
			Nunc id cursus metus aliquam eleifend mi. 
			Adipiscing commodo elit at imperdiet dui accumsan sit. 
			Vulputate mi sit amet mauris commodo quis.
			<br><br><br><br>
		</p>


		<h3>Quem Somos</h3>

		<br>
		<div class="row">
			<figure>
				<div class="container">
					<a href="#"><img class="borba" src="img/borba.jpeg" alt="borba"></a>
				</div>
			</figure>
			
			<p>
				<br><br><br>   
				<b>Yby</b> significa "o chão que se pisa" na língua Tupi Guarani. Acreditamos que escolher um nome originário da nossa terra apresente um ato simbólico e potente. 
				Desde a chegada dos invasores em 1500, os nativos dessa terra sofrem com o extermínio físico e cultural.
				Depois de vários séculos, formou-se uma sociedade baseada no controle, que segue dominando os menos favorecidos.
				O modelo educacional insuficiente, a alimentação precária e as forças de segurança a fim de suprimir qualquer revolta, são essenciais para que a constituição não seja cumprida.
				Nosso objetivo primordial com esse projeto é devolver (nem que 1%) para a parcela da sociedade parte dos direitos a que foram negados.
			</p>
		</div>

		<br>
		
		<section>
			<h3>O Projeto</h3>
			<p>Tivemos a ideia de criar um sistema que receba diversos dados relevantes e que ao fim entregue 
				aos neabis relatórios e conclusões de cunho social.
			</p>

			<h3>O NEABI</h3>
			<p>
				O acrônimo NEABI vem de "Núcleo de estudos afro-brasileiros e indígenas", 
				tem como propósito fundamental a discussão de temas de raça, possibilitando a reflexão de diversos grupos dentro dos 
				Institutos Federais.
			</p>

		</section>

		<h3>Nós</h3>

		<p class="centerp">

			<b>Alunos | Idealizadores</b><br>

			Larissa Kemile Pereira da Silva <br>
			Josias Neves Jardim Borba <br>
			Vitória Isabel Lemos de Mattos <br>
			<br>
			
			<b>Professores e Colaboradores Ativos:</b><br>
			
			Ana Paula Klauck - Literatura e Língua Portuguesa<br>
			Carlos Lins Borges Azevedo - Desenvolvimento de Sistemas<br>
			Diego Ramiro Araoz Alves - Sociologia<br>
			Moisés Savedra Omena - Projeto Integrador<br>
			
			<br>
			
			<b>Agradecimentos especiais:</b><br>
			
			Alessandra Aguiar Vilarinho - Programação II e Feedbacks<br>
			Daniel Ribeiro Trindade - Dispositivos Móveis<br>
			Martha Talita - Programação Web II<br>
			Paulo Cézar Camargo Guedes - Matemática<br>
			Lívia de Azevedo Silveira Rangel - História II<br>
		
			<br>
		</p>

		<figure>
			<div class="container">
				<a href="#"><img class="anonGrey" src="img/anonGrey.png" alt="anon"></a>
			</div>
		</figure>


		

		<!-- js materialize para funcionamento do carousel -->
		<script>
			$(document).ready(function(){
			
			$('#demo-carousel-indicators').carousel();
			
			});
		</script>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>			
