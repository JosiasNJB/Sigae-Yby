<?php


//chamando o header na pagina	
include_once 'header.php';

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
        $eventsql = "INSERT INTO evento(eventnom, tema, descevent, eventstatus) VALUES('$event', '$tipevent', '$descevent', '$statusevent');";
        
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

<h3 class="light"> <br><br> Cadastro de Eventos </h3>

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

<!-- chamando o footer na pagina -->	
<?php include_once 'footer.php';?>                        