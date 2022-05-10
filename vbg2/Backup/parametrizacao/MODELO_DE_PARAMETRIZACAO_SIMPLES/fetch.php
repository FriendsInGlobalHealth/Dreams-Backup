<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "tarv2");
$columns = array('data', 'codigo', 'residencia', 'bairro', 'referencia', 'resultado', 'observacoes');

$query = "SELECT * FROM  busqueda_doentes ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE data LIKE "%'.$_POST["search"]["value"].'%" 
 OR codigo LIKE "%'.$_POST["search"]["value"].'%"
 OR residencia LIKE "%'.$_POST["search"]["value"].'%" 
 OR bairro LIKE "%'.$_POST["search"]["value"].'%" 
 OR referencia LIKE "%'.$_POST["search"]["value"].'%" 
 OR resultado LIKE "%'.$_POST["search"]["value"].'%" 
 OR observacoes LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="data">' . $row["data"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="codigo">' . $row["codigo"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="residencia">' . $row["residencia"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="bairro">' . $row["bairro"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="referencia">' . $row["referencia"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="resultado">' . $row["resultado"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="observacoes">' . $row["observacoes"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM  busqueda_doentes";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>