<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "vbg_sam");
$output = '';
$query = "SELECT * FROM sa_instancia ORDER BY nome_instancia DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Instancia</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Instancia</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["nome_instancia"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
