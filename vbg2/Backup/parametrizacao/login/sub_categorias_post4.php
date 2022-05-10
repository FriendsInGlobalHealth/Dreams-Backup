<?php include_once("conexao.php");

	$instancia_id = $_REQUEST['instancia_id'];
	
	$result_sub_cat = "SELECT * FROM sa_local_afecto WHERE instancia_id=$instancia_id ORDER BY nome_local	";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sa_local_afecto[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_local' => utf8_encode($row_sub_cat['nome_local']),
		);
	}
	
	echo(json_encode($sa_local_afecto));
