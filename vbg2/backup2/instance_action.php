<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_instance (instance_name) 
		VALUES (:instance_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':instance_name'	=>	$_POST["instance_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'instance Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM sa_instance WHERE instance_id = :instance_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':instance_id'	=>	$_POST["instance_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['instance_name'] = $row['instance_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_instance set instance_name = :instance_name  
		WHERE instance_id = :instance_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':instance_name'	=>	$_POST["instance_name"],
				':instance_id'		=>	$_POST["instance_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'instance Name Edited';
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
		UPDATE sa_instance 
		SET instance_status = :instance_status 
		WHERE instance_id = :instance_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':instance_status'	=>	$status,
				':instance_id'		=>	$_POST["instance_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'instance status change to ' . $status;
		}
	}
}

?>