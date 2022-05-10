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

$query = "select sa_area.area_name as Areas_Verificadas, sa_area.area_name as area_name, sa_area.area_id as area_id,

GROUP_CONCAT(distinct sa_area_padrao.area_padrao_id SEPARATOR ', ') as padroes_avaliados,

GROUP_CONCAT(distinct sa_criterion_verification.criterion_verification_id SEPARATOR ', ') as criterios_avaliados,

count(sa_evaluation_criterion_order.item_quantity) as Total_Creterios_Verificados,
sum(CASE WHEN sa_evaluation_criterion_order.item_quantity = 1 THEN sa_evaluation_criterion_order.item_quantity ELSE 0 END) AS Alcancadas,

(( count(sa_evaluation_criterion_order.item_quantity)) - (sum(CASE WHEN sa_evaluation_criterion_order.item_quantity = 1 THEN sa_evaluation_criterion_order.item_quantity ELSE 0 END))) AS Fracassadas

FROM sa_evaluation_criterion_order

INNER JOIN sa_criterion_verification ON sa_criterion_verification.criterion_verification_id= sa_evaluation_criterion_order.item_name
INNER JOIN sa_area ON  sa_area.area_id = sa_criterion_verification.area_id

INNER JOIN user_details on user_details.user_id = sa_evaluation_criterion_order.user_id

INNER JOIN sa_area_padrao ON sa_area_padrao.area_id = sa_area.area_id

where sa_evaluation_criterion_order.user_id = '".$_SESSION['user_id']."' 

GROUP BY sa_area.area_name";
$result1 = mysqli_query($connect1, $query);

?>

<?php 
//inner join para preencher a tabela de dados do utilizador
$sql = "SELECT * FROM user_details
INNER JOIN sa_province on sa_province.province_id = user_details.province_id

INNER JOIN sa_country on sa_country.country_id = user_details.country_id

INNER JOIN sa_district on sa_district.district_id = user_details.district_id

INNER JOIN sa_bairro on sa_bairro.bairro_id = user_details.bairro_id

INNER JOIN sa_instance on sa_instance.instance_id = user_details.instance_id

INNER JOIN sa_place_affection on sa_place_affection.place_affection_id = user_details.place_affection_id

INNER JOIN sa_categoria on sa_categoria.categoria_id = user_details.categoria_id

INNER JOIN sa_cargo on sa_cargo.cargo_id = user_details.cargo_id where user_details.user_name= '".$_SESSION['user_name']."'";
$result = mysqli_query($connect1, $sql);
?>


  <div class="container">
  <form class="form-horizontal" action="avaliacao.php" method="post" enctype="multipart/form-data">

  <?php
  if(isset($_REQUEST["av"])&&($_REQUEST["av"]>0)) { $aval="[".$_REQUEST["av"]."]";} else {$aval="";}
  
  ?>
  <legend align="center" class="alert alert-dark" role="alert"><strong>RESUMO DA AVALIA&Ccedil;&Atilde;O REALIZADA <?= $aval;?></strong></legend>
 
     

   <div class="table-responsive">
    <table class="table table-bordered">
     <tr  bgcolor="#F08080">
	  
	  
											<th> Area Avaliada</th>
											<th> Padrões de Qualidade Avaliados</th>
											<th> Criterios de  Verificação avaliados</th>
											<th> Total Criterios de  Verificação Avaliados</th>
											<th> Total Resultado Alcançado</th>
											<th> Lacunas</th>

	 
 
	 
     <?php
	 
	if (mysqli_num_rows($result1) > 0) 
	{
			
     while($row = mysqli_fetch_array($result1))
     {
		 	 
     ?>
	 

	 
     <tr>
	  
											<td bgcolor="#000000">
											<span style='color:white;'>
												<?php echo $row["Areas_Verificadas"]; ?>
												</span>
												
											</td>

											<td>

												<?php echo $row["padroes_avaliados"]; ?>
		
											</td>
											
											<td> 
												<?php echo $row["criterios_avaliados"]; ?>
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
