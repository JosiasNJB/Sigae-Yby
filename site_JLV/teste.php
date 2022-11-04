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

if(isset($_POST['btn_Send'])){

    //inicializando array de erros
    $errosaluno = array();

    //obtendo os valores dos formularios via post
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha = $_POST['senha'];

    //preenchendo o array de erros
    if(empty($nome)){
        $errosaluno[] = "<li>O campo nome precisa ser preenchido</li>";
    }

    if(empty($email)){
        $errosaluno[] = "<li>O campo email precisa ser preenchido</li>";
    }
    else{
        //usando filtros de validacao
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errosaluno[] = "<li>O campo email precisa ser preenchido corretamente</li>";
        }
    }

    if(empty($senha)){
        $errosaluno[] = "<li>O campo senha precisa ser preenchido</li>";
    }

    if(isset($_POST['etnia'])){
        $etnia = $_POST['etnia'];
    }
    else{
        $errosaluno[] = "<li>O campo etnia precisa ser preenchido</li>";
    }

    if(empty($erros)){
        
        //usando filtros
        $nome=filter_var($nome, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        //criptografando a senha
        $senha=md5($senha);

        //Sql query para inserir os valores obtidos na tabela 
        $sql="INSERT INTO user(nome, email, senha, etnia, adm) VALUES('$nome', '$email', '$senha', '$etnia', '0');";
        
        /*Msqli_query aplica a string "$sql"
        e se o insert for devidamente realizado header direciona o usuario para a pagina de login.
        */ 
        if (mysqli_query($connect, $sql)){
            header('location: admpag.php');
        }
        else{
            header('location: admpag.php');
        }
    }
}

            //isset determina que o botao foi ativado.
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

//isset determina que o botao foi ativado.
if(isset($_POST['btn_evento'])){

    //inicializando array de erros
    $erroseventevent = array();

    //obtendo os valores dos formularios via post
    $event=$_POST['event'];
    $tipevent=$_POST['tipevent'];
    $descevent=$_POST['descevent'];

    //preenchendo o array de erros
    if(empty($event)){
        $errosevent[] = "<li>O campo nome precisa ser preenchido</li>";
    }

    if(empty($tipevent)){
        $errosevent[] = "<li>O campo tema precisa ser preenchido</li>";
    }

    if(empty($descevent)){
        $errosevent[] = "<li>O campo descrição precisa ser preenchido</li>";
    }

    if(isset($_POST['statusevent'])){
        $statusevent = $_POST['statusevent'];
    }
    else{
        $errosevent[] = "<li>Favor selecionar uma disponibilidade para o evento</li>";
    }

    if(empty($errosevent)){
        

        //Sql query para inserir os valores obtidos na tabela 		
        $eventsql = "INSERT INTO evento(id_evento, eventnom, tema, descevent, eventstatus) VALUES('$idevent', '$event', '$tipevent', '$descevent', '$statusevent');";
        
        /*Msqli_query aplica a string "$sql"
        e se o insert for devidamente realizado header direciona o usuario para a pagina de inicio.
        */ 
        if (mysqli_query($connect, $eventsql)){
            header('location: eventos.php');
        }
        else{
            header('location: admpag.php');
        }
    
    }
    
}

?>	

<br><br>

<h3 class="light"> Área do Administrador </h3>



<br><br><br>

<h4 class="light"> Cadastro de alunos </h4>

<section>
<!-- a tag <form> possibilita o uso de formularios -->
<form class="col s12" method="post">

    <!-- <div> é a tag usada para dividir e organizar o documento -->
    <div class="row">
        
        <div class="input-field col s5">
            <input id="nome" type="text" class="validate" name="nome">
            <label for="nome">Nome</label>
        </div>

        <div class="input-field col s5 pull-s1">
            <input id="email" type="text" class="validate" name="email">
            <label for="email">E-Mail</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s10 pull-s1">

              <input id="senha" type="password" class="validate" name="senha">
              <label for="senha">Senha</label>
        </div>
    </div>

    <br>
    <p class="centerp">Etnia&nbsp;</p>
    <br>
    <div class="input-field col s4">
        

        <br>

        <p class="centerp">
            <label>
              <input class="with-gap" name="etnia" type="radio" value="Preto"/>
              <span>Preto</span>
            </label>
        </p>

        <p class="centerp">
            <label>
              <input class="with-gap pull-s1" name="etnia" type="radio" value="Pardo" />
              <span>Pardo</span>
            </label>
        </p>

        <p class="centerp">
            <label>
              <input class="with-gap" name="etnia" type="radio" value="Branco" />
              <span>Branco</span>
            </label>
        </p>

        <p class="centerp">
            <label>
              <input class="with-gap" name="etnia" type="radio" value="Indigena" />
              <span>Indígena</span>
            </label>
        </p>

        <p class="centerp">
            <label>
              <input class="with-gap" name="etnia" type="radio" value="Outro"/>
              <span>Outro</span>
            </label>
        </p>
    </div>

    <br>

    <div class="btnSubmit">
        <button class="btn waves-effect waves-light" type="submit" name="btn_Send"> Enviar</button>
    </div>

    <br>

    <div>
        <ul>
            <?php
                //imprimindo os erros
                if(!empty($errosaluno)){
                    foreach($errosaluno as $erroaluno){
                        echo $erroaluno;

                    }
                }
            ?>
        </ul>
    </div>

    <br>

</form>
</section>

<br><br><br>

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

<h4 class="light"> <br><br><br> Cadastro de Eventos </h4>

<form method="post">
    <div class="row">
        <div class="input-field col s4">
            <input id="event" type="text" class="validate" name="event">
            <label for="event">Nome do evento: </label>
        </div>

        <div class="input-field col s4 pull-s2">
            <input id="tipevent" type="text" class="validate" name="tipevent">
            <label for="tipevent">Tipo de evento: </label>
        </div>

    </div>

    <div class="row">
        <div class="input-field col s8 pull-s2">
            <textarea id="descevent" class="materialize-textarea" name="descevent"></textarea>
            <label for="descevent">Descrição: </label>
        </div>

    </div>
    
    <div class="input-field col s4">
        
        <br>

        <p class="centerp">
            <label>
              <input class="with-gap" name="statusevent" type="radio" value="0"/>
              <span>Publico</span>
            </label>
        </p>

        <p class="centerp">
            <label>
              <input class="with-gap pull-s1" name="statusevent" type="radio" value="1" />
              <span>Privado</span>
            </label>
        </p>
    </div>


    <br>
    <br>

    <div class="btnSubmit">
        <button class="btn waves-effect waves-light" type="submit" name="btn_evento"> Cadastrar</button>
        
    </div>

    <br>

    <div>
        <ul>
            <?php
                //imprimindo os erros
                if(!empty($errosevent)){
                    foreach($errosevent as $erroevent){
                        echo $erroevent;

                    }
                }
            ?>
        </ul>
    </div>

    <br>
    <br>
    <br><br>

</form>

<h4 class="light"> Alteração de dados </h4>

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
                <td><a class="btn waves-effect waves-light green accent-4" href="update.php?id=<?php echo $dados['id_pessoa'];?>"> Adicionar Etnia</td>
            </tr>

        </tbody>            
    </table>                    
</div>                     
</div>
<br><br><br><br>

<!-- chamando o footer na pagina -->	
<?php include_once 'footer.php';?>                        