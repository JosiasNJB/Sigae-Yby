
        <?php 
        //chamando o header na pagina	
        include_once 'header.php';

        /* Repurpose this page to maybe show some profiles of the people?? maybe anonymously????? like showing their ethnicity and what happened to them but maybe not their names?
        id like to just show all the users but maybe for privacy reasons thatd be bad? or perhaps ony show the admin users like teachers and etc
        still not sure but i think theres a need to show more stuff in the page.
        */
        ?>

        <br><br>



        <h3 class="light"> Usuários </h3>

        <br><br>

        <div class="row">
            <div>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Nome: </th>
                            <th>Email: </th>
                            <th>Etnia: </th>                                                   
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php

                        //iniciando a sessao caso ainda nao haja uma inicializada
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        //chamando o arquivo de conexao
                        require 'conexao.php';
                        
                        //sql query como uma string selecionando todos os dados dos usuarios na tabela
                        $sql="SELECT * FROM user";

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
                            <td><?php echo $dados['nome'];?></td>
                            <td><?php echo $dados['email'];?></td>
                            <td><?php echo $dados['etnia'];?></td>
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
        <br><br><br><br>

        <!-- chamando o footer na pagina -->	
        <?php include_once 'footer.php';?>                        