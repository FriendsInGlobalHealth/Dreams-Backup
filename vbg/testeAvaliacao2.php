<?php
//avaliacao

include('database_connection.php');

include('function.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

include('header.php');

?>

<?php

$query = "select sa_area.area_name as Areas_Verificadas,

count(sa_evaluation_criterion_order.item_quantity) as Total_Creterios_Verificados,
sum(CASE WHEN sa_evaluation_criterion_order.item_quantity = 1 THEN sa_evaluation_criterion_order.item_quantity ELSE 0 END) AS Alcancadas,

(( count(sa_evaluation_criterion_order.item_quantity)) - (sum(CASE WHEN sa_evaluation_criterion_order.item_quantity = 1 THEN sa_evaluation_criterion_order.item_quantity ELSE 0 END))) AS Fracassadas

FROM sa_evaluation_criterion_order

INNER JOIN sa_criterion_verification ON sa_criterion_verification.criterion_verification_id= sa_evaluation_criterion_order.item_name
INNER JOIN sa_area ON  sa_area.area_id = sa_criterion_verification.area_id

INNER JOIN user_details on user_details.user_id = sa_evaluation_criterion_order.user_id

where sa_evaluation_criterion_order.user_id = '".$_SESSION['user_id']."' 

GROUP BY sa_area.area_name";
$result = mysqli_query($connect1, $query);

?>

<!DOCTYPE html>
<html>
 <head>
 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
 
  <title>Avaliacao</title>

  <style>
  
  			table {
			<!--border-collapse: collapse;-->
			width: 100%;
			font-size: 12px;
			font-style:Arial;
			text-align: center;
			
			}
			th{
			background-color: #e74a3b;
			color: black;
			}
			
			input, placeholder{
			color: black;
			}
			
			th, td {
			border: 1px solid #ddd;
			padding: 15px; 
			text-align: left;
			}
			
			li{
				color: black;
			}
  
   
  a {
   padding:8px 16px;
   border:1px solid #ccc;
   color:#333;
   font-weight:bold;
  }
 
  
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container">
  <form class="form-horizontal" action="avaliacao.php" method="post" enctype="multipart/form-data">
     <legend align="center" class="alert alert-dark" role="alert"><strong>AVALIAÇÕES REALIZADAS </strong></legend>
   
   <div class="table-responsive">
    <table class="table table-bordered">
     <tr>
	  
	  
											<th> Area Avaliada</th>
											<th> Padrões de Qualidade Avaliados</th>
											<th> Criterios de  Verificação avaliados</th>
											<th> Total Criterios de  Verificação Avaliados</th>
											<th> Resultado Alcançado</th>
											<th> Lacunas</th>

	 
 
	 
     <?php
	 	if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_array($result))
     {
     ?>
	 
	 
     <tr>
	  
											<td>
												<?php echo $row["Areas_Verificadas"]; ?>
											</td>

											<td>
												<?php echo ""; ?>
											</td>
											
											<td>
												<?php echo ""; ?>
											</td>											

											<td>
												<?php echo $row["Total_Creterios_Verificados"]; ?>
											</td>
											
											<td>
												<?php echo $row["Alcancadas"]; ?>
											</td>
											
											<td>
												<?php echo $row["Fracassadas"]; ?>
											</td>
												  
	  
     </tr>
     <?php
     }
	 
	 }
     ?>
    </table>
    <div align="center">
    <br />

    </div>
    <br /><br />
   </div>
   
   
<legend align="center" class="alert alert-white" role="alert">	

 <input type="submit" align="center" name="visualizar" class="btn btn-danger" value="Registar Avaliação"></p>
   
</legend>      
   </form>
  </div>
 </body>
</html>
