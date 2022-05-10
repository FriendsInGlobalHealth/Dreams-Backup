<?php

//brand_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_action_plan1 (cause_plan_id, cause_type_id, intervention_plan_id, user_id, responsible_plan_id, order_evaluaction_id, action_plan_date, action_plan_period, action_plan_updaty, status_intervention_id, coment) 
		VALUES (:cause_plan_id, :cause_type_id, :intervention_plan_id, :user_id, :responsible_plan_id, :order_evaluaction_id, :action_plan_date, :action_plan_period, :action_plan_updaty, :status_intervention_id, :coment)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':cause_plan_id'		=>	$_POST["cause_plan_id"],
				':cause_type_id'		=>	$_POST["cause_type_id"],
				':intervention_plan_id'		=>	$_POST["intervention_plan_id"],
				':user_id'		=>	$_POST["user_id"],
				':responsible_plan_id'		=>	$_POST["responsible_plan_id"],
				':order_evaluaction_id'	=>	$_POST["order_evaluaction_id"],
				':action_plan_date'		=>	$_POST["action_plan_date"],
				
				':coment'		=>	$_POST["coment"],
				':status_intervention_id'	=>	$_POST["status_intervention_id"],
				':action_plan_updaty'		=>	$_POST["action_plan_updaty"],				
				
				':action_plan_period'	=>	$_POST["action_plan_period"]				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Action Plane Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_action_plan1 WHERE 	action_plan_id = :action_plan_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':action_plan_id'	=>	$_POST["action_plan_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['cause_plan_id'] 		= $row['cause_plan_id'];
			$output['cause_type_id'] 		= $row['cause_type_id'];
			$output['intervention_plan_id'] = $row['intervention_plan_id'];
			$output['user_id'] 				= $row['user_id'];
			$output['responsible_plan_id'] 	= $row['responsible_plan_id'];
			$output['order_evaluaction_id'] = $row['order_evaluaction_id'];
			$output['action_plan_date'] 	= $row['action_plan_date'];
			$output['action_plan_period'] 	= $row['action_plan_period'];
			$output['status_intervention_id'] = $row['status_intervention_id'];
			$output['action_plan_updaty'] 	= $row['action_plan_updaty'];
			$output['coment'] 	= $row['coment'];				
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE sa_action_plan1 set 
		status_intervention_id = :status_intervention_id,
		action_plan_updaty = :action_plan_updaty,		
		coment = :coment 
		WHERE action_plan_id = :action_plan_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status_intervention_id'	=>	$_POST["status_intervention_id"],
				':action_plan_updaty'	=>	$_POST["action_plan_updaty"],
				':coment'	=>	$_POST["coment"],				
				':action_plan_id'		=>	$_POST["action_plan_id"]			
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Action Plan Edited';
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
		UPDATE sa_action_plan1 
		SET action_plan_status = :action_plan_status 
		WHERE action_plan_id = :action_plan_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':action_plan_status'	=>	$status,
				':action_plan_id'		=>	$_POST["action_plan_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Action Plan status change to ' . $status;
		}
	}
}

?>