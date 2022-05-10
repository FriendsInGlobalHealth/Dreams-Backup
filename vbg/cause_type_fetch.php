<?php

//product_fetch.php

include('database_connection.php');
include('function.php');

$query = '';

$output = array();
$query .= "
	SELECT * FROM sa_cause_type 
	INNER JOIN sa_area_padrao ON sa_area_padrao.area_padrao_id = sa_cause_type.area_padrao_id
	INNER JOIN sa_area ON sa_area.area_id = sa_cause_type.area_id 
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE sa_area_padrao.area_padrao_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_area.area_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_cause_type.cause_type_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_cause_type.cause_type_date LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_cause_type.cause_type_id LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY cause_type_id DESC ';
}

if($_POST['length'] != -1)
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
	$status = '';
	if($row['criterion_verification_status'] == 'active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['cause_type_id'];
	$sub_array[] = $row['area_name'];
	$sub_array[] = $row['area_padrao_name'];
	$sub_array[] = $row['cause_type_name'];
	$sub_array[] = $row['cause_type_description']; 
	$sub_array[] = $row['cause_type_date'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="view" id="'.$row["cause_type_id"].'" class="btn btn-info btn-xs view">View</button>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["cause_type_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["cause_type_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["criterion_verification_status"].'">Delete</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare('SELECT * FROM sa_cause_type');
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