<?php  
$conn = new mysqli('localhost', 'sysadmin', 'Server19!!!');  
mysqli_select_db($conn, 'dreamsco_app');  
$sql = "SELECT beneficiario_id, servico_id, sub_servico_id,data_beneficio, criado_por FROM `app_dream_beneficiario_servicos` WHERE criado_por IN (96,97,99,100,101,102,103,104,105,106,890,913,919) AND 
status=1 ORDER BY beneficiario_id";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Cod Beneficiario" . "\t" ."Servico"."\t"."Sub Servico"."\t"."Data Beneficio"."\t"."Criado Por"  . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=beneficiarios_servicos.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?>
