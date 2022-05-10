<?php include_once("conexao.php");

	$criterio_verificacao = $_REQUEST['criterio_verificacao'];
	
	$result_sub_cat = "SELECT * FROM sa_meio_verificacao WHERE criterio_verificacao_id=$criterio_verificacao ORDER BY nome_meio_verificacao";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sa_meio_verificacao[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_meio_verificacao' => utf8_encode($row_sub_cat['nome_meio_verificacao']),
		);
	}
	
	echo(json_encode($sa_meio_verificacao));
