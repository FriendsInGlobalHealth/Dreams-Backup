<?php
//function.php

//funcao period_plan
function fill_plan_period_list($connect)
{
	$query = "
	SELECT * FROM sa_period_plan 
	WHERE period_status = 'active' 
	ORDER BY period_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["period_id"].'">'.$row["period_name"].'</option>';
	}
	return $output;
}

//funcao status intervention
function fill_status_intervention_list($connect)
{
	$query = "
	SELECT * FROM sa_status_intervention 
	WHERE status_intervention_status = 'active' 
	ORDER BY status_intervention_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["status_intervention_id"].'">'.$row["status_intervention_name"].'</option>';
	}
	return $output;
}


//action plan
function fill_action_plan_list($connect)
{
	$query = "
	SELECT * FROM sa_action_plan1 
	WHERE action_plan_status = 'active' 
	ORDER BY responsible_plan_id ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["action_plan_id"].'">'.$row["responsible_plan_id"].'</option>';
	}
	return $output;
}

//responsavel plan
function fill_responsavel_plan_list($connect)
{
	$query = "
	SELECT * FROM sa_responsible_plan 
	WHERE responsible_plan_status = 'active' 
	ORDER BY responsible_plan_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["responsible_plan_id"].'">'.$row["responsible_plan_name"].'</option>';
	}
	return $output;
}

//intervention plan
function fill_intervention_plan_list($connect)
{
	$query = "
	SELECT * FROM sa_intervention_plan 
	WHERE intervention_plan_status = 'active' 
	ORDER BY intervention_plan_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["intervention_plan_id"].'">'.$row["intervention_plan_name"].'</option>';
	}
	return $output;
}

//cause type
function fill_cause_type_list($connect)
{
	$query = "
	SELECT * FROM sa_cause_type 
	WHERE cause_type_status = 'active' 
	ORDER BY cause_type_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["cause_type_id"].'">'.$row["cause_type_name"].'</option>';
	}
	return $output;
}

//cause_plan
function fill_cause_plan_list($connect)
{
	$query = "
	SELECT * FROM sa_cause_plan 
	WHERE cause_plan_status = 'active' 
	ORDER BY cause_plan_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["cause_plan_id"].'">'.$row["cause_plan_name"].'</option>';
	}
	return $output;
}

//sa_period

function fill_sa_period_list($connect)
{
	$query = "
	SELECT * FROM sa_period 
	WHERE period_status = 'active' 
	ORDER BY period_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["period_id"].'">'.$row["period_name"].'</option>';
	}
	return $output;
}



//categoria
function fill_sa_categoria_list($connect)
{
	$query = "
	SELECT * FROM sa_categoria 
	WHERE categoria_status = 'active' 
	ORDER BY categoria_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["categoria_id"].'">'.$row["categoria_name"].'</option>';
	}
	return $output;
}

//cargo
function fill_sa_cargo_list($connect)
{
	$query = "
	SELECT * FROM sa_cargo 
	WHERE cargo_status = 'active' 
	ORDER BY cargo_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["cargo_id"].'">'.$row["cargo_name"].'</option>';
	}
	return $output;
}

function fill_sa_area_list($connect)
{
	$query = "
	SELECT * FROM sa_area 
	WHERE area_status = 'active' 
	ORDER BY area_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["area_id"].'">'.$row["area_name"].'</option>';
	}
	return $output;
}


//criterio de verificacao
function fill_area_padrao_criterio_list($connect, $area_id)
{
	$query = "SELECT * FROM sa_area_padrao 
	WHERE area_padrao_status = 'active' 
	AND area_id = '".$area_id."'
	ORDER BY area_padrao_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select sa_area_padrao</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["area_padrao_id"].'">'.$row["area_padrao_name"].'</option>';
	}
	return $output;
}

//area padrao
function fill_area_padrao_list($connect)
{
	$query = "
	SELECT * FROM sa_area_padrao 
	WHERE area_padrao_status = 'active' 
	ORDER BY area_padrao_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["area_padrao_id"].'">'.$row["area_padrao_name"].'</option>';
	}
	return $output;
}

function fill_brand_list($connect, $area_id)
{
	$query = "SELECT * FROM sa_area_padrao 
	WHERE area_padrao_status = 'active' 
	AND area_id = '".$area_id."'
	ORDER BY area_padrao_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select sa_area_padrao</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["area_padrao_id"].'">'.$row["area_padrao_name"].'</option>';
	}
	return $output;
}

//funcao cargo
function fill_cargo_list($connect)
{
	$query = "
	SELECT * FROM sa_cargo 
	WHERE cargo_status = 'active' 
	ORDER BY cargo_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["cargo_id"].'">'.$row["cargo_name"].'</option>';
	}
	return $output;
}

//district
function fill_district_list($connect)
{
	$query = "
	SELECT * FROM sa_district 
	WHERE district_status = 'active' 
	ORDER BY district_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["district_id"].'">'.$row["district_name"].'</option>';
	}
	return $output;
}

//district
function fill_district2_list($connect)
{
	$query = "
	SELECT * FROM sa_district 
	WHERE district_status = 'active' 
	ORDER BY district_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["district_id"].'">'.$row["district_name"].'</option>';
	}
	return $output;
}

//district
function fill_sub_district_list($connect, $province_id)
{
	$query = "SELECT * FROM sa_district 
	WHERE district_status = 'active' 
	AND province_id = '".$province_id."'
	ORDER BY district_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select sa_district</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["district_id"].'">'.$row["district_name"].'</option>';
	}
	return $output;
}

//province
function fill_province_list($connect, $country_id)
{
	$query = "SELECT * FROM sa_province 
	WHERE province_status = 'active' 
	AND country_id = '".$country_id."'
	ORDER BY province_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select sa_province</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["province_id"].'">'.$row["province_name"].'</option>';
	}
	return $output;
}

//bairro neighborhood
function fill_neighborhood_list($connect, $province_id)
{
	$query = "SELECT * FROM sa_bairro 
	WHERE bairro_status = 'active' 
	AND bairro_id = '".$bairro_id."'
	ORDER BY bairro_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select sa_bairro</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["bairro_id"].'">'.$row["bairro_name"].'</option>';
	}
	return $output;
}

//Bairro
function fill_bairro_list($connect)
{
	$query = "
	SELECT * FROM sa_bairro 
	WHERE bairro_status = 'active' 
	ORDER BY bairro_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["bairro_id"].'">'.$row["bairro_name"].'</option>';
	}
	return $output;
}


//evaluation type
function fill_evaluation_type_list($connect)
{
	$query = "
	SELECT * FROM sa_evaluation_type 
	WHERE evaluation_type_status = 'active' 
	ORDER BY evaluation_type_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["evaluation_type_id"].'">'.$row["evaluation_type_name"].'</option>';
	}
	return $output;
}

//codigo para criacao de paramentro do distrito
function fill_province_parameter_list($connect)
{
	$query = "
	SELECT * FROM sa_province 
	WHERE province_status = 'active' 
	ORDER BY province_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["province_id"].'">'.$row["province_name"].'</option>';
	}
	return $output;
}


//sub service
function fill_sub_service_list($connect, $service_id)
{
	$query = "SELECT * FROM sa_sub_service 
	WHERE sub_service_status = 'active' 
	AND service_id = '".$service_id."'
	ORDER BY sub_service_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select sa_sub_service</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["sub_service_id"].'">'.$row["sub_service_name"].'</option>';
	}
	return $output;
}

//sub service sub
function fill_service_sub_list($connect)
{
	$query = "
	SELECT * FROM sa_sub_service 
	WHERE sub_service_status	 = 'active' 
	ORDER BY sub_service_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["sub_service_id"].'">'.$row["sub_service_name"].'</option>';
	}
	return $output;
}

//service
function fill_service_list($connect)
{
	$query = "
	SELECT * FROM sa_service 
	WHERE service_status	 = 'active' 
	ORDER BY service_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["service_id"].'">'.$row["service_name"].'</option>';
	}
	return $output;
}

//categoria
function fill_categoria_list($connect)
{
	$query = "
	SELECT * FROM sa_categoria 
	WHERE instance_status = 'active' 
	ORDER BY categoria_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["categoria_id"].'">'.$row["categoria_name"].'</option>';
	}
	return $output;
}

//funcao country
function fill_country_list($connect)
{
	$query = "
	SELECT * FROM sa_country 
	WHERE country_status = 'active' 
	ORDER BY country_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["country_id"].'">'.$row["country_name"].'</option>';
	}
	return $output;
}

//funcao instance
function fill_instance_list($connect)
{
	$query = "
	SELECT * FROM sa_instance 
	WHERE instance_status = 'active' 
	ORDER BY instance_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["instance_id"].'">'.$row["instance_name"].'</option>';
	}
	return $output;
}

function get_user_name($connect, $user_id)
{
	$query = "
	SELECT user_name FROM user_details WHERE user_id = '".$user_id."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['user_name'];
	}
}

function fill_product_list($connect)
{
	$query = "
	SELECT * FROM sa_criterion_verification
	WHERE criterion_verification_status = 'active' 
	ORDER BY criterion_verification_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["criterion_verification_id"].'">'.$row["criterion_verification_name"].'</option>';
	}
	return $output;
}

function fetch_product_details($criterion_verification_id, $connect)
{
	$query = "
	SELECT * FROM sa_criterion_verification
	WHERE criterion_verification_id = '".$criterion_verification_id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['criterion_verification_name'] = $row["criterion_verification_name"];
		$output['quantity'] = $row["criterion_verification_control"];
	}
	return $output;
}

function available_product_quantity($connect, $criterion_verification_id)
{
	$product_data = fetch_product_details($criterion_verification_id, $connect);
	$query = "
	SELECT 	sa_evaluation_order_criterion.quantity FROM sa_evaluation_order_criterion 
	INNER JOIN sa_evaluation_order ON sa_evaluation_order.evaluation_order_id = sa_evaluation_order_criterion.evaluation_order_id
	WHERE sa_evaluation_order_criterion.criterion_verification_id = '".$criterion_verification_id."' AND
	sa_evaluation_order.evaluation_order_status = 'active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total = 0;
	foreach($result as $row)
	{
		$total = $total + $row['quantity'];
	}
	$available_quantity = intval($product_data['quantity']) - intval($total);
	if($available_quantity == 0)
	{
		$update_query = "
		UPDATE sa_criterion_verification SET 
		criterion_verification_status = 'inactive' 
		WHERE criterion_verification_id = '".$criterion_verification_id."'
		";
		$statement = $connect->prepare($update_query);
		$statement->execute();
	}
	return $available_quantity;
}

function count_total_user($connect)
{
	$query = "
	SELECT * FROM user_details WHERE user_status='active'";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}


//area
function count_total_sa_area($connect)
{
	$query = "
	SELECT * FROM sa_area WHERE area_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_brand($connect)
{
	$query = "
	SELECT * FROM sa_area_padrao WHERE area_padrao_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

//total area padrao
function count_total_area_padrao($connect)
{
	$query = "
	SELECT * FROM sa_area_padrao WHERE area_padrao_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_product($connect)
{
	$query = "
	SELECT * FROM sa_criterion_verification WHERE criterion_verification_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

//total criterios registados
function count_total_criterion_verification($connect)
{
	$query = "
	SELECT * FROM sa_criterion_verification WHERE criterion_verification_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_order_value($connect)
{
	$query = "
	SELECT sum(evaluation_order_total) as total_order_value FROM sa_evaluation_order 
	WHERE evaluation_order_status='active'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_cash_order_value($connect)
{
	$query = "
	SELECT sum(evaluation_order_total) as total_order_value FROM sa_evaluation_order 
	WHERE period_status = 'quarterly' 
	AND evaluation_order_status='active'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_value($connect)
{
	$query = "
	SELECT sum(evaluation_order_total) as total_order_value FROM sa_evaluation_order WHERE period_status = 'semiannual' AND evaluation_order_status='active'
	";
	if($_SESSION['type'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function get_user_wise_total_order($connect)
{
	$query = '
	SELECT sum(sa_evaluation_order.evaluation_order_total) as order_total, 
	SUM(CASE WHEN sa_evaluation_order.period_status = "quarterly" THEN sa_evaluation_order.evaluation_order_total ELSE 0 END) AS cash_order_total, 
	SUM(CASE WHEN sa_evaluation_order.period_status = "semiannual" THEN sa_evaluation_order.evaluation_order_total ELSE 0 END) AS credit_order_total, 
	user_details.user_name 
	FROM sa_evaluation_order 
	INNER JOIN user_details ON user_details.user_id = sa_evaluation_order.user_id 
	WHERE sa_evaluation_order.evaluation_order_status = "active" GROUP BY sa_evaluation_order.user_id
	';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>User Name</th>
				<th>Total Evaluation</th>
				<th>Total quarterly Evaluation</th>
				<th>Total semiannual Evaluation</th>
			</tr>
	';

	$total_order = 0;
	$total_cash_order = 0;
	$total_credit_order = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right"> '.$row["order_total"].'</td>
			<td align="right"> '.$row["cash_order_total"].'</td>
			<td align="right"> '.$row["credit_order_total"].'</td>
		</tr>
		';

		$total_order = $total_order + $row["order_total"];
		$total_cash_order = $total_cash_order + $row["cash_order_total"];
		$total_credit_order = $total_credit_order + $row["credit_order_total"];
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b> '.$total_order.'</b></td>
		<td align="right"><b> '.$total_cash_order.'</b></td>
		<td align="right"><b> '.$total_credit_order.'</b></td>
	</tr></table></div>
	';
	return $output;
}

?>