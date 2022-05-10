<?php include '../header.php';?>

<?php include_once('config.php');?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Configuracao de Utilizadores</title>
	
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
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
		$condition	.=	' AND username LIKE "%'.$_REQUEST['username'].'%" ';
	}
	if(isset($_REQUEST['useremail']) and $_REQUEST['useremail']!=""){
		$condition	.=	' AND useremail LIKE "%'.$_REQUEST['useremail'].'%" ';
	}
	if(isset($_REQUEST['userphone']) and $_REQUEST['userphone']!=""){
		$condition	.=	' AND userphone LIKE "%'.$_REQUEST['userphone'].'%" ';
	}
	
	if(isset($_REQUEST['previlegio']) and $_REQUEST['previlegio']!=""){
		$condition	.=	' AND previlegio LIKE "%'.$_REQUEST['previlegio'].'%" ';
	}
	if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
		$condition	.=	' AND email LIKE "%'.$_REQUEST['email'].'%" ';
	}
	if(isset($_REQUEST['senha']) and $_REQUEST['senha']!=""){
		$condition	.=	' AND senha LIKE "%'.$_REQUEST['senha'].'%" ';
	}

	if(isset($_REQUEST['instancia_id']) and $_REQUEST['instancia_id']!=""){
		$condition	.=	' AND instancia_id LIKE "%'.$_REQUEST['instancia_id'].'%" ';
	}
	if(isset($_REQUEST['pais_id']) and $_REQUEST['pais_id']!=""){
		$condition	.=	' AND pais_id LIKE "%'.$_REQUEST['pais_id'].'%" ';
	}
	if(isset($_REQUEST['provincia_id']) and $_REQUEST['provincia_id']!=""){
		$condition	.=	' AND provincia_id LIKE "%'.$_REQUEST['provincia_id'].'%" ';
	}

	if(isset($_REQUEST['distrito_id']) and $_REQUEST['distrito_id']!=""){
		$condition	.=	' AND distrito_id LIKE "%'.$_REQUEST['distrito_id'].'%" ';
	}
	if(isset($_REQUEST['bairro_id']) and $_REQUEST['bairro_id']!=""){
		$condition	.=	' AND bairro_id LIKE "%'.$_REQUEST['bairro_id'].'%" ';
	}

	if(isset($_REQUEST['ponto_focal']) and $_REQUEST['ponto_focal']!=""){
		$condition	.=	' AND ponto_focal LIKE "%'.$_REQUEST['ponto_focal'].'%" ';
	}
	if(isset($_REQUEST['categoria_id']) and $_REQUEST['categoria_id']!=""){
		$condition	.=	' AND categoria_id LIKE "%'.$_REQUEST['categoria_id'].'%" ';
	}
	if(isset($_REQUEST['cargo_id']) and $_REQUEST['cargo_id']!=""){
		$condition	.=	' AND cargo_id LIKE "%'.$_REQUEST['cargo_id'].'%" ';
	}

	if(isset($_REQUEST['local_afecto_id']) and $_REQUEST['local_afecto_id']!=""){
		$condition	.=	' AND local_afecto_id LIKE "%'.$_REQUEST['local_afecto_id'].'%" ';
	}
	if(isset($_REQUEST['nuit']) and $_REQUEST['nuit']!=""){
		$condition	.=	' AND nuit LIKE "%'.$_REQUEST['nuit'].'%" ';
	}	
	
	$userData	=	$db->getAllRecords('sa_users','*',$condition,'ORDER BY id DESC');
	?>
   
	
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="add-users.php" class="float-right btn btn-danger btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Nome</label>
									<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Enter user first name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Apelido</label>
									<input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo isset($_REQUEST['useremail'])?$_REQUEST['useremail']:''?>" placeholder="Enter user surname">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Phone</label>
									<input type="tel" name="userphone" id="userphone" class="form-control" value="<?php echo isset($_REQUEST['userphone'])?$_REQUEST['userphone']:''?>" placeholder="Enter user phone">
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Previlegio</label>
									<input type="text" name="previlegio" id="previlegio" class="form-control" value="<?php echo isset($_REQUEST['previlegio'])?$_REQUEST['previlegio']:''?>" placeholder="Enter validate">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($_REQUEST['email'])?$_REQUEST['email']:''?>" placeholder="Enter user email">
								</div>
							</div>


							<div class="col-sm-2">
								<div class="form-group">
									<label>Instancia</label>
									<input type="text" name="instancia_id" id="instancia_id" class="form-control" value="<?php echo isset($_REQUEST['instancia_id'])?$_REQUEST['instancia_id']:''?>" placeholder="Enter user instancy">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Pais</label>
									<input type="text" name="pais_id" id="pais_id" class="form-control" value="<?php echo isset($_REQUEST['pais_id'])?$_REQUEST['pais_id']:''?>" placeholder="Enter user country">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Provincia</label>
									<input type="text" name="provincia_id" id="provincia_id" class="form-control" value="<?php echo isset($_REQUEST['provincia_id'])?$_REQUEST['provincia_id']:''?>" placeholder="Enter user provincia">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Distrito</label>
									<input type="text" name="distrito_id" id="distrito_id" class="form-control" value="<?php echo isset($_REQUEST['distrito_id'])?$_REQUEST['distrito_id']:''?>" placeholder="Enter Distrit name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Bairro</label>
									<input type="text" name="bairro_id" id="bairro_id" class="form-control" value="<?php echo isset($_REQUEST['bairro_id'])?$_REQUEST['bairro_id']:''?>" placeholder="Enter bairro">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Local Afecto</label>
									<input type="text" name="local_afecto_id" id="local_afecto_id" class="form-control" value="<?php echo isset($_REQUEST['local_afecto_id'])?$_REQUEST['local_afecto_id']:''?>" placeholder="Enter user Location">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Nuit</label>
									<input type="text" name="nuit" id="nuit" class="form-control" value="<?php echo isset($_REQUEST['nuit'])?$_REQUEST['nuit']:''?>" placeholder="Enter user nuit">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Ponto Focal</label>
									<input type="text" name="ponto_focal" id="ponto_focal" class="form-control" value="<?php echo isset($_REQUEST['ponto_focal'])?$_REQUEST['ponto_focal']:''?>" placeholder="Enter user Ponto Focal">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Categoria</label>
									<input type="text" name="categoria_id" id="categoria_id" class="form-control" value="<?php echo isset($_REQUEST['categoria_id'])?$_REQUEST['categoria_id']:''?>" placeholder="Enter Categoria name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Cargo</label>
									<input type="text" name="cargo_id" id="cargo_id" class="form-control" value="<?php echo isset($_REQUEST['cargo_id'])?$_REQUEST['cargo_id']:''?>" placeholder="Enter position">
								</div>
							</div>								
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div><button type="submit" name="submit" value="search" id="submit" class="btn btn-danger"><i class="fa fa-fw fa-search"></i> Search</button></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-danger text-white">
						<th>Sr#</th>
						<th>Nome</th>
						<th>Apelido</th>
						<th>Phone</th>
						<th>Previlegio</th>
						<th>Email</th>
						<th>Senha</th>
						<th>Instancia</th>
						<th>Pais</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th>Bairro</th>

						<th>Ponto Focal</th>
						<th>Categoria</th>
						<th>Cargo</th>
						<th>Local Afecto</th>
						<th>Nuit</th>							
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$s	=	'';
					foreach($userData as $val){
						$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['username'];?></td>
						<td><?php echo $val['useremail'];?></td>
						<td><?php echo $val['userphone'];?></td>
						<td><?php echo $val['previlegio'];?></td>
						<td><?php echo $val['email'];?></td>
						<td><?php echo $val['senha'];?></td>
						<td><?php echo $val['instancia_id'];?></td>
						<td><?php echo $val['pais_id'];?></td>
						<td><?php echo $val['provincia_id'];?></td>
						<td><?php echo $val['distrito_id'];?></td>
						<td><?php echo $val['bairro_id'];?></td>

						<td><?php echo $val['ponto_focal'];?></td>
						<td><?php echo $val['categoria_id'];?></td>
						<td><?php echo $val['cargo_id'];?></td>
						<td><?php echo $val['local_afecto_id'];?></td>
						<td><?php echo $val['nuit'];?></td>
						
						<td align="center">
							<a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-dark"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>