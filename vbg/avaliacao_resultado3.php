<?php
// criar avaliacao

include('database_connection.php');

include('function.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

include('header.php');

?>

<?php
$user_id=$_SESSION['user_id']; //utilizador
$evaluation_order_district=$_POST['district_id']; //distrito
$place_affection_id=$_POST['place_affection_id']; //local afecto
//$evaluation_order_type=$_POST['evaluation_order_type']; //tipo da avaliacao
//$period_type=$_POST['period_id'];//tipo do period
$evaluation_equipe_clinic=$_POST['evaluation_order_equipa_medica']; //equipa de medicao
$evaluation_order_date=$_POST['evaluation_order_date']; //data da avaliacao
$evaluation_order_created_date=$_POST['evaluation_order_date']; //create date
$evaluation_order_status = 'active'; //status

/*
echo "<br> user: ".$user_id;
echo "<br> district: ".$evaluation_order_district;
echo "<br> local afecto: ".$place_affection_id;
//echo "<br> tipo de avaliacao: ".$evaluation_order_type;
//echo "<br> tipo de periodo: ".$period_type;
echo "<br> equipa medicao: ".$evaluation_equipe_clinic;
echo "<br> data: ".$evaluation_order_date;
echo "<br> data de criacao:".$evaluation_order_created_date;
echo "<br> status: ".$evaluation_order_status;

echo "<br> test session: ".$_SESSION['evaluation_order_id'];

*/
?>

<?php
//registar resultado da avaliacao.php;

if(isset($_POST["item_name"]))
{	
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {

$evaluation_order_id = $_SESSION['evaluation_order_id'];

  $query = "INSERT INTO sa_evaluation_criterion_order 
  (order_id, item_name, item_quantity, item_unit, evaluation_order_id, coment, user_id) 
  VALUES (:order_id, :item_name, :item_quantity, :item_unit, :evaluation_order_id, :coment, :user_id)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':item_name'  => $_POST["item_name"][$count], 
    ':item_quantity' => $_POST["item_quantity"][$count], 
	':evaluation_order_id' => $_SESSION['evaluation_order_id'],
	':user_id' => $_SESSION['user_id'], 	
	':coment' => $_POST['coment'][$count],
    ':item_unit'  => $_POST["item_unit"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  //echo 'ok';
 }
}


?>

<?php

//comandos da avaliacao realizaa encontram-se abaixo?>

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


<?php
// para visualizar dados inseridos
$sql1 = "select area_id, area_name
from sa_area order by area_id";
$result1 = mysqli_query($connect1, $sql1);

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
			border: 2px solid #ddd;
			padding: 15px; 
			text-align: left;
			}
			
			li{
				color: black;
			}
		
		</style>
	</head>
	<body>
	<form method="post" action="avaliacao_resultado.php">	

<div class="container theme-showcase" role="main">		
		
  <fieldset>
  
  <legend align="center" class="alert alert-dark" role="alert"><strong>AVALIA????ES REALIZADAS </strong></legend>
 
  <br>
   <div class="form-row ">
    <div class="form-group ">
      <label > </label>
      
	<!--  <input name="evaluation_order_type" type="text" value="<?php $_POST["evaluation_order_type"]; ?>" placeholder="<?php echo $_POST["evaluation_order_type"]; ?>"> -->
    </div>	
  <br>
  </div>
  
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
					<th>Estado</th>
						<td>

							 <input name="evaluation_order_id" type="text" value="<?php $last_id; ?>" placeholder="<?php echo $last_id; ?>"> 
						</td>
					</tr>
										
					
					<tr>
					<th>Nome do Avaliador</th>
						
						<td>
						<input name="district_id" type="text" value="<?php $row["user_id"]; ?>" placeholder="<?php echo $row["user_name"]; ?>">
						<?php //echo $_SESSION["user_name"]; ?>
						</td>
					</tr>
					
					<tr>
					<th>Equipa de Medi????o </th> 
						<td>
						<input name="evaluation_order_equipa_medica" type="text" value="<?php $row["user_id"]; ?>" placeholder="<?php echo $_POST['evaluation_order_equipa_medica']; ?>">
						</td>
					</tr>					
					
					<?php 
					}
				}
			?>
		</table> 

  
	</fieldset>		
	  
		
		<div class='row'>
			

  <fieldset>
  
  
   		<table class="table table-resposive" style="width:100%">

									<tbody>
										<tr>
											<th> Area</th>
											<th> Area Padrao</th>
											<th> Criterio Verificados</th>
											<th> Lacunas</th>											
										</tr>
								<?php 
								$i=0;
									if (mysqli_num_rows($result1) > 0) {
										$i++;
										while ($row = mysqli_fetch_array($result1)) {
											//colocar criterio de verificacao
									$k=$row['area_id'];
									$sql3 = "SELECT area_id,area_padrao_id, area_padrao_name FROM sa_area_padrao WHERE  area_id =".$row['area_id'];
									$result2= mysqli_query($connect1, $sql3);
										?>		
										<tr>
										<tr>
											<td>
												<?php echo $row["area_name"]; ?>
											</td>

											<td>
												<?php 

												while ($rows = mysqli_fetch_array($result2)) {
												echo $rows['area_padrao_name'].',';
									?>

								<?php 
								$j=0;
									if (mysqli_num_rows($result2) > 0) {
										$j++;
										while ($row2 = mysqli_fetch_array($result2)) {
										//colocar criterion_order_verification	
											
										$k=$row2['area_padrao_id'];
										$sql4 = "SELECT area_padrao_id, criterion_verification_id FROM sa_criterion_verification WHERE  area_padrao_id =".$row2['area_padrao_id'];
										$result3= mysqli_query($connect1, $sql4);
										?>			
										
											
											
												<?php echo  $row2["area_padrao_name"]; ?>

												<?php
												
												while ($rows2 = mysqli_fetch_array($result3)) {
												 $rows2['criterion_verification_id'].',';
												 
												 ?>
												 			
</td>

<td>
								<?php 
								
								$m=0;
									if (mysqli_num_rows($result3) > 0) {
										$m++;
										while ($row3 = mysqli_fetch_array($result3)) {
										//colocar criterion_order_verification	
											
										$k=$row3['criterion_verification_id'];
										$sql5 = "SELECT item_name FROM sa_evaluation_criterion_order WHERE user_id='".$_SESSION['user_id']."' 
										and evaluation_order_id ='".$_SESSION['evaluation_order_id']."'
										and
										item_name =".$row3['criterion_verification_id'];
										$result4= mysqli_query($connect1, $sql5);
										?>			
										
											
											
												<?php $row3["criterion_verification_id"].','; ?>




												<?php
												
												while ($rows3 = mysqli_fetch_array($result4)) {
													?>
													
													<?php echo
												 $rows3['item_name'].',';
											 }
											 }
									?>

										</td>
										
										<td>
										</td>							
										</tr>
								<?php 
							}
												 
												 
											 }
											 
											 
											 
											 
											 }
									?>

											
											
											

											

																	
										
								<?php 
							}
						}
				
					}
				}

				 
			?>
			</tbody>
		</table> 										
   </fieldset>			
			
		
		</div>
		
<legend align="center" class="alert alert-white" role="alert">		
		
		  <input type="submit" name="" class="btn btn-danger"  value="Gerar Plano de Ac????o ">         
		  
		  
		  <input type="submit" name="" class="btn btn-danger"  value="Visualizar Resumo da Avalia????o"></p>

</legend>
		
		</form>
			
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>