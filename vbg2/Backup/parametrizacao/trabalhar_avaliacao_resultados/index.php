<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Distritos</title>		
		<style type="text/css">
			.carregando{
				color:#ff0000;
				display:none;
			}
		</style>
	</head>
	<body>
		<h1>Criar Resultado</h1>
		<?php include_once("conexao.php"); ?>
		
		<form method="POST" action="salvar_post.php">
			<label>Resultado:</label>
			<input type="text" name="resultado" placeholder="Criar Resultado"> <br><br>
			
			<label>Categoria:</label>
			<select name="criterio_verificacao" id="criterio_verificacao">
				<option value="">Escolha a Categoria</option>
				<?php
					$result_cat_post = "SELECT * FROM sa_criterio_verificacao ORDER BY nome_criterio";
					$resultado_cat_post = mysqli_query($conn, $result_cat_post);
					while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_criterio'].'</option>';
					}
				?>
			</select><br><br>
			
			<label>Subcategoria:</label>
			<span class="carregando">Aguarde, carregando...</span>
			<select name="Meio_Verificacao_id" id="Meio_Verificacao_id">
				<option value="">Escolha a Subcategoria</option>
			</select><br><br>
			
			<input type="submit" value="Cadastrar">
		</form>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">
		$(function(){
			$('#criterio_verificacao').change(function(){
				if( $(this).val() ) {
					$('#Meio_Verificacao_id').hide();
					$('.carregando').show();
					$.getJSON('sub_categorias_post.php?search=',{criterio_verificacao: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Subcategoria</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_meio_verificacao + '</option>';
						}	
						$('#Meio_Verificacao_id').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#Meio_Verificacao_id').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>
		
	</body>
</html>