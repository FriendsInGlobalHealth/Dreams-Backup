<?php

//select.php

include('database_connection.php');

/*criar Tipos de Selecao */

$query = "SELECT * FROM sa_avaliacao1 where estado=1 ORDER BY id";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);
}

?>