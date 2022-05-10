<?php

//brand_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_district (province_id, district_name) 
		VALUES (:province_id, :district_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':province_id'	=>	$_POST["province_id"],
				':district_name'	=>	$_POST["district_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_district Name Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_district WHERE district_id = :district_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':district_id'	=>	$_POST["district_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['province_id'] = $row['province_id'];
			$output['district_name'] = $row['district_name'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_district set 
		province_id = :province_id, 
		district_name = :district_name 
		WHERE district_id = :district_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':province_id'	=>	$_POST["province_id"],
				':district_name'	=>	$_POST["district_name"],
				':district_id'		=>	$_POST["district_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_district Name Edited';
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
		UPDATE sa_district 
		SET district_status = :district_status 
		WHERE district_id = :district_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':district_status'	=>	$status,
				':district_id'		=>	$_POST["district_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_district status change to ' . $status;
		}
	}
}

?>