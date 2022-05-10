<?php
$connect = mysqli_connect("localhost", "root", "", "tarv2");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM busqueda_doentes WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>