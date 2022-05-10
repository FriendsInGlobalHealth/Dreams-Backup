<?php include '../header.php';?>
<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('sa_criterio_verificacao','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($nome_criterio==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}

	elseif($area_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($id_ar==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}

	elseif($Estado==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}		
	
	$data	=	array(
					'nome_criterio'=>$nome_criterio,
					'area_id'=>$area_id,
					'id_ar'=>$id_ar,
					'Estado'=>$Estado,					
					
					);
	$update	=	$db->update('sa_criterio_verificacao',$data,array('id'=>$editId));
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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Criterio de Verificacao</title>
	
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
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Criterio de Verificacao</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Criterio de Verificacao</a></div>
			<div class="card-body">
				
				<div class="col-lg-10 col-lg-offset-2">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label>Name Criterio de Verificacao <span class="text-danger">*</span></label>
							<input type="text" name="nome_criterio" id="nome_criterio" class="form-control" value="<?php echo $row[0]['nome_criterio']; ?>" placeholder="nome do Criterio de Verificacao" required>
						</div>						
						<div class="form-group">
							<label>Area <span class="text-danger">*</span></label>
							<input type="text" name="area_id" id="area_id" class="form-control" value="<?php echo $row[0]['area_id']; ?>" placeholder="name country" required>
						</div>
						<div class="form-group">
							<label>Area Padrao <span class="text-danger">*</span></label>
							<input type="text" name="id_ar" id="id_ar" class="form-control" value="<?php echo $row[0]['id_ar']; ?>" placeholder="id_ar" required>
						</div>
						<div class="form-group">
							<label>Estado <span class="text-danger">*</span></label>
							<input type="text" name="Estado" id="Estado" class="form-control" value="<?php echo $row[0]['Estado']; ?>" placeholder="Estado" required>
						</div>
					
						
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Criterio de Verificacao</button>
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