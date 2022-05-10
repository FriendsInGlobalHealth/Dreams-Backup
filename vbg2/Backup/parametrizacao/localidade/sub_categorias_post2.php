<?php include_once("conexao.php");

	$pais_id = $_REQUEST['pais_id'];
	
	$result_sub_cat = "SELECT * FROM sa_provincia WHERE pais_id=$pais_id ORDER BY nome_provincia	";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sa_provincia[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_provincia' => utf8_encode($row_sub_cat['nome_provincia']),
		);
	}
	
	echo(json_encode($sa_provincia));
