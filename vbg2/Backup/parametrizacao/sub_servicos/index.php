<?php include '../header.php';?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Sub Servicos</title>		
		<style type="text/css">
			.carregando{
				color:#ff0000;
				display:none;
			}
			
			.tutulo{
				color: #00FF00; /*esta eh a cor do texto*/
				
			}
			.botao{
			color:#000000
			}
			
			
			
		</style>
	</head>
	<body>
		<h1 >Criar Tipo de Sub Serviço</h1>
		<?php include_once("conexao.php"); ?>
		
		<form method="POST" action="salvar_post.php" >
			<label >Subservico</label>
			<br>
			<input class="col-lg-10 col-lg-offset-2" type="text" name="nome_sub_servico" placeholder="Escrever o nome do Tipo de Sub Serviço"> 
			<br>
			<label>Servico</label>
			<br>
			<select class="col-lg-10 col-lg-offset-2" name="id_servico" id="id_servico">
				<option value="">Escolha o Servico</option>
				<?php
					$result_cat_post = "SELECT * FROM sa_servico ORDER BY nome_servico";
					$resultado_cat_post = mysqli_query($conn, $result_cat_post);
					while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_servico'].'</option>';
					}
				?>
			</select><br>
			
			
			<input type="submit" value="Cadastrar">
		</form>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">

		</script>
		
	</body>
</html>