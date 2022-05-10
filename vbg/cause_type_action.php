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
		INSERT INTO sa_cause_type (area_id, area_padrao_id, cause_type_name, cause_type_description, cause_type_status, cause_type_date) 
		VALUES (:area_id, :area_padrao_id, :cause_type_name, :cause_type_description, :cause_type_status, :cause_type_date)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'			=>	$_POST['area_id'],
				':area_padrao_id'				=>	$_POST['area_padrao_id'],
				':cause_type_name'			=>	$_POST['cause_type_name'],
				':cause_type_description'	=>	$_POST['cause_type_description'],
				':cause_type_status'		=>	'active',
				':cause_type_date'			=>	date("Y-m-d")
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Cause Type Added';
		}
	}
	if($_POST['btn_action'] == 'verification_criterion_details')
	{
		$query = "
		SELECT * FROM sa_cause_type 
		INNER JOIN sa_area ON sa_area.area_id = sa_cause_type.area_id 
		INNER JOIN sa_area_padrao ON sa_area_padrao.area_padrao_id = sa_cause_type.area_padrao_id 
		WHERE sa_cause_type.cause_type_id = '".$_POST["cause_type_id"]."'
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
			if($row['cause_type_status'] == 'active')
			{
				$status = '<span class="label label-success">Active</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Inactive</span>';
			}
			$output .= '
			<tr>
				<td> Cause Type Name</td>
				<td>'.$row["cause_type_name"].'</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>'.$row["cause_type_description"].'</td>
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
				<td>date</td>
				<td>'.$row["cause_type_date"].'</td>
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
		SELECT * FROM sa_cause_type WHERE cause_type_id = :cause_type_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':cause_type_id'	=>	$_POST["cause_type_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['area_id'] = $row['area_id'];
			$output['area_padrao_id'] = $row['area_padrao_id'];
			$output["brand_select_box"] = fill_brand_list($connect, $row["area_id"]);
			$output['cause_type_name'] = $row['cause_type_name'];
			$output['cause_type_description'] = $row['cause_type_description'];
			

		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_cause_type 
		set area_id = :area_id, 
		area_padrao_id = :area_padrao_id,
		cause_type_name = :cause_type_name,
		cause_type_description = :cause_type_description
		cause_type_date = :cause_type_date 

		WHERE cause_type_id = :cause_type_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'			=>	$_POST['area_id'],
				':area_padrao_id'				=>	$_POST['area_padrao_id'],
				':cause_type_name'			=>	$_POST['cause_type_name'],
				':cause_type_description'	=>	$_POST['cause_type_description'],
				':cause_type_date'		=>	$_POST['cause_type_date'],

				':cause_type_id'			=>	$_POST['cause_type_id']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Cause Type Details Edited';
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
		UPDATE sa_cause_type 
		SET cause_type_status = :cause_type_status 
		WHERE cause_type_id = :cause_type_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':cause_type_status'	=>	$status,
				':cause_type_id'		=>	$_POST["cause_type_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Cause Type status change to ' . $status;
		}
	}
}


?>