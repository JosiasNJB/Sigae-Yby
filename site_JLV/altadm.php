<?php

//chamando o arquivo de conexao

//chamando o header na pagina	
include_once 'header.php';


?>	

<br><br>

<h3 class="light"> Dados de administrador <br><br></h3>


<div class="row">
<div>
    <table class="striped">
        <thead>
            <tr>
                <th>Siape: </th>
                <th>Nome: </th>
                <th>Email: </th>
                <th>Telefone: </th>                                                   
            </tr>
        </thead>
        
        <tbody>
        <?php
            
            //sql query como uma string selecionando todos os dados dos usuarios na tabela
            $sql="SELECT siape, nome, email, telefone FROM usuario";
            

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

                ?>
            <tr>
                <!-- exibindo os dados obtidos do usuario -->
                <td><?php echo $dados['siape'];?></td>
                <td><?php echo $dados['nome'];?></td>
                <td><?php echo $dados['email'];?></td>
                <td><?php echo $dados['telefone'];?></td>
                <td><a class="btn waves-effect waves-light red darken-4" href="delete.php?siape=<?php echo $dados['siape'];?>"> Delete</td>

                <td><a class="btn waves-effect waves-light green accent-4" href="update.php?siape=<?php echo $dados['siape'];?>"> Update</td>
            </tr>

            

            <?php
                    }
                }
                else{
            ?>

            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
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