<?php

//brand_fetch.php

include('database_connection.php');

$query = '';

$output = array();
$query .= "
SELECT * FROM sa_place_affection 
INNER JOIN sa_country ON sa_country.country_id = sa_place_affection.country_id 

INNER JOIN sa_province ON sa_province.province_id = sa_place_affection.province_id 

INNER JOIN sa_district ON sa_district.district_id = sa_place_affection.district_id 

INNER JOIN sa_instance ON sa_instance.instance_id = sa_place_affection.instance_id 

INNER JOIN sa_bairro ON sa_bairro.bairro_id = sa_place_affection.bairro_id 

INNER JOIN sa_service ON sa_service.service_id = sa_place_affection.service_id 

INNER JOIN sa_sub_service ON sa_sub_service.sub_service_id = sa_place_affection.sub_service_id 
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE sa_place_affection.place_affection_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_country.country_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_district.district_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sa_place_affection.place_affection_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY sa_place_affection.place_affection_id DESC ';
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
	if($row['place_affection_status'] == 'active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['place_affection_id'];
	$sub_array[] = $row['country_name'];
	$sub_array[] = $row['province_name'];
	$sub_array[] = $row['district_name'];
	$sub_array[] = $row['place_affection_name'];
	
	$sub_array[] = $row['instance_name'];
	$sub_array[] = $row['bairro_name'];
	
	$sub_array[] = $row['service_name'];
	$sub_array[] = $row['sub_service_name'];	
	
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["place_affection_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["place_affection_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["place_affection_status"].'">Delete</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare('SELECT * FROM sa_place_affection');
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