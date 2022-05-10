<?php include '../header.php';?>
<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('sa_users','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	
	elseif($previlegio==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pr&editId='.$_REQUEST['editId']);
		exit;
	}elseif($email==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=em&editId='.$_REQUEST['editId']);
		exit;
	}
	
	elseif($senha==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=se&editId='.$_REQUEST['editId']);
		exit;
	}elseif($instancia_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=in&editId='.$_REQUEST['editId']);
		exit;
	}
	
	elseif($pais_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pa&editId='.$_REQUEST['editId']);
		exit;
	}elseif($provincia_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=pro&editId='.$_REQUEST['editId']);
		exit;
	}
	
	elseif($distrito_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=di&editId='.$_REQUEST['editId']);
		exit;
	}elseif($bairro_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ba&editId='.$_REQUEST['editId']);
		exit;
	}	
	
	
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
					);
	$update	=	$db->update('sa_users',$data,array('id'=>$editId));
	if($update){
		header('location: browse-users.php?msg=rus');
		exit;
	}else{
		header('location: browse-users.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>IMD</title>
	
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
	

	
	
   	<div class="container">
		
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> First name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Surname is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
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
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="browse-users.php" class="float-right btn btn-danger btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label>Nome <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" value="<?php echo $row[0]['username']; ?>" placeholder="Enter user name" required>
						</div>
						<div class="form-group">
							<label>Apelido <span class="text-danger">*</span></label>
							<input type="text" name="useremail" id="useremail" class="form-control" value="<?php echo $row[0]['useremail']; ?>" placeholder="Enter user surname" required>
						</div>
						<div class="form-group">
							<label>Phone <span class="text-danger">*</span></label>
							<input type="tel" name="userphone" id="userphone" maxlength="12" class="form-control" value="<?php echo $row[0]['userphone']; ?>" placeholder="Enter user phone" required>
						</div>
						
						<div class="form-group">
							<label>Previlegio <span class="text-danger">*</span></label>
							<input type="text" name="previlegio" id="previlegio" class="form-control" value="<?php echo $row[0]['previlegio']; ?>" placeholder="Enter user Permission" required>
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="text" name="email" id="email" class="form-control" value="<?php echo $row[0]['email']; ?>" placeholder="Enter user email" required>
						</div>
						<div class="form-group">
							<label>Senha <span class="text-danger">*</span></label>
							<input type="password" name="senha" id="senha" class="form-control" value="<?php echo $row[0]['senha']; ?>" placeholder="Enter user password" required>
						</div>
						<div class="form-group">
							<label>instancia <span class="text-danger">*</span></label>
							<input type="text" name="instancia_id" id="instancia_id" class="form-control" value="<?php echo $row[0]['instancia_id']; ?>" placeholder="Enter user instancia " required>
						</div>
						<div class="form-group">
							<label>Pais  <span class="text-danger">*</span></label>
							<input type="text" name="pais_id" id="pais_id" class="form-control" value="<?php echo $row[0]['pais_id']; ?>" placeholder="Enter user Country" required>
						</div>
						<div class="form-group">
							<label>Provincia <span class="text-danger">*</span></label>
							<input type="text" name="provincia_id" id="provincia_id" class="form-control" value="<?php echo $row[0]['provincia_id']; ?>" placeholder="Enter user Provinci" required>
						</div>
						<div class="form-group">
							<label>Distrito <span class="text-danger">*</span></label>
							<input type="text" name="distrito_id" id="distrito_id" class="form-control" value="<?php echo $row[0]['distrito_id']; ?>" placeholder="Enter user didtrite" required>
						</div>

						<div class="form-group">
							<label>Bairro <span class="text-danger">*</span></label>
							<input type="text" name="bairro_id" id="bairro_id" class="form-control" value="<?php echo $row[0]['bairro_id']; ?>" placeholder="Enter user location" required>
						</div>

						<div class="form-group">
							<label>Ponto Focal <span class="text-danger">*</span></label>
							<input type="text" name="ponto_focal" id="ponto_focal" class="form-control" value="<?php echo $row[0]['ponto_focal']; ?>" placeholder="Enter user ponto focal" required>
						</div>
						
						<div class="form-group">
							<label>Categoria <span class="text-danger">*</span></label>
							<input type="text" name="categoria_id" id="categoria_id" class="form-control" value="<?php echo $row[0]['categoria_id']; ?>" placeholder="Enter user Categoria" required>
						</div>

						<div class="form-group">
							<label>Cargo <span class="text-danger">*</span></label>
							<input type="text" name="cargo_id" id="cargo_id" class="form-control" value="<?php echo $row[0]['cargo_id']; ?>" placeholder="Enter user Cargo" required>
						</div>

						<div class="form-group">
							<label>Bairro <span class="text-danger">*</span></label>
							<input type="text" name="local_afecto_id" id="local_afecto_id" class="form-control" value="<?php echo $row[0]['local_afecto_id']; ?>" placeholder="Enter user local afecto" required>
						</div>

						<div class="form-group">
							<label>Nuit <span class="text-danger">*</span></label>
							<input type="text" name="nuit" id="nuit" class="form-control" value="<?php echo $row[0]['nuit']; ?>" placeholder="Enter user Nuit" required>
						</div>						
						
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-danger"><i class="fa fa-fw fa-edit"></i> Update User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>