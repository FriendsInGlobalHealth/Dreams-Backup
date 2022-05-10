<?php include '../header.php';?>

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
	


    <tbody>
        <tr>
		
		<h1>Criar Avaliacao</h1>
		
		
		<form method="POST" action="salvar_post.php">
		

			
			<label>Data criacao da Avaliacao:</label>
			<br>
			<input class="col-lg-10 col-lg-offset-2" type="date" name="data_avaliacao" placeholder="data da avaliacao"> 
			<br>			
			
			<label>Nome da Avaliacao:</label>
			<br>
			<input class="col-lg-10 col-lg-offset-2" type="text" name="nome_avaliacao" placeholder="nome da avaliacao">
			

			<br>

			<?php include_once("conexao.php"); ?>
			
			<label>Tipo de Instancia:</label>
			<br>
			<select class="col-lg-10 col-lg-offset-2" name="id_instancia" id="id_instancia">
				<option value="">Escolha a Instancia</option>
				<?php
					$result_cat_post = "SELECT * FROM sa_instancia ORDER BY nome_instancia";
					$resultado_cat_post = mysqli_query($conn, $result_cat_post);
					while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						echo '<option value="'.$row_cat_post['id_I'].'">'.$row_cat_post['nome_instancia'].'</option>';
					}
				?>
			</select>
			
			<br>
			<label>Tipo de Avaliacao</label>
			<br>
			<select class="col-lg-10 col-lg-offset-2" name="id_tipo_avaliacao" id="id_tipo_avaliacao">
				<option value="">Escolha o tipo de Avaliacao</option>
				<?php
					$result_cat_post = "SELECT * FROM sa_tipo_avaliacao ORDER BY nome_tipo_avaliacao";
					$resultado_cat_post = mysqli_query($conn, $result_cat_post);
					while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_tipo_avaliacao'].'</option>';
					}
				?>
			</select>
			</td>
			
			<br>
			
			<label>Data Final da Avaliacao:</label>
			<br>
			<input class="col-lg-10 col-lg-offset-2" type="date" name="data_fim_avaliacao" placeholder="data final da avaliacao"> <br><br>
					
			
			<input type="submit" value="Cadastrar">
		</form>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">
		$(function(){
			$('#id_instancia').change(function(){
				if( $(this).val() ) {
					$('#id_distrito').hide();
					$('.carregando').show();
					$.getJSON('sub_categorias_post.php?search=',{id_instancia: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha a Instancia</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].Nome_Distrito + '</option>';
						}	
						$('#id_distrito').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_distrito').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>
		
	</body>
</html>