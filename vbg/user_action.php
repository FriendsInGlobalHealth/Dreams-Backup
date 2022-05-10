<?php

//user_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO user_details (user_email, user_password, user_name, user_type , cargo_id, user_status) 
		VALUES (:user_email, :user_password, :user_name, :user_type , :cargo_id, :user_status)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_email'		=>	$_POST["user_email"],
				':user_password'	=>	password_hash($_POST["user_password"], PASSWORD_DEFAULT),
				':user_name'		=>	$_POST["user_name"],
				':cargo_id'		=>	$_POST["cargo_id"],
				':categoria_id'		=>	$_POST["categoria_id"],
				':country_id'		=>	$_POST["country_id"],
				':province_id'		=>	$_POST["province_id"],
				':district_id'		=>	$_POST["district_id"],
				':bairro_id'		=>	$_POST["bairro_id"],
				':instance_id'		=>	$_POST["instance_id"],
				':place_affection_id'		=>	$_POST["place_affection_id"],
				':user_type'		=>	'user',
				':user_status'		=>	'active'
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New User Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM user_details WHERE user_id = :user_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_id'	=>	$_POST["user_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['user_email'] = $row['user_email'];
			$output['user_name'] = $row['user_name'];
			$output['cargo_id'] = $row['cargo_id'];
			$output['categoria_id'] = $row['categoria_id'];
			$output['country_id'] = $row['country_id'];
			$output['province_id'] = $row['province_id'];
			$output['district_id'] = $row['district_id'];
			$output['bairro_id'] = $row['bairro_id']; 
			$output['instance_id'] = $row['instance_id'];
			$output['place_affection_id'] = $row['place_affection_id'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['user_password'] != '')
		{
			$query = "
			UPDATE user_details SET 
				user_name = '".$_POST["user_name"]."', 
				user_email = '".$_POST["user_email"]."',
				cargo_id = '".$_POST["cargo_id"]."',
				categoria_id = '".$_POST["categoria_id"]."',
				country_id = '".$_POST["country_id"]."',
				province_id = '".$_POST["province_id"]."',
				district_id = '".$_POST["district_id"]."',
				bairro_id = '".$_POST["bairro_id"]."',
				instance_id = '".$_POST["instance_id"]."',
				place_affection_id = '".$_POST["place_affection_id"]."',
				user_password = '".password_hash($_POST["user_password"], PASSWORD_DEFAULT)."' 
				WHERE user_id = '".$_POST["user_id"]."'
			";
		}
		else
		{
			$query = "
			UPDATE user_details SET 
				user_name = '".$_POST["user_name"]."',
				cargo_id = '".$_POST["cargo_id"]."', 
				categoria_id = '".$_POST["categoria_id"]."',
				country_id = '".$_POST["country_id"]."', 	
				province_id = '".$_POST["province_id"]."',
				district_id = '".$_POST["district_id"]."',
				bairro_id = '".$_POST["bairro_id"]."',
				instance_id = '".$_POST["instance_id"]."',
				place_affection_id = '".$_POST["place_affection_id"]."',     				
				user_email = '".$_POST["user_email"]."'
				WHERE user_id = '".$_POST["user_id"]."'
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'User Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'Active';
		if($_POST['status'] == 'Active')
		{
			$status = 'Inactive';
		}
		$query = "
		UPDATE user_details 
		SET user_status = :user_status 
		WHERE user_id = :user_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_status'	=>	$status,
				':user_id'		=>	$_POST["user_id"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'User Status change to ' . $status;
		}
	}
}

?>