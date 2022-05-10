<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_evaluation_type (evaluation_type_name) 
		VALUES (:evaluation_type_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':evaluation_type_name'	=>	$_POST["evaluation_type_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_evaluation_type Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM sa_evaluation_type WHERE evaluation_type_id = :evaluation_type_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':evaluation_type_id'	=>	$_POST["evaluation_type_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['evaluation_type_name'] = $row['evaluation_type_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_evaluation_type set evaluation_type_name = :evaluation_type_name  
		WHERE evaluation_type_id = :evaluation_type_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':evaluation_type_name'	=>	$_POST["evaluation_type_name"],
				':evaluation_type_id'		=>	$_POST["evaluation_type_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_evaluation_type Name Edited';
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
		UPDATE sa_evaluation_type 
		SET evaluation_type_status = :evaluation_type_status 
		WHERE evaluation_type_id = :evaluation_type_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':evaluation_type_status'	=>	$status,
				':evaluation_type_id'		=>	$_POST["evaluation_type_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_evaluation_type status change to ' . $status;
		}
	}
}

?>