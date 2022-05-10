<?php
//bairro.php
include('database_connection.php');

include('function.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

if($_SESSION['type'] != 'master')
{
	header('location:index.php');
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
		<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
		<title>Avaliacao</title>
		<script src="js/funciones.js"></script>
		<script src="librerias/bootstrap/js/bootstrap.js"></script>
		<script src="librerias/alertifyjs/alertify.js"></script>

	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">		
		
		<style> 

		</style>
	</head>
	<body>
	<form method="post" action="avaliacao_resultado.php">	
	<!-- Modal para registros nuevos -->

<div class="container theme-showcase" role="main">		
		
  <fieldset>


     <legend align="center" class="alert alert-dark" role="alert"><strong>REGISTO DE AVALIAÇÃO </strong></legend>  

	<!--  <input name="evaluation_order_type" type="text" value="<?php $_POST["evaluation_order_type"]; ?>" placeholder="<?php echo $_POST["evaluation_order_type"]; ?>"> -->
 

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
						<input name="district_id" type="hidden" value="<?php $row["district_id"]; ?>" placeholder="<?php echo $row["district_name"]; ?>">
						<?php echo $row["district_name"]; ?>
						</td>
					</tr>
					
					<tr>
					<th>LocalAfecto</th>
						<td>
						<input name="place_affection_id" type="hidden" value="<?php $row["place_affection_id"]; ?>" placeholder="<?php echo $row["place_affection_name"]; ?>">
						
						<?php echo $row["place_affection_name"]; ?>
						</td>
					</tr>
					
					<tr>
					<th>Data</th>
						<td>
						<input class="form-control form-control-lg" name="evaluation_order_date" type="text" value="<?php echo " ".date("d-m-y").""; ?>" >
						<!--<input name="evaluation_order_date" type="text" value="<?php $row["place_affection_id"]; ?>" placeholder="<?php echo "Dia ". date("Y-m-d") . " "; ?>"> -->
						</td>
					</tr>
					
					
					<tr>
					<th>Nr. da Avaliação </th>
						<td>

							 <input name="evaluation_order_id" type="hidden" value="<?php $last_id; ?>" placeholder="<?php echo $last_id; ?>"> 
							 <?php echo $last_id; ?>
						</td>
					</tr>
										
					
					<tr>
					<th>Nome do Avaliador</th>
						
						<td>
						<input name="district_id" type="hidden" value="<?php $row["user_id"]; ?>" placeholder="<?php echo $row["user_name"]; ?>">
						<?php echo $_SESSION["user_name"]; ?>
						</td>
					</tr>
					
					<tr>
					<th>Equipa de Medição </th> 
						<td>
						<input class="form-control form-control-lg" name="evaluation_order_equipa_medica" type="text" value="<?php $row["user_id"]; ?>" placeholder="<?php echo $_POST['evaluation_order_equipa_medica']; ?>">
						<?php// echo $_POST['evaluation_order_equipa_medica'];  ?>
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

									<table class="table table-resposive table-sm table-hover table-borderless table-bordered " >
									<tbody>

										
										<tr>
										<td width="550">									
											
											</ul >
												<li > 
												
													<?php echo $row1['criterion_verification_name']; ?>
												</li>
												
												
											</ul>	

										</td>
										<td width="150">
										</ul >
												<li > 
											E
										<input type="checkbox" name="item_name[]" value="<?php echo $row1['criterion_verification_id']; ?>" />	<br>


												</li>
												
												
											</ul>										
										</td>
										<td width="150">		
										<input type="checkbox" name="item_quantity[]" value="1" class="btn btn-success btn-xs"  >SIM </input>
										</br>
										<input type="checkbox" name="add" id="add_button" name="item_quantity[]" value="0" class="btn btn-danger btn-xs" data-toggle="modal"  data-target="#brandModal"  >Nao </input>
										</ul >
												
										<!--
										<select  name="item_quantity[]">
										  <option value="1">sim</option>
										  <option value="0">nao</option>
										</select>
-->
									<br>
									<button type="button" name="add" id="add_button" class="btn btn-success btn-xs"  data-toggle="modal"  data-target="#brandModal">Plano de Acção </button>
												-->
												
												
												
										</ul>
											
										</td>
										<td width="280">								
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
                		

    <div id="brandModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="sub_service_form">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Action Plan</h4>
    				</div>
    				<div class="modal-body">
					
    					<div class="form-group">
    						<select name="cause_plan_id" id="cause_plan_id" class="form-control" required>
								<option value="">Select Cause</option>
								<?php  echo fill_cause_plan_list($connect); ?>
							</select>
    					</div>
											

    					<div class="form-group">
    						<select name="cause_type_id" id="cause_type_id" class="form-control" required>
								<option value="">Select Cause Type</option>
								<?php  echo fill_cause_type_list($connect); ?>
							</select>
    					</div>  
						
    					<div class="form-group">
    						<select name="intervention_plan_id" id="intervention_plan_id" class="form-control" required>
								<option value="">Select Intervention</option>
								<?php  echo fill_intervention_plan_list($connect); ?>
							</select>
    					</div>						
						
						
    					<div class="form-group">
    						<select name="responsible_plan_id" id="responsible_plan_id" class="form-control" required>
								<option value="">Select Responsavel</option>
								<?php echo fill_responsavel_plan_list($connect); ?>
							</select>
    					</div>						
						
						
						
							<input type="text" name="order_evaluaction_id" value="<?php echo $last_id; ?>" id="order_evaluaction_id" class="form-control" required />
							

    					<div class="form-group">
							<label>date</label>
							<input type="date" name="action_plan_date" id="action_plan_date" class="form-control" required />
						</div>							
						
						

    					<div class="form-group"> 
    						<select name="action_plan_period" id="action_plan_period" class="form-control" required>
								<option value="">Selecione o Periodo</option>
								<?php echo fill_plan_period_list($connect); ?>
							</select>							
							
						</div>						
						

							<input type="hidden" name="user_id" id="user_id" value=<?php echo $_SESSION["user_id"];	?> class="form-control" required />
						
											
												
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="action_plan_id" id="action_plan_id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>

<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#brandModal').modal('show');
		$('#sub_service_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Criar Plano de Accao");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#sub_service_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"actionplan_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#sub_service_form')[0].reset();
				$('#brandModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				branddataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var action_plan_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:'actionplan_action.php',
			method:"POST",
			data:{action_plan_id:action_plan_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#brandModal').modal('show');
				$('#cause_plan_id').val(data.cause_plan_id);
				$('#cause_type_id').val(data.cause_type_id);
				
				$('#intervention_plan_id').val(data.intervention_plan_id);
				$('#user_id').val(data.user_id);

				$('#order_evaluaction_id').val(data.order_evaluaction_id);
				$('#responsible_plan_id').val(data.responsible_plan_id);

				$('#action_plan_date').val(data.action_plan_date);
				$('#action_plan_period').val(data.action_plan_period);				
				
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Local Afecto");
				$('#action_plan_id').val(action_plan_id);
				$('#action').val('Edit');
				$('#btn_action').val('Edit');
			}
		})
	});

	$(document).on('click','.delete', function(){
		var action_plan_id = $(this).attr("id");
		var status  = $(this).data('status');
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"actionplan_action.php",
				method:"POST",
				data:{action_plan_id:action_plan_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					branddataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
	});


	var branddataTable = $('#sub_service_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"actionplan_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[4, 5],
				"orderable":false,
			},
		],
		"pageLength": 10
	});

});
</script>
