<?php include_once("conexao.php");

	$area_id = $_REQUEST['area_id'];
	
	$result_sub_cat = "SELECT * FROM sa_area_padrao WHERE area_id=$area_id ORDER BY nome_area_padrao	";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sa_area_padrao[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_area_padrao' => utf8_encode($row_sub_cat['nome_area_padrao']),
		);
	}
	
	echo(json_encode($sa_area_padrao));
