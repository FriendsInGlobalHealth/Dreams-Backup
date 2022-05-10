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


<!DOCTYPE html>
<html lang="pt-br">
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
			background-color: #FFFFFF;
			color: black;
			}
			
			input, placeholder{
			color: black;
			}
			
			th, td {
			border: 0px solid #ddd;
			padding: 15px; 
			text-align: left;
			}
			
			li{
				color: black;
			}
		
		</style>
	</head>

<body>
<div class="container">

<form class="form-horizontal" action="criar_avaliacao.php" method="post" enctype="multipart/form-data">
  <fieldset>
  
  
  <legend align="center" class="alert alert-dark" role="alert"><strong>REGISTO DE AVALIAÇÃO INTERNA</strong></legend>
 
  <br>
   <div class="form-row ">
    <div class="form-group ">
      <label >Tipo de Avaliação </label>
      
	  <select name="evaluation_order_type" >
		<option value="">Select Tipo de avaliação</option>
		<?php echo fill_evaluation_type_list($connect); ?>		
      </select>
    </div>	
  <br>
  </div>
  
  <label align="center">REGISTO DE AVALIAÇÃO DE DESEMPENHO</label>  
  
  <br>
  <br>
  
  
  
 		<table class="table table-resposive" style="width:100%">

			<?php 
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
					?>	
					<tr>
					<th>Distrito</th>
						<td>
						<input name="district_id" type="text" value="<?php $row["district_id"]; ?>" placeholder="<?php echo $row["district_name"]; ?>">
						<?php echo $row["district_name"]; ?>
						</td>
					</tr>
					
					<tr>
					<th>LocalAfecto</th>
						<td>
						<input name="place_affection_id" type="text" value="<?php $row["place_affection_id"]; ?>" placeholder="<?php echo $row["place_affection_name"]; ?>">
						
						<!--<input name="place_affection_id" type="text" value="<?php echo $row["place_affection_name"]; ?>" > -->
						</td>
					</tr>
					
					<tr>
					<th>Data</th>
						<td>
						<input name="evaluation_order_date" type="text" value="<?php echo " ".date("Y-m-d").""; ?>" >
						<!--<input name="evaluation_order_date" type="text" value="<?php $row["place_affection_id"]; ?>" placeholder="<?php echo "Dia ". date("Y-m-d") . " "; ?>"> -->
						</td>
					</tr>
					
					<tr>
					<th>Periodo</th>
						<td>
						
							  <select name="period_id" >
								<option value="">Select Tipo de Periodo</option>
								<?php echo fill_sa_period_list($connect); ?>		
							  </select>
						</td>
					</tr>					
					
					<tr>
					<th>Nome do Avaliador</th>
						
						<td>
						<input name="user_id" type="text" value="<?php $row["user_id"]; ?>" placeholder="<?php echo $row["user_name"]; ?>">
						<?php //echo $_SESSION["user_name"]; ?>
						</td>
					</tr>
					
					<tr>
					<th>Equipa de Medição </th>
						<td>
						<input type="text" name="evaluation_order_equipa_medica" placeholder="Equipa de Medição">
						</td>
					</tr>					
					
					<?php 
					}
				}
			?>
		</table> 
  
  
	</fieldset>
	
			<legend align="center" class="alert alert-white" role="alert">		
				<button align="center" type="submit" name="submit" class="btn btn-dark">Gerar</button>
			</legend>	
	
	</div>
</form>

</div>

</body>

</html>