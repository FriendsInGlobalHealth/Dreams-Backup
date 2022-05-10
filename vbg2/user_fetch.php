<?php

//user_fetch.php

include('database_connection.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM user_details
INNER JOIN sa_province on sa_province.province_id = user_details.province_id

INNER JOIN sa_country on sa_country.country_id = user_details.country_id

INNER JOIN sa_district on sa_district.district_id = user_details.district_id

INNER JOIN sa_bairro on sa_bairro.bairro_id = user_details.bairro_id

INNER JOIN sa_instance on sa_instance.instance_id = user_details.instance_id

INNER JOIN sa_place_affection on sa_place_affection.place_affection_id = user_details.place_affection_id

INNER JOIN sa_categoria on sa_categoria.categoria_id = user_details.categoria_id

INNER JOIN sa_cargo on sa_cargo.cargo_id = user_details.cargo_id
";

if(isset($_POST["search"]["value"]))
{
	
	$query .= 'WHERE user_details.user_email LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR user_details.user_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR user_details.user_status LIKE "%'.$_POST["search"]["value"].'%" ';	
	
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY user_details.user_id DESC ';
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
	if($row["user_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['user_id'];
	$sub_array[] = $row['user_email'];
	$sub_array[] = $row['user_name'];
	$sub_array[] = $row['cargo_name'];
	$sub_array[] = $row['categoria_name'];
	$sub_array[] = $row['country_name'];
	$sub_array[] = $row['province_name'];
	$sub_array[] = $row['district_name'];
	$sub_array[] = $row['bairro_name'];
	$sub_array[] = $row['instance_name'];
	$sub_array[] = $row['place_affection_name'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["user_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["user_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["user_status"].'">Delete</button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);
echo json_encode($output);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM user_details WHERE user_type='user'");
	$statement->execute();
	return $statement->rowCount();
}

?>