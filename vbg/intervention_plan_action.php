<?php

//product_action.php

include('database_connection.php');

include('function.php');


if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'load_brand')
	{
		echo fill_brand_list($connect, $_POST['area_id']);
	}

	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_intervention_plan (area_id, area_padrao_id, intervention_plan_name, intervention_plan_description, intervention_plan_description, criterion_verification_enter_by, intervention_plan_status, intervention_plan_date) 
		VALUES (:area_id, :area_padrao_id, :intervention_plan_name, :intervention_plan_description, :intervention_plan_description, :criterion_verification_enter_by, :intervention_plan_status, :intervention_plan_date)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'			=>	$_POST['area_id'],
				':area_padrao_id'				=>	$_POST['area_padrao_id'],
				':intervention_plan_name'			=>	$_POST['intervention_plan_name'],
				':intervention_plan_description'	=>	$_POST['intervention_plan_description'],
				':intervention_plan_date'		=>	$_POST['intervention_plan_date'],
				':intervention_plan_status'		=>	'active',
				':intervention_plan_date'			=>	date("Y-m-d")
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Intervention plan Added';
		}
	}
	if($_POST['btn_action'] == 'verification_criterion_details')
	{
		$query = "
		SELECT * FROM sa_intervention_plan 
		INNER JOIN sa_area ON sa_area.area_id = sa_intervention_plan.area_id 
		INNER JOIN sa_area_padrao ON sa_area_padrao.area_padrao_id = sa_intervention_plan.area_padrao_id 
		WHERE sa_intervention_plan.intervention_plan_id = '".$_POST["intervention_plan_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';
		foreach($result as $row)
		{
			$status = '';
			if($row['intervention_plan_status'] == 'active')
			{
				$status = '<span class="label label-success">Active</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Inactive</span>';
			}
			$output .= '
			<tr>
				<td> Verification Criterion Name</td>
				<td>'.$row["intervention_plan_name"].'</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>'.$row["intervention_plan_description"].'</td>
			</tr>
			<tr>
				<td>area</td>
				<td>'.$row["area_name"].'</td>
			</tr>
			<tr>
				<td>area padrao</td>
				<td>'.$row["area_padrao_name"].'</td>
			</tr>
			<tr>
				<td>Enter By</td>
				<td>'.$row["intervention_plan_date"].'</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>'.$status.'</td>
			</tr>
			';
		}
		$output .= '
			</table>
		</div>
		';
		echo $output;
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_intervention_plan WHERE intervention_plan_id = :intervention_plan_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':intervention_plan_id'	=>	$_POST["intervention_plan_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['area_id'] = $row['area_id'];
			$output['area_padrao_id'] = $row['area_padrao_id'];
			$output["brand_select_box"] = fill_brand_list($connect, $row["area_id"]);
			$output['intervention_plan_name'] = $row['intervention_plan_name'];
			$output['intervention_plan_description'] = $row['intervention_plan_description'];
			

		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_intervention_plan 
		set area_id = :area_id, 
		area_padrao_id = :area_padrao_id,
		intervention_plan_name = :intervention_plan_name,
		intervention_plan_description = :intervention_plan_description, 
		intervention_plan_description = :intervention_plan_description 

		WHERE intervention_plan_id = :intervention_plan_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'			=>	$_POST['area_id'],
				':area_padrao_id'				=>	$_POST['area_padrao_id'],
				':intervention_plan_name'			=>	$_POST['intervention_plan_name'],
				':intervention_plan_description'	=>	$_POST['intervention_plan_description'],
				':intervention_plan_description'		=>	$_POST['intervention_plan_description'],

				':intervention_plan_id'			=>	$_POST['intervention_plan_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Verification Criterion Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'active';
		if($_POST['status'] == 'active')
		{
			$status = 'inactive';
		}
		$query = "
		UPDATE sa_intervention_plan 
		SET intervention_plan_status = :intervention_plan_status 
		WHERE intervention_plan_id = :intervention_plan_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':intervention_plan_status'	=>	$status,
				':intervention_plan_id'		=>	$_POST["intervention_plan_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Intervention status change to ' . $status;
		}
	}
}


?>