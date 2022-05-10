<?php

//area_padrao_fetch.php

include('database_connection.php');

$query = '';

$output = array();
$query .= "
SELECT * FROM sa_area_padrao 
INNER JOIN sa_area ON sa_area.area_id = sa_area_padrao.area_id 
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE sa_area_padrao.area_padrao_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_area.area_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_area_padrao.area_padrao_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY sa_area_padrao.area_padrao_id DESC ';
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
	if($row['area_padrao_status'] == 'active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['area_padrao_id'];
	$sub_array[] = $row['area_name'];
	$sub_array[] = $row['area_padrao_name'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["area_padrao_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["area_padrao_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["area_padrao_status"].'">Delete</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare('SELECT * FROM sa_area_padrao');
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