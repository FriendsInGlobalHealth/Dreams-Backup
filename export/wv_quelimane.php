<?php
$conn = new mysqli('localhost', 'sysadmin', 'Server19!!!');  
mysqli_select_db($conn, 'dreamsco_app');


$sql = "SELECT 
hs_hr_employee.emp_number AS 'Cod Beneficiario', 
CONCAT(hs_hr_employee.emp_firstname,' ',hs_hr_employee.emp_lastname) AS   'Nome do Beneficiario',
hs_hr_employee.criado_em as 'Data de Cadastro',
app_dream_servicos.name AS 'Servico', 
app_dream_servicos_sub.name AS 'Sub Servico', 
app_dream_beneficiario_servicos.data_beneficio AS 'Data Beneficio',
user.username AS 'Criado Por',
user.email AS 'Email'


FROM hs_hr_employee

LEFT JOIN app_dream_beneficiario_servicos ON hs_hr_employee.emp_number = app_dream_beneficiario_servicos.beneficiario_id 
LEFT JOIN app_dream_servicos ON app_dream_beneficiario_servicos.servico_id = app_dream_servicos.id 
LEFT JOIN app_dream_servicos_sub ON app_dream_beneficiario_servicos.sub_servico_id = app_dream_servicos_sub.id 
LEFT JOIN user ON app_dream_beneficiario_servicos.criado_por = user.id 

WHERE hs_hr_employee.criado_por IN (96,97,99,100,101,102,103,104,105,106,890,913,919) 
AND 
hs_hr_employee.emp_status=1
AND 
app_dream_beneficiario_servicos.status=1

GROUP BY app_dream_beneficiario_servicos.id

ORDER BY hs_hr_employee.emp_number";






$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Cod Beneficiario" . "\t" ."Nome do Beneficiario" ."\t" ."Data de Cadastro" ."\t" ."Servico" . "\t"."Sub Servico"."\t"."Data Beneficio"."\t"."Criado Por" ."\t"."Email Utilizador" . "\t";  
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
