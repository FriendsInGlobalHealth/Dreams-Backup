<?php

//brand_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_province (country_id, province_name) 
		VALUES (:country_id, :province_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_id'	=>	$_POST["country_id"],
				':province_name'	=>	$_POST["province_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo ' Province Name Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_province WHERE province_id = :province_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':province_id'	=>	$_POST["province_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['country_id'] = $row['country_id'];
			$output['province_name'] = $row['province_name'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_province set 
		country_id = :country_id, 
		province_name = :province_name 
		WHERE province_id = :province_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_id'	=>	$_POST["country_id"],
				':province_name'	=>	$_POST["province_name"],
				':province_id'		=>	$_POST["province_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_province Name Edited';
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
		UPDATE sa_province 
		SET province_status = :province_status 
		WHERE province_id = :province_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':province_status'	=>	$status,
				':province_id'		=>	$_POST["province_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Province status change to ' . $status;
		}
	}
}

?>