<?php

//area_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_area (area_name) 
		VALUES (:area_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_name'	=>	$_POST["area_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_area Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM sa_area WHERE area_id = :area_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'	=>	$_POST["area_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['area_name'] = $row['area_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_area set area_name = :area_name  
		WHERE area_id = :area_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_name'	=>	$_POST["area_name"],
				':area_id'		=>	$_POST["area_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_area Name Edited';
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
		UPDATE sa_area 
		SET area_status = :area_status 
		WHERE area_id = :area_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_status'	=>	$status,
				':area_id'		=>	$_POST["area_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_area status change to ' . $status;
		}
	}
}

?>