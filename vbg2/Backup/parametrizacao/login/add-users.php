<?php include '../header.php';?>
<?php include ("conexao.php"); ?>

<?php include_once('config.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}
	
	elseif($previlegio==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pr');
		exit;
	}elseif($email==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=em');
		exit;
	}
	
	elseif($senha==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=se');
		exit;
	}elseif($instancia_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=in');
		exit;
	}
	
	elseif($pais_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pa');
		exit;
	}elseif($provincia_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pro');
		exit;
	}
	
	elseif($distrito_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=di');
		exit;
	}elseif($bairro_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ba');
		exit;
	}
	
	
elseif($ponto_focal==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pf');
		exit;
	}
	
	elseif($categoria_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ct');
		exit;
	}elseif($cargo_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=cad');
		exit;
	}
	
	elseif($local_afecto_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=lai');
		exit;
	}elseif($nuit==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=nt');
		exit;
	}	
	
	
	
	else{
		
		$data	=	array(
						'username'=>$username,
						'useremail'=>$useremail,
						'userphone'=>$userphone,
						'previlegio'=>$previlegio,
						'email'=>$email,
						'senha'=>$senha,
						'instancia_id'=>$instancia_id,
						'pais_id'=>$pais_id,
						'provincia_id'=>$provincia_id,	
						'distrito_id'=>$distrito_id,
						'bairro_id'=>$bairro_id,
						'ponto_focal'=>$ponto_focal,
						'categoria_id'=>$categoria_id,
						'cargo_id'=>$cargo_id,	
						'local_afecto_id'=>$local_afecto_id,
						'nuit'=>$nuit,						
						);
		$insert	=	$db->insert('sa_users',$data);
		if($insert){
			header('location:'.$_SERVER['PHP_SELF'].'?msg=ras');
			exit;
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=rna');
			exit;
		}
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Utilizadores</title>		
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

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Configuracao de Utilizador</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->	
	
	</head>
	<body>
		
		<?php include_once("conexao.php"); ?>
	<div class="container">
	
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Firt Name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Surname is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Surname is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="pr"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> previlegio is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="em"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Email is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="se"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User password is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="in"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User instanci is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="pa"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User country is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="pro"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User provinci is mandatory field!</div>';
		}

		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="di"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User distrit is mandatory field!</div>';
		}		
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ba"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User location is mandatory field!</div>';
		}

		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="pf"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> ponto focal is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ct"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> categoria is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="cad"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Cargo is mandatory field!</div>';
		}

		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="lai"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Local Afecto is mandatory field!</div>';
		}		
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="nt"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Nuit is mandatory field!</div>';
		}	
		
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again!</div>';
		}
		?>	
	
	
	<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="browse-users.php" class="float-right btn btn-danger btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
		
		<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
		
		<form method="POST" >
						<div class="form-group">
							<label>Primeiro Nome <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" placeholder="First name" required>
						</div>
						<div class="form-group">
							<label>Apelido <span class="text-danger">*</span></label>
							<input type="text" name="useremail" id="useremail" class="form-control" placeholder="Surname" required>
						</div>
						
						<div class="form-group">
							<label>Nuit <span class="text-danger">*</span></label>
							<input type="text" name="nuit" id="nuit" class="form-control" placeholder="nuit" required>
						</div>						
						
						<div class="form-group">
							<label>Phone <span class="text-danger">*</span></label>
							<input type="tel" name="userphone" id="userphone" class="form-control" placeholder="Enter user phone" required>
						</div>
						<div class="form-group">
							<label>Privilegio <span class="text-danger">*</span></label>
							<br>
							<select class="col-lg-10 col-lg-offset-2" name="previlegio" id="previlegio" required>
								<option value="">Escolha o Privilegio</option>
								<?php
									$result_cat_post = "SELECT * FROM sa_previlegio ORDER BY nome_previlegio";
									$resultado_cat_post = mysqli_query($conn, $result_cat_post);
									while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
										echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_previlegio'].'</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="email" name="email" id="email" class="form-control" placeholder="Enter user email" required>
						</div>
						<div class="form-group">
							<label>Senha <span class="text-danger">*</span></label>
							<input type="password" name="senha" id="senha" class="form-control" placeholder="Enter user Password" required>
						</div>
						<div class="form-group">
							<label> Instancia<span class="text-danger">*</span></label>
														<br>
							<select class="col-lg-10 col-lg-offset-2" name="instancia_id" id="instancia_id" placeholder="Enter Instancy" required>
								<?php include_once("conexao.php"); ?>

								<option value="">Escolha a Instancia</option>
								<?php
									$result_cat_post = "SELECT * FROM sa_instancia ORDER BY nome_instancia";
									$resultado_cat_post = mysqli_query($conn, $result_cat_post);
									while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
										echo '<option value="'.$row_cat_post['id_I'].'">'.$row_cat_post['nome_instancia'].'</option>';
									}
								?>
							</select>	
						</div>
						
						<div class="form-group">
							<label> Local Afecto<span class="text-danger">*</span></label>
														<br>
							<span class="carregando4">Aguarde, carregando...</span>
							<select class="col-lg-10 col-lg-offset-2" name="local_afecto_id" id="local_afecto_id">
								<option value="">Escolha </option>
							</select><br>
							
						</div>						
						
						<div class="form-group">
							<label> Cargo<span class="text-danger">*</span></label>
														<br>
							<select class="col-lg-10 col-lg-offset-2" name="cargo_id" id="cargo_id" placeholder="Enter Instancy" required>
								<?php include_once("conexao.php"); ?>

								<option value="">Escolha o cargo</option>
								<?php
								//padrao
									$result_cat_post = "SELECT * FROM sa_cargo ORDER BY nome_cargo";
									$resultado_cat_post = mysqli_query($conn, $result_cat_post);
									while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
										echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_cargo'].'</option>';
									}
									//criterio
								?>
							</select>	
						</div>

						<div class="form-group">
							<label> Categoria<span class="text-danger">*</span></label>
														<br>
							<select class="col-lg-10 col-lg-offset-2" name="categoria_id" id="categoria_id" placeholder="Enter Instancy" required>
								<?php include_once("conexao.php"); ?>

								<option value="">Escolha a categoria</option>
								<?php
								//padrao
									$result_cat_post = "SELECT * FROM sa_categoria ORDER BY nome_categoria";
									$resultado_cat_post = mysqli_query($conn, $result_cat_post);
									while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
										echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_categoria'].'</option>';
									}
									//criterio
								?>
							</select>	
						</div>
						
						<div class="form-group">
							<label> Ponto Focal<span class="text-danger">*</span></label>
														<br>
							  <input type="radio" id="ponto_focal" name="ponto_focal" value="1"> Sim<br>
							  <input type="radio" id="ponto_focal" name="ponto_focal" value="2"> Nao<br>	
						</div>						
						
			<br>
						<div class="form-group">
							<label>Pais <span class="text-danger">*</span></label>
							<br>
							
							<select class="col-lg-10 col-lg-offset-2" name="pais_id" id="pais_id" placeholder="Enter user country" required>
								<?php include_once("conexao.php"); ?>

								<option value="">Escolha o Pais</option>
								<?php
								
									$result_cat_post = "SELECT * FROM sa_pais ORDER BY nome_pais";
									$resultado_cat_post = mysqli_query($conn, $result_cat_post);
									while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
										echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_pais'].'</option>';
									}
									
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
			<button type="submit" name="submit" value="submit" id="submit" class="btn btn-danger"><i class="fa fa-fw fa-plus-circle"></i> Add user</button>
			
		</form>
		</div>
	</div>	
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
		
		<script type="text/javascript">
		$(function(){
			$('#instancia_id').change(function(){
				if( $(this).val() ) {
					$('#local_afecto_id').hide();
					$('.carregando4').show();
					$.getJSON('sub_categorias_post4.php?search=',{instancia_id: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Subcategoria</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_local + '</option>';
						}	
						$('#local_afecto_id').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#local_afecto_id').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>

		
		
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   		
		
	</body>
</html>