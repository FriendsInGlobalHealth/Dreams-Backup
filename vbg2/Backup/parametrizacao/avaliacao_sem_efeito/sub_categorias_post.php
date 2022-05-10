<?php include_once("conexao.php");

	$id_provincia = $_REQUEST['id_provincia'];
	
	$result_sub_cat = "SELECT * FROM sa_distrito WHERE provincia_id=$id_provincia ORDER BY Nome_Distrito";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sa_distrito[] = array(
			'id'	=> $row_sub_cat['id'],
			'Nome_Distrito' => utf8_encode($row_sub_cat['Nome_Distrito']),
		);
	}
	
	echo(json_encode($sa_distrito));
