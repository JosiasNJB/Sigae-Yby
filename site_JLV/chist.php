<?php


//chamando o header na pagina	
include_once 'header.php';

$sql="SELECT * FROM aluno a 
inner join etnia as e on(FK_ETNIA_id_etnia = e.id_etnia)
inner join cota as c on(FK_COTA_id_cota = c.id_cota)
inner join renda as r on(FK_RENDA_id_renda = r.id_renda)
inner join curso as cr on(FK_CURSO_id_curso = cr.id_curso)
inner join statusm as s on(FK_STATUSM_id_status = s.id_status)";
$resultado= mysqli_query($connect,$sql);

if(isset($_POST['btn_hist'])){

    //inicializando array de erros
    $erroshist = array();

    //obtendo os valores dos formularios via post
    $titulo=$_POST['titulo'];
    $deschist=$_POST['deschist'];

    //preenchendo o array de erros
    if(isset($_POST['matricula'])){
        $matricula = $_POST['matricula'];
    }
    else{
        $erroshist[] = "<li class ='center'>O campo de matricula precisa ser preenchido</li>";
    }

    if(empty($titulo)){
        $erroshist[] = "<li>O campo titulo precisa ser preenchido</li>";
    }

    if(empty($deschist)){
        $erroshist[] = "<li>O campo descrição precisa ser preenchido</li>";
    }

    if(empty($erroshist)){

        //Sql query para inserir os valores obtidos na tabela 		
        $histsql = "INSERT INTO itemhist(fk_ALUNO_matricula, FK_USUARIO_siape, titulo, deschist) VALUES('$matricula', '$siape', '$titulo', '$deschist');";
        
        /*Msqli_query aplica a string "$sql"
        e se o insert for devidamente realizado header direciona o usuario para a pagina de inicio.
        */ 
        if (mysqli_query($connect, $histsql)){
            header('location: admpag.php');
        }
        else{
            header('location: chist.php');
        }
    
    }
    
}


?>	

<h4 class="light"><br><br> Histórico </h4>

<form method="post">
    <div class="row">
        <div class="input-field col s6">
			<select name="matricula">
				<option value="" disabled selected>Matricula</option>
                <?php
                    if (mysqli_num_rows($resultado)>0){
                        while($dados =mysqli_fetch_array($resultado)){
                            $mat = $dados['matricula'];
                            echo "<option <?php value='$mat'>$mat</option>";
                        }
                    }

                ?>
			</select>
		</div>

        <div class="input-field col s4  pull-s3">
            <textarea id="titulo" class="materialize-textarea" name="titulo"></textarea>
            <label for="titulo">Assunto:</label>
        </div>

    </div>

    <div class="row">
        <div class="input-field col s6 pull-s3">
            <textarea id="deschist" class="materialize-textarea" name="deschist"></textarea>
            <label for="deschist">Descrição:</label>
        </div>

    </div>

    <br>
    <br>

    <div class="btnSubmit">
        <button class="btn waves-effect waves-light" type="submit" name="btn_hist"> Enviar</button>
        
    </div>

    <br>

    <div>
        <ul>
            <?php
                //imprimindo os erros
                if(!empty($erroshist)){
                    foreach($erroshist as $errohist){
                        echo $errohist;

                    }
                }
            ?>
        </ul>
    </div>

    <br>

</form>

<script>
			$(document).ready(function(){
				$('select').formSelect();
			});
</script>

<?php include_once 'footer.php';?>                        