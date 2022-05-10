<?php

//brand_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_bairro (country_id, province_id, district_id, bairro_name, Latitude_N, Longitude_E) 
		VALUES (:country_id, :province_id, :district_id, :bairro_name, :Latitude_N, :Longitude_E)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_id'		=>	$_POST["country_id"],
				':province_id'		=>	$_POST["province_id"],
				':district_id'		=>	$_POST["district_id"],
				':bairro_name'		=>	$_POST["bairro_name"],
				':Latitude_N'		=>	$_POST["Latitude_N"],
				':Longitude_E'	=>	$_POST["Longitude_E"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo ' Bairro Name Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_bairro WHERE 	bairro_id = :bairro_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':bairro_id'	=>	$_POST["bairro_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['country_id'] = $row['country_id'];
			$output['province_id'] = $row['province_id'];
			$output['district_id'] = $row['district_id'];
			$output['bairro_name'] = $row['bairro_name'];
			$output['Latitude_N'] = $row['Latitude_N'];
			$output['Longitude_E'] = $row['Longitude_E'];			
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_bairro set 
		country_id = :country_id,
		province_id = :province_id,
		district_id = :district_id,
		bairro_name = :bairro_name,
		Latitude_N = :Latitude_N,		
		Longitude_E = :Longitude_E 
		WHERE bairro_id = :bairro_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':country_id'	=>	$_POST["country_id"],
				':province_id'	=>	$_POST["province_id"],
				':district_id'	=>	$_POST["district_id"],
				':bairro_name'	=>	$_POST["bairro_name"],
				':Latitude_N'	=>	$_POST["Latitude_N"],
				':Longitude_E'	=>	$_POST["Longitude_E"],				
				':bairro_id'		=>	$_POST["bairro_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Bairro Name Edited';
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
		UPDATE sa_bairro 
		SET bairro_status = :bairro_status 
		WHERE bairro_id = :bairro_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':bairro_status'	=>	$status,
				':bairro_id'		=>	$_POST["bairro_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Bairro status change to ' . $status;
		}
	}
}

?>