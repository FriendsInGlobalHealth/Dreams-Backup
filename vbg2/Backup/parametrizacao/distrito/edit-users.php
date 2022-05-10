<?php include '../header.php';?>
<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('sa_distrito','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($Nome_Distrito==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}

	elseif($pais_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($provincia_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}

	elseif($Estado==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}		
	
	$data	=	array(
					'Nome_Distrito'=>$Nome_Distrito,
					'pais_id'=>$pais_id,
					'provincia_id'=>$provincia_id,
					'Estado'=>$Estado,					
					
					);
	$update	=	$db->update('sa_distrito',$data,array('id'=>$editId));
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
	<title>Distrito</title>
	
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
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Distrito</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Distrito</a></div>
			<div class="card-body">
				
				<div class="col-lg-10 col-lg-offset-2">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label>Name Distrito <span class="text-danger">*</span></label>
							<input type="text" name="Nome_Distrito" id="Nome_Distrito" class="form-control" value="<?php echo $row[0]['Nome_Distrito']; ?>" placeholder="nome do Distrito" required>
						</div>						
						<div class="form-group">
							<label>pais <span class="text-danger">*</span></label>
							<input type="text" name="pais_id" id="pais_id" class="form-control" value="<?php echo $row[0]['pais_id']; ?>" placeholder="name country" required>
						</div>
						<div class="form-group">
							<label>provincia <span class="text-danger">*</span></label>
							<input type="text" name="provincia_id" id="provincia_id" class="form-control" value="<?php echo $row[0]['provincia_id']; ?>" placeholder="provincia_id" required>
						</div>
						<div class="form-group">
							<label>Estado <span class="text-danger">*</span></label>
							<input type="text" name="Estado" id="Estado" class="form-control" value="<?php echo $row[0]['Estado']; ?>" placeholder="Estado" required>
						</div>
					
						
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Distrito</button>
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