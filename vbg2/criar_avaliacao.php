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
//inner join para preencher
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

?>


<?php
//recebendo os dados do formulario da avaliacao

$user_id=$_SESSION['user_id']; //utilizador
$evaluation_order_district=$_POST['district_id']; //distrito
$place_affection_id=$_POST['place_affection_id']; //local afecto
$evaluation_order_type=$_POST['evaluation_order_type']; //tipo da avaliacao
$period_type=$_POST['period_id'];//tipo do period
$evaluation_equipe_clinic=$_POST['evaluation_order_equipa_medica']; //equipa de medicao
$evaluation_order_date=$_POST['evaluation_order_date']; //data da avaliacao
$evaluation_order_created_date=$_POST['evaluation_order_date']; //create date
$evaluation_order_status = 'active'; //status

/*
echo "<br> user: ".$user_id;
echo "<br> district: ".$evaluation_order_district;
echo "<br> local afecto: ".$place_affection_id;
echo "<br> tipo de avaliacao: ".$evaluation_order_type;
echo "<br> tipo de periodo: ".$period_type;
echo "<br> equipa medicao: ".$evaluation_equipe_clinic;
echo "<br> data: ".$evaluation_order_date;
echo "<br> data de criacao:".$evaluation_order_created_date;
echo "<br> status: ".$evaluation_order_status;
*/

$query="INSERT INTO sa_evaluation_order (user_id, evaluation_order_date, evaluation_order_type, period_type, evaluation_equipe_clinic,evaluation_order_created_date,evaluation_order_status) 
	values ('$user_id','$evaluation_order_date','$evaluation_order_type','$period_type','$evaluation_equipe_clinic','$evaluation_order_created_date','$evaluation_order_status')";
$insert=$mysqli->query($query);
$last_id=$mysqli->insert_id;

$_SESSION['evaluation_order_id'] = $last_id;

//echo "<br> ultimo id registado: ".$last_id;

//echo "<br> test session: ".$_SESSION['evaluation_order_id'];


?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
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


     <legend align="center" class="alert alert-dark" role="alert"><strong>REGISTO DE AVALIAÇÃO INTERNA </strong></legend>  
 
  <br>
   <div class="form-row ">
    <div class="form-group ">
      <label > </label>
      
	<!--  <input name="evaluation_order_type" type="text" value="<?php $_POST["evaluation_order_type"]; ?>" placeholder="<?php echo $_POST["evaluation_order_type"]; ?>"> -->
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
					<th>Equipa de Medição </th> 
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
			
			<?php
				$result_cursos = "SELECT * FROM sa_area_padrao order by area_padrao_id";
				$resultado_cursos = mysqli_query($conn, $result_cursos);
				
				$result_cursos1 = "SELECT * FROM sa_criterion_verification order by criterion_verification_id";
				$resultado_cursos1 = mysqli_query($conn, $result_cursos1);			
				
				
			?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ ?>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $rows_cursos['area_padrao_id']; ?>" aria-expanded="false" aria-controls="collapseOne">
									<?php echo $rows_cursos['area_padrao_name']; ?>
								</a>
							</h4>
						</div>
						<div id="collapse<?php echo $rows_cursos['area_padrao_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
							
										
									<?php
									$query1		= "SELECT *FROM sa_criterion_verification where area_padrao_id=".$rows_cursos["area_padrao_id"];
									$result1 	= mysqli_query($conn, $query1);
									if(mysqli_num_rows($result1) > 0){
										
										
										
									while($row1 = mysqli_fetch_assoc($result1)){
									?>

									<table >
									<tbody>
										<tr>
											<th> Critérios de Verificação </th>
											<th> Meios de Verificação</th>
											<th> Sim/Não</th>
											<th> Comentários</th>
										</tr>
										
										<tr>
										<td>									
											
											</ul>
												<li> 
												
													<?php echo $row1['criterion_verification_name']; ?>
												</li>
												
												
											</ul>	

										</td>
										<td>
											E<br>
										<input type="checkbox" name="item_name[]" value="<?php echo $row1['criterion_verification_id']; ?>" />	<br>
										
										</td>
										<td>		


<!--
o radio so permite selecionar um unico sitio e o checken da erro, melhor opcao eh o select

										<input type="radio" name="item_quantity[]" value="1"> Sim<br>
										<input type="radio" name="item_quantity[]" value="0"> Não<br>
-->
									<select name="item_quantity[]">
									  <option value="1">sim</option>
									  <option value="0">nao</option>
									</select>
										
										
										
										
										</td>
										<td>								
										<input type="text" name="item_unit[]"><br>
										<input type="textArea"  name="coment[]">
										</td>
										</tr>
									
									</tbody>
									</table>			

									<?php
									}}
									?>
									</li>								
								
							</div>
						</div>
					</div>
					
				<?php } ?>
			</div>
			

			</div>
		</div>

<legend align="center" class="alert alert-white" role="alert">			
		  <input type="submit" name="" class="btn btn-danger"  value="SALVAR"></p>
</legend>		
		</form>
			
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>