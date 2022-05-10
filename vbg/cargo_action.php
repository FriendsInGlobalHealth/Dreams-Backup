<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_cargo (cargo_name) 
		VALUES (:cargo_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':cargo_name'	=>	$_POST["cargo_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'cargo Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM sa_cargo WHERE cargo_id = :cargo_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':cargo_id'	=>	$_POST["cargo_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['cargo_name'] = $row['cargo_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_cargo set cargo_name = :cargo_name  
		WHERE cargo_id = :cargo_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':cargo_name'	=>	$_POST["cargo_name"],
				':cargo_id'		=>	$_POST["cargo_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'cargo Name Edited';
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
		UPDATE sa_cargo 
		SET cargo_status = :cargo_status 
		WHERE cargo_id = :cargo_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':cargo_status'	=>	$status,
				':cargo_id'		=>	$_POST["cargo_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'cargo status change to ' . $status;
		}
	}
}

?>