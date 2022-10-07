
        <?php
            //chamando o header na pagina	
            include_once 'header.php';

            $sql = "SELECT count(etnia) from user group by etnia;";
            $resultado= mysqli_query($connect,$sql);
			if (mysqli_num_rows($resultado)>0){
                while($dados =mysqli_fetch_array($resultado)){
                    $graph[] = $dados[0];

                }
            }
        ?>

        <script type="text/javascript">

            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Branco', <?php echo $graph[0]; ?>],
                ['Indigena', <?php echo $graph[1]; ?>],
                ['Outro', <?php echo $graph[2]; ?>],
                ['Pardo',<?php echo $graph[3]; ?>],
                ['Preto',   <?php echo $graph[4]; ?>]
                ]);

                var options = {
                    legend: {
                        textStyle:{color: '#FFF'}
                    },
                    titleTextStyle: {
                        color: '#FFF'

                    },
                    title: 'Etnias campus IFES - Serra',
                    'backgroundColor': '#242424'

                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>

        <div class = "chart" id="piechart" style="width: 900px; height: 500px;"></div>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>

