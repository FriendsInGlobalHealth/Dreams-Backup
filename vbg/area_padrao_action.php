<?php

//brand_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_area_padrao (area_id, area_padrao_name) 
		VALUES (:area_id, :area_padrao_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'	=>	$_POST["area_id"],
				':area_padrao_name'	=>	$_POST["area_padrao_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_area_padrao Name Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_area_padrao WHERE area_padrao_id = :area_padrao_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_padrao_id'	=>	$_POST["area_padrao_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['area_id'] = $row['area_id'];
			$output['area_padrao_name'] = $row['area_padrao_name'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_area_padrao set 
		area_id = :area_id, 
		area_padrao_name = :area_padrao_name 
		WHERE area_padrao_id = :area_padrao_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_id'	=>	$_POST["area_id"],
				':area_padrao_name'	=>	$_POST["area_padrao_name"],
				':area_padrao_id'		=>	$_POST["area_padrao_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_area_padrao Name Edited';
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
		UPDATE sa_area_padrao 
		SET area_padrao_status = :area_padrao_status 
		WHERE area_padrao_id = :area_padrao_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':area_padrao_status'	=>	$status,
				':area_padrao_id'		=>	$_POST["area_padrao_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'sa_area_padrao status change to ' . $status;
		}
	}
}

?>