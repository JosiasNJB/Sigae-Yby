<?php

//chamando o arquivo de conexao

//chamando o header na pagina	
include_once 'header.php';


?>	

<br><br>

<h3 class="light"> Alteração de Histórico <br><br></h3>


<div class="row">
<div>
    <table class="striped">
        <thead>
            <tr>
                <th>Matricula: </th>
                <th>Titulo: </th>                                                 
            </tr>
        </thead>
        
        <tbody>
        <?php
            
            //sql query como uma string selecionando todos os dados dos usuarios na tabela
            $sql="SELECT id_hist, FK_ALUNO_matricula as mat, titulo FROM itemhist
            inner join aluno a on(FK_ALUNO_matricula = a.matricula)";
            

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
                <td><?php echo $dados['mat'];?></td>
                <td><?php echo $dados['titulo'];?></td>
                <td><a class="btn waves-effect waves-light red darken-4" href="deletehist.php?id_hist=<?php echo $dados['id_hist'];?>"> Delete</td>

                <td><a class="btn waves-effect waves-light green accent-4" href="histupdate.php?id_hist=<?php echo $dados['id_hist'];?>"> Update</td>
            </tr>

            

            <?php
                    }
                }
                else{
            ?>

            <tr>
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