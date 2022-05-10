<?php include_once("conexao.php");

	$area_padrao_id = $_REQUEST['area_padrao_id'];
	
	$result_sub_cat = "SELECT * FROM sa_criterio_verificacao WHERE id_ar=$area_padrao_id ORDER BY nome_criterio	";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sa_criterio_verificacao[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_criterio' => utf8_encode($row_sub_cat['nome_criterio']),
		);
	}
	
	echo(json_encode($sa_criterio_verificacao));
