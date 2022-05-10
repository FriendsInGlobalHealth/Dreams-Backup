<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_country (country_name) 
		VALUES (:country_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_name'	=>	$_POST["country_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'country Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM sa_country WHERE country_id = :country_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_id'	=>	$_POST["country_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['country_name'] = $row['country_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_country set country_name = :country_name  
		WHERE country_id = :country_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_name'	=>	$_POST["country_name"],
				':country_id'		=>	$_POST["country_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'country Name Edited';
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
		UPDATE sa_country 
		SET country_status = :country_status 
		WHERE country_id = :country_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_status'	=>	$status,
				':country_id'		=>	$_POST["country_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'country status change to ' . $status;
		}
	}
}

?>