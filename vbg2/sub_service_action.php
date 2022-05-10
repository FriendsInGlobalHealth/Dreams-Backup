<?php

//brand_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_sub_service (service_id, sub_service_name) 
		VALUES (:service_id, :sub_service_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':service_id'	=>	$_POST["service_id"],
				':sub_service_name'	=>	$_POST["sub_service_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo ' sub_service Name Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_sub_service WHERE sub_service_id = :sub_service_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':sub_service_id'	=>	$_POST["sub_service_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['service_id'] = $row['service_id'];
			$output['sub_service_name'] = $row['sub_service_name'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_sub_service set 
		service_id = :service_id, 
		sub_service_name = :sub_service_name 
		WHERE sub_service_id = :sub_service_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':service_id'	=>	$_POST["service_id"],
				':sub_service_name'	=>	$_POST["sub_service_name"],
				':sub_service_id'		=>	$_POST["sub_service_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_sub_service Name Edited';
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
		UPDATE sa_sub_service 
		SET sub_service_status = :sub_service_status 
		WHERE sub_service_id = :sub_service_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':sub_service_status'	=>	$status,
				':sub_service_id'		=>	$_POST["sub_service_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_sub_service status change to ' . $status;
		}
	}
}

?>