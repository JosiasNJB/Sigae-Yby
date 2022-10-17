		<?php

			//chamando o arquivo de conexao
			require 'conexao.php';
			
			//chamando o header na pagina	
			include_once 'header.php';
            
			/*$sql="SELECT * FROM pessoa WHERE id_pessoa = $id;";
			$resultado= mysqli_query($connect,$sql);
			$array = mysqli_fetch_array($resultado);
			$nome = $array[1];
			$email = $array[2];
			$etnia = $array[4];
            */



		?>	

        <br><br>

        <h3 class="light"> Alteração de dados <br><br></h3>
        

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
                        
                        //sql query como uma string selecionando todos os dados dos usuarios na tabela
                        $sql="SELECT id_pessoa, nome, email, descetnia FROM pessoa p inner join etnia e where FK_ETNIA_id_etnia = id_etnia";
                        

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
                            <td><?php echo $dados['descetnia'];?></td>
                            <td><a class="btn waves-effect waves-light red darken-4" href="delete.php?id=<?php echo $dados['id_pessoa'];?>"> Delete</td>

                            <td><a class="btn waves-effect waves-light green accent-4" href="update.php?id=<?php echo $dados['id_pessoa'];?>"> Update</td>
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
        <div class="row">
            <div>
                <table class="striped">
                    <thead>
                        <tr>
                            <th class="center"> Etnias </th>                                                   
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    
                        //sql query como uma string selecionando todos os dados dos usuarios na tabela
                       // $sql="SELECT * FROM etnia";
                        $sql="SELECT * FROM etnia";

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
                            <!-- <td class="center"><?php //echo $dados['descetnia'];?></td> -->
                            <td class="center"><?php echo $dados['descEtnia'];?></td>
                            <!-- <td><a class="btn waves-effect waves-light red darken-4" href="deletnia.php?id=<?php echo $dados['id_etnia'];?>"> Delete</td> -->
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
                        <tr>
                            <button class="btn waves-effect waves-light green accent-4" onclick="myFunction()"> Adicionar Etnia</button>
                        </tr>
      
                    </tbody>            
                </table>                    
            </div>                     
        </div>

        <td><a class="btn waves-effect waves-light green accent-4" onclick="myFunction()"> Adicionar Etnia</td>

        <form>
            <br><br>
            <div class="row" id='etnia_input'>
                        
            </div>

            <div class="btnSubmit" id='btn_etnia'>

            </div>


            <br><br><br><br>

             
        </form>
        
        <script>
            myFunction(){
                document.getElementbyId('etnia_input').InnerHTML = " <div class='input-field col s2 pull-s5 '><input id='etnia' type='text' class='validate' name='etnia'> <label for='etnia'>Etnia</label></div>";
                document.getElementbyId('btn_etnia').InnerHTML = "<button class='btn waves-effect waves-light' type='submit' name='btn_Etnia' ></button>";


            }
        </script>


        

        <!-- chamando o footer na pagina -->	
        <?php include_once 'footer.php';?>                        