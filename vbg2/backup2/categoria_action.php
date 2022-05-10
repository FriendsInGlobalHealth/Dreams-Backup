<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_categoria (categoria_name) 
		VALUES (:categoria_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':categoria_name'	=>	$_POST["categoria_name"]
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
		$query = "SELECT * FROM sa_categoria WHERE categoria_id = :categoria_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':categoria_id'	=>	$_POST["categoria_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['categoria_name'] = $row['categoria_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_categoria set categoria_name = :categoria_name  
		WHERE categoria_id = :categoria_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':categoria_name'	=>	$_POST["categoria_name"],
				':categoria_id'		=>	$_POST["categoria_id"]
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
		UPDATE sa_categoria 
		SET categoria_status = :categoria_status 
		WHERE categoria_id = :categoria_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':categoria_status'	=>	$status,
				':categoria_id'		=>	$_POST["categoria_id"]
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