<?php

//order_action.php

include('database_connection.php');

include('function.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO sa_evaluation_order (user_id, evaluation_order_total, evaluation_order_date, evaluation_order_us, evaluation_order_type, period_status, evaluation_order_status, evaluation_order_created_date) 
		VALUES (:user_id, :evaluation_order_total, :evaluation_order_date, :evaluation_order_us, :evaluation_order_type, :period_status, :evaluation_order_status, :evaluation_order_created_date)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_id'						=>	$_SESSION["user_id"],
				':evaluation_order_total'		=>	0,
				':evaluation_order_date'			=>	$_POST['evaluation_order_date'],
				':evaluation_order_us'			=>	$_POST['evaluation_order_us'],
				':evaluation_order_type'		=>	$_POST['evaluation_order_type'],
				':period_status'				=>	$_POST['period_status'],
				':evaluation_order_status'		=>	'active',
				':evaluation_order_created_date'	=>	date("Y-m-d")
			)
		);
		$result = $statement->fetchAll();
		$statement = $connect->query("SELECT LAST_INSERT_ID()");
		$evaluation_order_id = $statement->fetchColumn();

		if(isset($evaluation_order_id))
		{
			$total_amount = 0;
			for($count = 0; $count<count($_POST["criterion_verification_id"]); $count++)
			{
				$product_details = fetch_product_details($_POST["criterion_verification_id"][$count], $connect);
				$sub_query = "
				INSERT INTO sa_evaluation_order_criterion (evaluation_order_id, criterion_verification_id, quantity) VALUES (:evaluation_order_id, :criterion_verification_id, :quantity)
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute(
					array(
						':evaluation_order_id'	=>	$evaluation_order_id,
						':criterion_verification_id'			=>	$_POST["criterion_verification_id"][$count],
						':quantity'				=>	$_POST["quantity"][$count]
					)
				);
				$base_price = 1 * $_POST["quantity"][$count];
				$tax = ($base_price/100)*1;
				$total_amount = $total_amount + ($base_price + $tax);
			}
			$update_query = "
			UPDATE sa_evaluation_order 
			SET evaluation_order_total = '".$total_amount."' 
			WHERE evaluation_order_id = '".$evaluation_order_id."'
			";
			$statement = $connect->prepare($update_query);
			$statement->execute();
			$result = $statement->fetchAll();
			if(isset($result))
			{
				echo 'Evaluation Created...';
				echo '<br />';
				echo $total_amount;
				echo '<br />';
				echo $evaluation_order_id;
			}
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM sa_evaluation_order WHERE evaluation_order_id = :evaluation_order_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':evaluation_order_id'	=>	$_POST["evaluation_order_id"]
			)
		);
		$result = $statement->fetchAll();
		$output = array();
		foreach($result as $row)
		{
			$output['evaluation_order_us'] = $row['evaluation_order_us'];
			$output['evaluation_order_date'] = $row['evaluation_order_date'];
			$output['evaluation_order_type'] = $row['evaluation_order_type'];
			$output['period_status'] = $row['period_status'];
		}
		$sub_query = "
		SELECT * FROM sa_evaluation_order_criterion 
		WHERE evaluation_order_id = '".$_POST["evaluation_order_id"]."'
		";
		$statement = $connect->prepare($sub_query);
		$statement->execute();
		$sub_result = $statement->fetchAll();
		$product_details = '';
		$count = '';
		foreach($sub_result as $sub_row)
		{
			$product_details .= '
			<script>
			$(document).ready(function(){
				$("#criterion_verification_id'.$count.'").selectpicker("val", '.$sub_row["criterion_verification_id"].');
				$(".selectpicker").selectpicker();
			});
			</script>
			<span id="row'.$count.'">
				<div class="row">
					<div class="col-md-8">
						<select name="criterion_verification_id[]" id="criterion_verification_id'.$count.'" class="form-control selectpicker" data-live-search="true" required>
							'.fill_product_list($connect).'
						</select>
						<input type="hidden" name="hidden_criterion_verification_id[]" id="hidden_criterion_verification_id'.$count.'" value="'.$sub_row["criterion_verification_id"].'" />
					</div>
					<div class="col-md-3">
						<input type="text" name="quantity[]" class="form-control" value="'.$sub_row["quantity"].'" required />
					</div>
					<div class="col-md-1">
			';

			if($count == '')
			{
				$product_details .= '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
			}
			else
			{
				$product_details .= '<button type="button" name="remove" id="'.$count.'" class="btn btn-danger btn-xs remove">-</button>';
			}
			$product_details .= '
						</div>
					</div>
				</div><br />
			</span>
			';
			$count = $count + 1;
		}
		$output['product_details'] = $product_details;
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$delete_query = "
		DELETE FROM sa_evaluation_order_criterion 
		WHERE evaluation_order_id = '".$_POST["evaluation_order_id"]."'
		";
		$statement = $connect->prepare($delete_query);
		$statement->execute();
		$delete_result = $statement->fetchAll();
		if(isset($delete_result))
		{
			$total_amount = 0;
			for($count = 0; $count < count($_POST["criterion_verification_id"]); $count++)
			{
				$product_details = fetch_product_details($_POST["criterion_verification_id"][$count], $connect);
				$sub_query = "
				INSERT INTO sa_evaluation_order_criterion (evaluation_order_id, criterion_verification_id, quantity, price, tax) VALUES (:evaluation_order_id, :criterion_verification_id, :quantity, :price, :tax)
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute(
					array(
						':evaluation_order_id'	=>	$_POST["evaluation_order_id"],
						':criterion_verification_id'			=>	$_POST["criterion_verification_id"][$count],
						':quantity'				=>	$_POST["quantity"][$count],
						':price'				=>	$product_details['price'],
						':tax'					=>	$product_details['tax']
					)
				);
				$base_price = $product_details['price'] * $_POST["quantity"][$count];
				$tax = ($base_price/100)*$product_details['tax'];
				$total_amount = $total_amount + ($base_price + $tax);
			}
			$update_query = "
			UPDATE sa_evaluation_order 
			SET evaluation_order_us = :evaluation_order_us, 
			evaluation_order_date = :evaluation_order_date, 
			evaluation_order_type = :evaluation_order_type, 
			evaluation_order_total = :evaluation_order_total, 
			period_status = :period_status
			WHERE evaluation_order_id = :evaluation_order_id
			";
			$statement = $connect->prepare($update_query);
			$statement->execute(
				array(
					':evaluation_order_us'			=>	$_POST["evaluation_order_us"],
					':evaluation_order_date'			=>	$_POST["evaluation_order_date"],
					':evaluation_order_type'		=>	$_POST["evaluation_order_type"],
					':evaluation_order_total'		=>	$total_amount,
					':period_status'				=>	$_POST["period_status"],
					':evaluation_order_id'			=>	$_POST["evaluation_order_id"]
				)
			);
			$result = $statement->fetchAll();
			if(isset($result))
			{
				echo 'Evaluation Edited...';
			}
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
		UPDATE sa_evaluation_order 
		SET evaluation_order_status = :evaluation_order_status 
		WHERE evaluation_order_id = :evaluation_order_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':evaluation_order_status'	=>	$status,
				':evaluation_order_id'		=>	$_POST["evaluation_order_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Evaluation status change to ' . $status;
		}
	}
}

?>