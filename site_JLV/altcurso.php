<?php

//chamando o arquivo de conexao

//chamando o header na pagina	
include_once 'header.php';


?>	

<br><br>

<h3 class="light"> Alteração de Eventos <br><br></h3>


<div class="row">
<div>
    <table class="striped">
        <thead>
            <tr>
                <th>Nome: </th>
                <th>Tema: </th>
                <th>Tipo de evento: </th>                                                   
            </tr>
        </thead>
        
        <tbody>
        <?php
            
            //sql query como uma string selecionando todos os dados dos usuarios na tabela
            $sql="SELECT * FROM evento order by eventstatus";
            

            /* Está retornando, de dentro da tabela representada pela variável "$connect",
            um array que contém todos os resultados que atendem aos requisitos da consulta
            dentro de "$sql".
            */
            $resultado= mysqli_query($connect,$sql);
            
            /* Enquanto o array que contém os resultados da consulta tiver pelo menos 1 index,
            "$dados" irá buscar um array contendo os dados do index.
            */
            if (mysqli_num_rows($resultado)>0){
                while($dados =mysqli_fetch_array($resultado)){
                    if($dados['eventstatus'] == 0){
                        $status = "Publico";
                    }
                    else{
                        $status = "Privado";
                    }

            ?>
            <tr>
                <!-- exibindo os dados obtidos do usuario -->
                <td><?php echo $dados['eventnom'];?></td>
                <td><?php echo $dados['tema'];?></td>
                <td class='center'><?php echo $status;?></td>
                <td><a class="btn waves-effect waves-light red darken-4" href="eventdelete.php?id_evento=<?php echo $dados['id_evento'];?>"> Delete</td>

                <!-- <td><a class="btn waves-effect waves-light green accent-4" href="eventupdate.php?id_evento=<?php //echo $dados['id_evento'];?>"> Update</td>-->
            </tr>

            

            <?php
                    }
                }
                else{
            ?>

            <tr>
                <td class='center'>-</td>
                <td class='center'>-</td>
                <td class='center'>-</td>
            </tr>

            <?php
                }
            ?>      
        </tbody>            
    </table>                    
</div>                     
</div>


<!-- chamando o footer na pagina -->	
<?php include_once 'footer.php';?>                        