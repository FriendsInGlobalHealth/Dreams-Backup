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
$record_per_page =	10;
$page = '';
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{
 $page = 1;
}

$start_from = ($page-1)*$record_per_page;

$query = "SELECT * FROM sa_evaluation_order

INNER JOIN user_details on user_details.user_id = sa_evaluation_order.user_id

INNER JOIN sa_period on sa_period.period_id = sa_evaluation_order.period_type

INNER JOIN sa_evaluation_type on sa_evaluation_type.evaluation_type_id = sa_evaluation_order.evaluation_order_type

INNER JOIN sa_province on sa_province.province_id = user_details.province_id

INNER JOIN sa_country on sa_country.country_id = user_details.country_id

INNER JOIN sa_district on sa_district.district_id = user_details.district_id

INNER JOIN sa_bairro on sa_bairro.bairro_id = user_details.bairro_id

INNER JOIN sa_instance on sa_instance.instance_id = user_details.instance_id

INNER JOIN sa_place_affection on sa_place_affection.place_affection_id = user_details.place_affection_id

INNER JOIN sa_categoria on sa_categoria.categoria_id = user_details.categoria_id

INNER JOIN sa_cargo on sa_cargo.cargo_id = user_details.cargo_id

order by sa_evaluation_order.evaluation_order_id  DESC LIMIT $start_from, $record_per_page";
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
	  
	  
											<th> #</th>
											<th> Tipo de Avaliação</th>
											<th> Provincia</th>
											<th> Distrito</th>
											<th> Local</th>
											<th> Ano</th>
											<th> Periodo</th>
											<th> Data Submetida</th>
											<th> Submetida por</th>
											<th> Accao</th>
											<th> Desempenho</th>
											<th> Estado Submissao</th>		  
     </tr>
	 
     <tr>
											<th> </th>
											<th>
												<select>
												  <option value="#">Interna</option>
												  <option value="#">Externa</option>
												</select>
											</th>
											<th> 
												<select>
												  <option value="#">Maputo</option>
												  <option value="#">Gaza</option>
												</select>
											</th>
											<th> 
												<select>
												  <option value="#">Maputo</option>
												  <option value="#">Matola</option>
												</select>
											</th>
											<th>
												<select>
												  <option value="#">HCM</option>
												  <option value="#">Machava</option>
												</select>
											</th>
											<th> Ano</th>
											<th> Periodo
												<select>
												  <option value="#">T1</option>
												  <option value="#">T2</option>
												</select>
											</th>
											<th> Data Submetida</th>
											<th>
												<select>
												  <option value="#">PROVEDOR1</option>
												  <option value="#">PROVEDOR2</option>
												</select>
											</th>
											<th> Accao</th>
											<th> Desempenho</th>
											<th>
												<select>
												  <option value="#">Dentro do Prazo</option>
												  <option value="#">Fora do Prazo</option>
												</select>											
											</th>		  
	  
     </tr>	 
	 
     <?php
	 	if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_array($result))
     {
     ?>
     <tr>
	  
											<td>
												<?php echo $row["evaluation_order_id"]; ?>
											</td>

											<td>
												<?php echo $row["evaluation_type_name"]; ?>
											</td>
											
											<td>
												<?php echo $row["province_name"]; ?>
											</td>
											
											<td>
												<?php echo $row["district_name"]; ?>
											</td>
											
											<td>
												<?php echo $row["place_affection_name"]; ?>
											</td>
										
											<td>
												<?php echo $row["evaluation_order_date"]; ?>
											</td>
											
											<td>
												<?php echo $row["period_name"]; ?>
											</td>
											
											<td>
												<?php echo $row["evaluation_order_date"]; ?>
											</td>
											
											<td>
												<?php echo $_SESSION['user_name']; ?>
											</td>

											<td>
												<?php echo "Accao"; ?>
											</td>
											
											<td>
												<?php echo "Desempenho"; ?>
											</td>
											
											<td>
												<?php echo "Dentro do Prazo"; ?>
											</td>		  
	  
     </tr>
     <?php
     }
	 
	 }
     ?>
    </table>
    <div align="center">
    <br />
    <?php
    $page_query = "SELECT * FROM sa_evaluation_order

			INNER JOIN user_details on user_details.user_id = sa_evaluation_order.user_id

			INNER JOIN sa_period on sa_period.period_id = sa_evaluation_order.period_type

			INNER JOIN sa_evaluation_type on sa_evaluation_type.evaluation_type_id = sa_evaluation_order.evaluation_order_type

			INNER JOIN sa_province on sa_province.province_id = user_details.province_id

			INNER JOIN sa_country on sa_country.country_id = user_details.country_id

			INNER JOIN sa_district on sa_district.district_id = user_details.district_id

			INNER JOIN sa_bairro on sa_bairro.bairro_id = user_details.bairro_id

			INNER JOIN sa_instance on sa_instance.instance_id = user_details.instance_id

			INNER JOIN sa_place_affection on sa_place_affection.place_affection_id = user_details.place_affection_id

			INNER JOIN sa_categoria on sa_categoria.categoria_id = user_details.categoria_id

			INNER JOIN sa_cargo on sa_cargo.cargo_id = user_details.cargo_id

	ORDER BY sa_evaluation_order.evaluation_order_id DESC";
    $page_result = mysqli_query($connect1, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    if($difference <= 5)
    {
     $start_loop = $total_pages - 5;
    }
    $end_loop = $start_loop + 4;
    if($page > 1)
    {
     echo "<a href='avaliacao_visualizar.php?page=1'>First</a>";
     echo "<a href='avaliacao_visualizar.php?page=".($page - 1)."'><<</a>";
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo "<a href='avaliacao_visualizar.php?page=".$i."'>".$i."</a>";
    }
    if($page <= $end_loop)
    {
     echo "<a href='avaliacao_visualizar.php?page=".($page + 1)."'>>></a>";
     echo "<a href='avaliacao_visualizar.php?page=".$total_pages."'>Last</a>";
    }
    
    
    ?>
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
