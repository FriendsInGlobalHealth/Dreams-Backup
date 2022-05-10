<?php include '../header.php';?>
<?php include_once('config.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($nome_meio_verificacao==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}
	elseif($resposta==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}
	elseif($estado==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}
	
	elseif($area_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pa');
		exit;
	}elseif($area_padrao_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pro');
		exit;
	}
	
	elseif($criterio_verificacao_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=di');
		exit;
	}	
	
	else{
		
		$data	=	array(
						'nome_meio_verificacao'=>$nome_meio_verificacao,
						'resposta'=>$resposta,
						'estado'=>$estado,
						
						'area_id'=>$area_id,
						'area_padrao_id'=>$area_padrao_id,
						'criterio_verificacao_id'=>$criterio_verificacao_id,						
						
						);
		$insert	=	$db->insert('sa_meio_verificacao',$data);
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
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Meio de Verificacao</title>
	
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
	
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">

			</header>
		</div> <!--/.container-->
	</div>
	
	
   	<div class="container">
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> name is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> latitude is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> logitude is mandatory field!</div>';
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
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again!</div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Meio de Verificaca</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Meio de Verificaca</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label>Name <span class="text-danger">*</span></label>
							<input type="text" name="nome_meio_verificacao" id="nome_meio_verificacao" class="form-control" placeholder="Enter name" required>
						</div>
						<div class="form-group">
							<label>Resposta <span class="text-danger">*</span></label>
							<input type="text" name="resposta" id="resposta" class="form-control" placeholder="Enter Resposta" required>
						</div>
						<div class="form-group">
							<label>estado <span class="text-danger">*</span></label>
							<input type="text" name="estado" id="estado" class="form-control" placeholder="Enter Estado" required>
						</div>
						
						<div class="form-group">
							<label>Area <span class="text-danger">*</span></label>
							<br>
							
							<select class="col-lg-10 col-lg-offset-2" name="area_id" id="area_id" placeholder="Enter user country" required>
								<?php include_once("conexao.php"); ?>

								<option value="">Escolha o Area</option>
								<?php
								
									$result_cat_post = "SELECT * FROM sa_area ORDER BY nome_area";
									$resultado_cat_post = mysqli_query($conn, $result_cat_post);
									while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
										echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_area'].'</option>';
									}
									
								?>
							</select>							
							
							
						</div>
	

						<div class="form-group">
							<label>Area Padrao <span class="text-danger">*</span></label>

							<br>
							<span class="carregando2">Aguarde, carregando...</span>
							<select class="col-lg-10 col-lg-offset-2" name="area_padrao_id" id="area_padrao_id">
								<option value="">Escolha </option>
							</select><br>
						
						</div>
						<div class="form-group">
							<label>Criterio de Verificacao <span class="text-danger">*</span></label>
							
							<br>
							<span class="carregando">Aguarde, carregando...</span>
							<select class="col-lg-10 col-lg-offset-2" name="criterio_verificacao_id" id="criterio_verificacao_id">
								<option value="">Escolha </option>
							</select><br>						
						
						
						</div>					
						<div class="form-group">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add Meio de Verificacao</button>
						</div>
					</form>
				</div>
			</div>
			
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>			
			
		<script type="text/javascript">
		$(function(){
			$('#area_id').change(function(){
				if( $(this).val() ) {
					$('#area_padrao_id').hide();
					$('.carregando2').show();
					$.getJSON('sub_categorias_post2.php?search=',{area_id: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha </option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_area_padrao + '</option>';
						}	
						$('#area_padrao_id').html(options).show();
						$('.carregando2').hide();
					});
				} else {
					$('#area_padrao_id').html('<option value="">– Escolha a provincia –</option>');
				}
			});
		});
		</script>

		<script type="text/javascript">
		$(function(){
			$('#area_padrao_id').change(function(){
				if( $(this).val() ) {
					$('#criterio_verificacao_id').hide();
					$('.carregando').show();
					$.getJSON('sub_categorias_post.php?search=',{area_padrao_id: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Subcategoria</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_criterio  + '</option>';
						}	
						$('#criterio_verificacao_id').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#criterio_verificacao_id').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>			
			
		</div>
	</div>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>