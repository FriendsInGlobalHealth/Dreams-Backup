<?php

//order_fetch.php

include('database_connection.php');

include('function.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM sa_evaluation_order
INNER JOIN user_details on user_details.user_id = sa_evaluation_order.user_id

INNER JOIN sa_province on sa_province.province_id = user_details.province_id

INNER JOIN sa_district on sa_district.district_id = user_details.district_id

INNER JOIN sa_place_affection on sa_place_affection.place_affection_id = user_details.place_affection_id
";

if($_SESSION['type'] == 'user')
{
	$query .= 'user_id = "'.$_SESSION["user_id"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE user_details.user_email LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR user_details.user_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR user_details.user_status LIKE "%'.$_POST["search"]["value"].'%" ';
	
	/*
	$query .= '(evaluation_order_id LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR evaluation_order_us LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR evaluation_order_total LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR evaluation_order_status LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR evaluation_order_date LIKE "%'.$_POST["search"]["value"].'%") ';
	*/
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY evaluation_order_id DESC ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$period_status = '';

	if($row['period_status'] == 'quarterly')
	{
		$period_status = '<span class="label label-primary">quarterly</span>';
	}
	else
	{
		$period_status = '<span class="label label-warning">semiannual</span>';
	}

	$status = '';
	if($row['evaluation_order_status'] == 'active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['evaluation_order_id'];
	$sub_array[] = $row['evaluation_order_type'];
	$sub_array[] = $row['province_name'];
	$sub_array[] = $row['district_name'];
	$sub_array[] = $row['place_affection_name'];
	$sub_array[] = '2019';
	$sub_array[] = $period_status;
	$sub_array[] = $row['evaluation_order_date'];
	if($_SESSION['type'] == 'master')
	{
		$sub_array[] = get_user_name($connect, $row['user_id']);
	}	
	
	$sub_array[] = 'Acção';
	$sub_array[] = $row['evaluation_order_total'];
	
	$sub_array[] = $status;
	

	$sub_array[] = '<a href="view_order.php?pdf=1&order_id='.$row["evaluation_order_id"].'" class="btn btn-info btn-xs">View PDF</a>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["evaluation_order_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["evaluation_order_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["evaluation_order_status"].'">Delete</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM sa_evaluation_order");
	$statement->execute();
	return $statement->rowCount();
}

$output = array(
	"draw"    			=> 	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);	

echo json_encode($output);

?>