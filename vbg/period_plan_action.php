<?php

//area_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_period_plan (period_name) 
		VALUES (:period_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':period_name'	=>	$_POST["period_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_period_plan Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM sa_period_plan WHERE period_id = :period_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':period_id'	=>	$_POST["period_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['period_name'] = $row['period_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_period_plan set period_name = :period_name  
		WHERE period_id = :period_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':period_name'	=>	$_POST["period_name"],
				':period_id'		=>	$_POST["period_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_period_plan Name Edited';
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
		UPDATE sa_period_plan 
		SET period_status = :period_status 
		WHERE period_id = :period_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':period_status'	=>	$status,
				':period_id'		=>	$_POST["period_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_period_plan status change to ' . $status;
		}
	}
}

?>