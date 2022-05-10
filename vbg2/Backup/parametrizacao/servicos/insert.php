<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "vbg_sam");
if(isset($_POST["nome_servico"]))
{
 $nome_servico = $_POST["nome_servico"];
 $query = '';
 for($count = 0; $count<count($nome_servico); $count++)
 {
  $bairro_nome_clean = mysqli_real_escape_string($connect, $nome_servico[$count]);
  if($bairro_nome_clean != '')
  {
   $query .= '
   INSERT INTO sa_servico(nome_servico) 
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

