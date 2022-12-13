
        <?php
            //chamando o header na pagina	
            include_once 'header.php';

            $sql="SELECT count(FK_ETNIA_id_etnia) FROM aluno a 
            inner join etnia as e on(FK_ETNIA_id_etnia = e.id_etnia)
            inner join cota as c on(FK_COTA_id_cota = c.id_cota)
            inner join renda as r on(FK_RENDA_id_renda = r.id_renda)
            inner join curso as cr on(FK_CURSO_id_curso = cr.id_curso)
            inner join statusm as s on(FK_STATUSM_id_status = s.id_status)
            group by FK_ETNIA_id_etnia";

            $resultado= mysqli_query($connect,$sql);
			if (mysqli_num_rows($resultado)>0){
                while($dados =mysqli_fetch_array($resultado)){
                    $graph[] = intval($dados[0]);

                }
            }
        ?>

        <script type="text/javascript">

            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Preto', <?php echo $graph[0]; ?>],
                ['Indigena',<?php echo $graph[1]; ?> ],
                ['Outro', <?php echo $graph[2]; ?>],
                ['Pardo', <?php echo $graph[3];?>],
                ['Preto', <?php echo $graph[4]; ?>]
                ]);

                var options = {
                    legend: {
                        textStyle:{color: '#FFF'}
                    },
                    titleTextStyle: {
                        color: '#FFF'

                    },
                    title: 'Perfil de desistência por etnia campus IFES - Serra',
                    'backgroundColor': '#242424'

                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>

        
        <div class='center'>
            <div class = "chart" id="piechart" style="width: 900px; height: 500px;"></div>
        </div>
        

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>

