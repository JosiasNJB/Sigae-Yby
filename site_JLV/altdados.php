		<?php

			//chamando o header na pagina	
			include_once 'header.php';


		?>	

        <br><br>

        <h3 class="light"> Dados de alunos <br><br></h3>
        

        <div class="row">
            <div>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Matricula: </th>
                            <th>Nome: </th>
                            <th>Etnia: </th>
                            <th>Cota: </th>
                            <th>Renda: </th>
                            <th>Curso: </th>
                            <th>Status de Matricula: </th>                                                   
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        
                        //sql query como uma string selecionando todos os dados dos usuarios na tabela
                        $sql="SELECT * FROM aluno a 
                        inner join etnia as e on(FK_ETNIA_id_etnia = e.id_etnia)
                        inner join cota as c on(FK_COTA_id_cota = c.id_cota)
                        inner join renda as r on(FK_RENDA_id_renda = r.id_renda)
                        inner join curso as cr on(FK_CURSO_id_curso = cr.id_curso)
                        inner join statusm as s on(FK_STATUSM_id_status = s.id_status)";
                        //inner join renda r where FK_RENDA_id_renda = id_renda inner join curso cr where FK_CURSO_id_curso = id_curso inner join statusm s where FK_STATUSM_id_status = id_status; 
                        //var_dump($sql);

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
                            <td><?php echo $dados['matricula'];?></td>
                            <td><?php echo $dados['nome'];?></td>
                            <td><?php echo $dados['descetnia'];?></td>
                            <td><?php echo $dados['desccota'];?></td>
                            <td><?php echo $dados['descrend'];?></td>
                            <td><?php echo $dados['desccurso'];?></td>
                            <td><?php echo $dados['descstatus'];?></td>
                            <td><a class="btn waves-effect waves-light red darken-4" href="deletaluno.php?matricula=<?php echo $dados['matricula'];?>"> Delete</td>

                            <td><a class="btn waves-effect waves-light green accent-4" href="updatealuno.php?matricula=<?php echo $dados['matricula'];?>"> Update</td>
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
                            <td class='center'>-</td>
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