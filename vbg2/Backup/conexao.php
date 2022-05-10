<?php

$host = "localhost";
$usuario = "sysadmin";
$senha="Server19!!!";
$bd = "vbg_sam";

$mysqli = new mysqli($host,$usuario,$senha,$bd);

if($mysqli->connect_errno)
	echo "Falha na conexao: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

?>
