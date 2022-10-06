
        <?php
            //chamando o header na pagina	
            include_once 'header.php';
        ?>


        <form action="" method="">
            <label for="listaetnias">Filtrar por:</label>
            <select name="listaetnias" id="listaetnias">
                <option value="negros">Negros</option>
                <option value="pardos">Pardos</option>
                <option value="indigenas">Indígenas</option>
                <option value="amarelos">Amarelos</option>
                <option value="brancos">Brancos</option>
            </select>
            <button class="btn waves-effect waves-light" type="submit" name="btn_C"> Enviar</button>
        </form>

        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>


        <script>
            var xValues = ["Amarelos", "Negros", "Brancos", "Indígenas", "Pardos"];
            var yValues = [7, 6, 10, 5, 10];
            var barColors = ["red", "green","blue", "yellow", "violet"];




            new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false}, 
                title: {
                display: true,
                text: "Perfil de desistência por etnia"
                }
            }
            });
        </script>

		<!-- chamando o footer na pagina -->	
		<?php include_once 'footer.php';?>

