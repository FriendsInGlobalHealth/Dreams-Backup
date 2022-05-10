<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_service (service_name) 
		VALUES (:service_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':service_name'	=>	$_POST["service_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Service Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM sa_service WHERE service_id = :service_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':service_id'	=>	$_POST["service_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['service_name'] = $row['service_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_service set service_name = :service_name  
		WHERE service_id = :service_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':service_name'	=>	$_POST["service_name"],
				':service_id'		=>	$_POST["service_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Service Name Edited';
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
		UPDATE sa_service 
		SET service_status = :service_status 
		WHERE service_id = :service_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':service_status'	=>	$status,
				':service_id'		=>	$_POST["service_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Service status change to ' . $status;
		}
	}
}

?>