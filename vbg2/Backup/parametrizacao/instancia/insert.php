<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "vbg_sam");
if(isset($_POST["nome_instancia"]))
{
 $nome_instancia = $_POST["nome_instancia"];
 $query = '';
 for($count = 0; $count<count($nome_instancia); $count++)
 {
  $bairro_nome_clean = mysqli_real_escape_string($connect, $nome_instancia[$count]);
  if($bairro_nome_clean != '')
  {
   $query .= '
   INSERT INTO sa_instancia(nome_instancia) 
   VALUES("'.$bairro_nome_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>

