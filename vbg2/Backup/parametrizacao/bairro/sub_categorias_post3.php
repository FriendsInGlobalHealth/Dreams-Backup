<?php include_once("conexao.php");

	$distrito_id = $_REQUEST['distrito_id'];
	
	$result_sub_cat = "SELECT * FROM sa_bairro WHERE distrito_id=$distrito_id ORDER BY nome_bairro	";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sa_bairro[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_bairro' => utf8_encode($row_sub_cat['nome_bairro']),
		);
	}
	
	echo(json_encode($sa_bairro));
