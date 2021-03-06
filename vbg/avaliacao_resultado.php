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

$query = "select sa_area.area_name as Areas_Verificadas, sa_area.area_name as area_name, sa_area.area_id as area_id,

GROUP_CONCAT(distinct sa_area_padrao.area_padrao_description SEPARATOR ', ') as padroes_avaliados,

GROUP_CONCAT(distinct sa_criterion_verification.criterion_verification_description SEPARATOR ', ') as criterios_avaliados,

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

  <fieldset>
  
  <legend align="center" class="alert alert-dark" role="alert"><strong>AVALIA????ES REALIZADAS </strong></legend>

	<!--  <input name="evaluation_order_type" type="text" value="<?php $_POST["evaluation_order_type"]; ?>" placeholder="<?php echo $_POST["evaluation_order_type"]; ?>"> --> 

  

  
 		<table class="table table-resposive" style="width:100%" >

			<?php 
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
					?>	
					<tr >
					<th bgcolor="#FFFFFF"  scope="col">Distrito</th>
						<td>
						<input class="form-control form-control-lg" name="district_id" type="text" value="<?php $row["district_id"]; ?>" placeholder="<?php echo $row["district_name"]; ?>">
						</td>
					</tr>
					
					<tr >
					<th bgcolor="#FFFFFF" scope="col">Nome da U.S.</th>
						<td>
						<input class="form-control form-control-lg" name="place_affection_id" type="text" value="<?php $row["place_affection_id"]; ?>" placeholder="<?php echo $row["place_affection_name"]; ?>">
						
						<!--<input name="place_affection_id" type="text" value="<?php echo $row["place_affection_name"]; ?>" > -->
						</td>
					</tr>
					
					<tr >
					<th bgcolor="#FFFFFF">Data</th>
						<td>
						<input class="form-control form-control-lg" name="evaluation_order_date" type="text" value="<?php echo " ".date("Y-m-d").""; ?>" >
						<!--<input name="evaluation_order_date" type="text" value="<?php $row["place_affection_id"]; ?>" placeholder="<?php echo "Dia ". date("Y-m-d") . " "; ?>"> -->
						</td>
					</tr>
					

					<tr >
					<th bgcolor="#FFFFFF">Nome do Avaliador</th>
						
						<td>
						<input class="form-control form-control-lg"  name="district_id" type="text" value="<?php $row["user_id"]; ?>" placeholder="<?php echo $row["user_name"]; ?>">
						<?php //echo $_SESSION["user_name"]; ?>
						</td>
					</tr>
					
					<tr >
					<th bgcolor="#FFFFFF">Equipa de Medi????o </th> 
						<td>
						<input class="form-control form-control-lg" name="evaluation_order_equipa_medica" type="text" value="<?php $row["user_id"]; ?>" placeholder="<?php echo $_POST['evaluation_order_equipa_medica']; ?>">
						</td>
					</tr>					
					
					<?php 
					}
				}
			?>
		</table> 

  
	</fieldset>	
     

   <div class="table-responsive" >
    <table class="table table-bordered">
     <tr bgcolor="#FF0000">
	  
	  
											<th > Area Avaliada</th>
											<th > Padr??es de Qualidade Avaliados</th>
											<th > Criterios de  Verifica????o avaliados</th>
											<th > Total Criterios de  Verifica????o Avaliados</th>
											<th > Total Resultado Alcan??ado</th>
											<th > Lacunas</th>

	 
 
	 
     <?php
	 
	if (mysqli_num_rows($result1) > 0) 
	{
			
     while($row = mysqli_fetch_array($result1))
     {
		 	 
     ?>
	 

     <tr bgcolor="#FFFFFF" >
	  
											<td bgcolor="#000000">
											
											<span style='color:white;'>
												<?php echo  $row["Areas_Verificadas"]; ?>
												</span>
											</td>

											<td bgcolor="#FFFFFF" >
												<?php echo $row["padroes_avaliados"]; ?>
											</td>
											
											<td bgcolor="#FFFFFF" > 
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

 <input type="submit" align="center" name="visualizar" class="btn btn-danger" value="Registar Avalia????o"></p>
   
</legend>      
   </form>
  </div>