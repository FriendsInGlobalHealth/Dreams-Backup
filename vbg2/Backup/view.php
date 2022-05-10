<h1>Notifications</h1>

<?php
    
    include("functions.php");

    $id = $_GET['id'];

    $query ="UPDATE `sa_avaliacao1` SET `estado` = 1 WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `sa_avaliacao1` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['estado']==0){
                echo ucfirst($i['nome_avaliacao'])." Avaliacao Terminada. <br/>".$i['data_fim_avaliacao'];
            }else{
                echo "Avaliacao Activa.<br/>".$i['nome_avaliacao'];
            }
        }
    }
    
?><br/>
<a href="index.php">Back</a>