<?php

//brand_fetch.php

include('database_connection.php');

$query = '';

$output = array();
$query .= "
SELECT * FROM sa_sub_service 
INNER JOIN sa_service ON sa_service.service_id = sa_sub_service.service_id 
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE sa_sub_service.sub_service_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_service.service_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_sub_service.sub_service_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY sa_sub_service.sub_service_id DESC ';
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
	$status = '';
	if($row['sub_service_status'] == 'active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['sub_service_id'];
	$sub_array[] = $row['service_name'];
	$sub_array[] = $row['sub_service_name'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["sub_service_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["sub_service_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["sub_service_status"].'">Delete</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare('SELECT * FROM sa_sub_service');
	$statement->execute();
	return $statement->rowCount();
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=>	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records($connect),
	"data"				=>	$data
);

echo json_encode($output);

?>