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

        $sqlidevent='SELECT * from evento;';
        $resultadoevent= mysqli_query($connect,$sqlidevent);
        if (mysqli_num_rows($resultadoevent)>0){
            $idevent = mysqli_num_rows($resultadoevent);

        }
        else{
            $idevent = '0';
        }

        if(isset($_POST['btn_relatorio'])){

            //inicializando array de erros
            $errosrelatorio = array();

            //obtendo os valores dos formularios via post
            $matricula=$_POST['matricula'];
            $nomealuno=$_POST['nomealuno'];
            $assuntorelat=$_POST['assuntorelat'];
            $descrelat=$_POST['descrelat'];

            //preenchendo o array de erros
            if(empty($matricula)){
                $errosrelatorio[] = "<li>O campo matricula precisa ser preenchido</li>";
            }

            if(empty($nomealuno)){
                $errosrelatorio[] = "<li>O campo nome precisa ser preenchido</li>";
            }

            if(empty($assuntorelat)){
                $errosrelatorio[] = "<li>O campo assunto precisa ser preenchido</li>";
            }

            if(empty($descrelat)){
                $errosrelatorio[] = "<li>O campo descrição precisa ser preenchido</li>";
            }

            if(empty($errosrelatorio)){

                //Sql query para inserir os valores obtidos na tabela 		
                $eventsql = "INSERT INTO relatorios(eventnom, tema, descevent, eventstatus) VALUES('$matricula', '$nomealuno', '$assuntorelat', '$descrelat');";
                
                /*Msqli_query aplica a string "$sql"
                e se o insert for devidamente realizado header direciona o usuario para a pagina de inicio.
                */ 
                if (mysqli_query($connect, $eventsql)){
                    header('location: aluno.php');
                }
                else{
                    header('location: admpag.php');
                }
            
            }
            
        }


        ?>	

        <h4 class="light"> Relatorio sobre aluno </h4>

        <form method="post">
            <div class="row">
                <div class="input-field col s4">
                    <input id="matricula" type="text" class="validate" name="matricula">
                    <label for="matricula">Matricula: </label>
                </div>

                <div class="input-field col s4 pull-s2">
                    <input id="nomealuno" type="text" class="validate" name="nomealuno">
                    <label for="nomealuno">Nome do aluno:</label>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s8 pull-s2">
                    <textarea id="assuntorelat" class="materialize-textarea" name="assuntorelat"></textarea>
                    <label for="assuntorelat">Assunto:</label>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s8 pull-s2">
                    <textarea id="descrelat" class="materialize-textarea" name="descrelat"></textarea>
                    <label for="descrelat">Descrição:</label>
                </div>

            </div>

            <br>
            <br>

            <div class="btnSubmit">
                <button class="btn waves-effect waves-light" type="submit" name="btn_relatorio"> Enviar</button>
                
            </div>

            <br>

            <div>
                <ul>
                    <?php
                        //imprimindo os erros
                        if(!empty($errosrelatorio)){
                            foreach($errosrelatorio as $errorelatorio){
                                echo $errorelatorio;

                            }
                        }
                    ?>
                </ul>
            </div>

            <br>

        </form>
        <?php include_once 'footer.php';?>                        