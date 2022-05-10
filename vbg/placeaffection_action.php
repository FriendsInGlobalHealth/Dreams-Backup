<?php

//brand_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_place_affection (country_id, province_id, district_id, place_affection_name, bairro_id, instance_id, service_id, sub_service_id) 
		VALUES (:country_id, :province_id, :district_id, :place_affection_name, :bairro_id, :instance_id, :service_id, :sub_service_id)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_id'		=>	$_POST["country_id"],
				':province_id'		=>	$_POST["province_id"],
				':district_id'		=>	$_POST["district_id"],
				':place_affection_name'		=>	$_POST["place_affection_name"],
				':bairro_id'		=>	$_POST["bairro_id"],
				':instance_id'	=>	$_POST["instance_id"],
				':service_id'		=>	$_POST["service_id"],
				':sub_service_id'	=>	$_POST["sub_service_id"]				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Local Afecto Name Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_place_affection WHERE 	place_affection_id = :place_affection_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':place_affection_id'	=>	$_POST["place_affection_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['country_id'] = $row['country_id'];
			$output['province_id'] = $row['province_id'];
			$output['district_id'] = $row['district_id'];
			$output['place_affection_name'] = $row['place_affection_name'];
			$output['bairro_id'] = $row['bairro_id'];
			$output['instance_id'] = $row['instance_id'];
			$output['service_id'] = $row['service_id'];
			$output['sub_service_id'] = $row['sub_service_id'];			
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_place_affection set 
		country_id = :country_id,
		province_id = :province_id,
		district_id = :district_id,
		place_affection_name = :place_affection_name,
		bairro_id = :bairro_id,		
		instance_id = :instance_id,
		service_id = :service_id,		
		sub_service_id = :sub_service_id 		
		WHERE place_affection_id = :place_affection_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_id'	=>	$_POST["country_id"],
				':province_id'	=>	$_POST["province_id"],
				':district_id'	=>	$_POST["district_id"],
				':place_affection_name'	=>	$_POST["place_affection_name"],
				':bairro_id'	=>	$_POST["bairro_id"],
				':instance_id'	=>	$_POST["instance_id"],
				':service_id'	=>	$_POST["service_id"],
				':sub_service_id'	=>	$_POST["sub_service_id"],					
				':place_affection_id'		=>	$_POST["place_affection_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Local Afecto Name Edited';
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
		UPDATE sa_place_affection 
		SET place_affection_status = :place_affection_status 
		WHERE place_affection_id = :place_affection_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':place_affection_status'	=>	$status,
				':place_affection_id'		=>	$_POST["place_affection_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Local Afecto status change to ' . $status;
		}
	}
}

?>