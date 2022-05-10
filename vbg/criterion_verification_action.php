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
		INSERT INTO sa_criterion_verification (area_id, area_padrao_id, criterion_verification_name, criterion_verification_description, criterion_verification_control, criterion_verification_enter_by, criterion_verification_status, criterion_verification_date) 
		VALUES (:area_id, :area_padrao_id, :criterion_verification_name, :criterion_verification_description, :criterion_verification_control, :criterion_verification_enter_by, :criterion_verification_status, :criterion_verification_date)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'			=>	$_POST['area_id'],
				':area_padrao_id'				=>	$_POST['area_padrao_id'],
				':criterion_verification_name'			=>	$_POST['criterion_verification_name'],
				':criterion_verification_description'	=>	$_POST['criterion_verification_description'],
				':criterion_verification_control'		=>	'1',
				':criterion_verification_enter_by'		=>	$_SESSION["user_id"],
				':criterion_verification_status'		=>	'active',
				':criterion_verification_date'			=>	date("Y-m-d")
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Verification Criterion Added';
		}
	}
	if($_POST['btn_action'] == 'verification_criterion_details')
	{
		$query = "
		SELECT * FROM sa_criterion_verification 
		INNER JOIN sa_area ON sa_area.area_id = sa_criterion_verification.area_id 
		INNER JOIN sa_area_padrao ON sa_area_padrao.area_padrao_id = sa_criterion_verification.area_padrao_id 
		INNER JOIN user_details ON user_details.user_id = sa_criterion_verification.criterion_verification_enter_by 
		WHERE sa_criterion_verification.criterion_verification_id = '".$_POST["criterion_verification_id"]."'
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
			if($row['criterion_verification_status'] == 'active')
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
				<td>'.$row["criterion_verification_name"].'</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>'.$row["criterion_verification_description"].'</td>
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
				<td>'.$row["user_name"].'</td>
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
		SELECT * FROM sa_criterion_verification WHERE criterion_verification_id = :criterion_verification_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':criterion_verification_id'	=>	$_POST["criterion_verification_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['area_id'] = $row['area_id'];
			$output['area_padrao_id'] = $row['area_padrao_id'];
			$output["brand_select_box"] = fill_brand_list($connect, $row["area_id"]);
			$output['criterion_verification_name'] = $row['criterion_verification_name'];
			$output['criterion_verification_description'] = $row['criterion_verification_description'];
			

		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_criterion_verification 
		set area_id = :area_id, 
		area_padrao_id = :area_padrao_id,
		criterion_verification_name = :criterion_verification_name,
		criterion_verification_description = :criterion_verification_description 

		WHERE criterion_verification_id = :criterion_verification_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'			=>	$_POST['area_id'],
				':area_padrao_id'				=>	$_POST['area_padrao_id'],
				':criterion_verification_name'			=>	$_POST['criterion_verification_name'],
				':criterion_verification_description'	=>	$_POST['criterion_verification_description'],
				':criterion_verification_id'			=>	$_POST['criterion_verification_id']
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
		UPDATE sa_criterion_verification 
		SET criterion_verification_status = :criterion_verification_status 
		WHERE criterion_verification_id = :criterion_verification_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':criterion_verification_status'	=>	$status,
				':criterion_verification_id'		=>	$_POST["criterion_verification_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'criterion status change to ' . $status;
		}
	}
}


?>