<?php

//select.php

include('database_connection.php');

$query = "SELECT * FROM sa_avaliacao_padrao ORDER BY id DESC";

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