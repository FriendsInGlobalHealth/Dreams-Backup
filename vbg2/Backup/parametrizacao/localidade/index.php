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
		
		<style type="text/css">
			.carregando2{
				color:#ff0000;
				display:none;
			}
		</style>		
		
	</head>
	<body>
		<h1>Criar Localidade</h1>
		<?php include_once("conexao.php"); ?>
		
		<form method="POST" action="salvar_post.php">
			<label>Nome Meio Verificacao</label>
			<br>
			<input class="col-lg-10 col-lg-offset-2" type="text" name="nome meio verificacao" placeholder="Meio de Verificacao"> <br>
			

						<div class="form-group">
							<label>Pais <span class="text-danger">*</span></label>
							<br>
							
							<select class="col-lg-10 col-lg-offset-2" name="pais_id" id="pais_id" placeholder="Enter user country" required>
								<?php include_once("conexao.php"); ?>

								<option value="">Escolha o Pais</option>
								<?php
								//padrao
									$result_cat_post = "SELECT * FROM sa_pais ORDER BY nome_pais";
									$resultado_cat_post = mysqli_query($conn, $result_cat_post);
									while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
										echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_pais'].'</option>';
									}
									//criterio
								?>
							</select>							
							
							
						</div>
	

						<div class="form-group">
							<label>Provincia <span class="text-danger">*</span></label>

							<br>
							<span class="carregando2">Aguarde, carregando...</span>
							<select class="col-lg-10 col-lg-offset-2" name="provincia_id" id="provincia_id">
								<option value="">Escolha </option>
							</select><br>
						
						</div>
						<div class="form-group">
							<label>Distrito <span class="text-danger">*</span></label>
							
							<br>
							<span class="carregando">Aguarde, carregando...</span>
							<select class="col-lg-10 col-lg-offset-2" name="distrito_id" id="distrito_id">
								<option value="">Escolha </option>
							</select><br>						
						
						
						</div>
						
						<div class="form-group">
							<label> Bairro<span class="text-danger">*</span></label>

							<br>
							<span class="carregando3">Aguarde, carregando...</span>
							<select class="col-lg-10 col-lg-offset-2" name="bairro_id" id="bairro_id">
								<option value="">Escolha </option>
							</select><br>							
						
						</div>							
			
			<input type="submit" value="Cadastrar">
		</form>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		
		<script type="text/javascript">
		$(function(){
			$('#pais_id').change(function(){
				if( $(this).val() ) {
					$('#provincia_id').hide();
					$('.carregando2').show();
					$.getJSON('sub_categorias_post2.php?search=',{pais_id: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha </option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_provincia + '</option>';
						}	
						$('#provincia_id').html(options).show();
						$('.carregando2').hide();
					});
				} else {
					$('#provincia_id').html('<option value="">– Escolha a provincia –</option>');
				}
			});
		});
		</script>

		<script type="text/javascript">
		$(function(){
			$('#provincia_id').change(function(){
				if( $(this).val() ) {
					$('#distrito_id').hide();
					$('.carregando').show();
					$.getJSON('sub_categorias_post.php?search=',{provincia_id: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Subcategoria</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].Nome_Distrito + '</option>';
						}	
						$('#distrito_id').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#distrito_id').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>

		<script type="text/javascript">
		$(function(){
			$('#distrito_id').change(function(){
				if( $(this).val() ) {
					$('#bairro_id').hide();
					$('.carregando3').show();
					$.getJSON('sub_categorias_post3.php?search=',{distrito_id: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Subcategoria</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_bairro + '</option>';
						}	
						$('#bairro_id').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#bairro_id').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>	
		
	</body>
</html>