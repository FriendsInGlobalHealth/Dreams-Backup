<?php
$connect = mysqli_connect("localhost", "root", "", "tarv2");
if(isset($_POST["data"], $_POST["codigo"] , $_POST["residencia"],$_POST["bairro"], $_POST["referencia"], $_POST["resultado"],$_POST["observacoes"]))
{
 $data = mysqli_real_escape_string($connect, $_POST["data"]);
 $codigo = mysqli_real_escape_string($connect, $_POST["codigo"]);
 $residencia = mysqli_real_escape_string($connect, $_POST["residencia"]);
 $bairro = mysqli_real_escape_string($connect, $_POST["bairro"]);
 $referencia = mysqli_real_escape_string($connect, $_POST["referencia"]);
 $resultado = mysqli_real_escape_string($connect, $_POST["resultado"]);
 $observacoes = mysqli_real_escape_string($connect, $_POST["observacoes"]);
 $query = "INSERT INTO  busqueda_doentes(data, codigo, residencia, bairro, referencia, resultado, observacoes) VALUES('$data', '$codigo', '$residencia', '$bairro', '$referencia', '$resultado', '$observacoes')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
