<?php include '../header.php';?>
<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('sa_avaliacao_padrao','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($data==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ud&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($nome_avaliacao_padrao==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($Avaliacao_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ua&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($Meio_Verificacao_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=um&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($criterio_verificacao_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=uc&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($area_padrao_id==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}	
	elseif($resultado==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ur&editId='.$_REQUEST['editId']);
		exit;
	}
	
	$data	=	array(
					'data'=>$data,
					'nome_avaliacao_padrao'=>$nome_avaliacao_padrao,
					'Avaliacao_id'=>$Avaliacao_id,
					'Meio_Verificacao_id'=>$Meio_Verificacao_id,
					'criterio_verificacao_id'=>$criterio_verificacao_id,
					'area_padrao_id'=>$area_padrao_id,
					'resultado'=>$resultado,						
					);
	$update	=	$db->update('sa_avaliacao_padrao',$data,array('id'=>$editId));
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

</head>

<body>
	

	
	
   	<div class="container">

		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ud"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Data is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Nome da Avaliacao is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ua"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Avaliacao id is mandatory field!</div>';
		}
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="um"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Meio de Verificacao is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="uc"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Criterio de Verificacao is mandatory field!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Area Padrao is mandatory field!</div>';
		}		
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ur"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Resultado is mandatory!</div>';
		}		
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}
		
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Avaliacoes</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
							<div class="col-sm-28">
								<div class="form-group">
									<label>Nome da Avaliacao Padrao</label>
									<input type="text" name="nome_avaliacao_padrao" id="nome_avaliacao_padrao" class="form-control" value="<?php echo isset($_REQUEST['nome_avaliacao_padrao'])?$_REQUEST['nome_avaliacao_padrao']:''?>" placeholder="Nome da Avaliacao Padrao">
								</div>
							</div>
							
							<div class="col-sm-28">
								<div class="form-group">
									<label>Data</label>
									<input type="date" name="data" id="data" class="form-control" value="<?php echo isset($_REQUEST['data'])?$_REQUEST['data']:''?>" placeholder="Data">
								</div>
							</div>							
							
							<div class="col-sm-28">
								<div class="form-group">
									<label>Id da avaliacao</label>
									<input type="text" name="Avaliacao_id" id="Avaliacao_id" class="form-control" value="<?php echo isset($_REQUEST['Avaliacao_id'])?$_REQUEST['Avaliacao_id']:''?>" placeholder="Id da avaliacao">
								</div>
							</div>
							<div class="col-sm-28">
								<div class="form-group">
									<label>Meio de Verificar</label>
									<input type="text" name="Meio_Verificacao_id" id="Meio_Verificacao_id" class="form-control" value="<?php echo isset($_REQUEST['Meio_Verificacao_id'])?$_REQUEST['Meio_Verificacao_id']:''?>" placeholder="Meio de Verificar">
								</div>
							</div>
							
							<div class="col-sm-28">
								<div class="form-group">
									<label>Criterio de Verificacao</label>
									<input type="text" name="criterio_verificacao_id" id="criterio_verificacao_id" class="form-control" value="<?php echo isset($_REQUEST['criterio_verificacao_id'])?$_REQUEST['criterio_verificacao_id']:''?>" placeholder="Criterio de Verificar">
								</div>
							</div>

							<div class="col-sm-28">
								<div class="form-group">
									<label>Area Padrao</label>
									<input type="text" name="area_padrao_id" id="area_padrao_id" class="form-control" value="<?php echo isset($_REQUEST['area_padrao_id'])?$_REQUEST['area_padrao_id']:''?>" placeholder="Area Padrao">
								</div>
							</div>

							<div class="col-sm-28">
								<div class="form-group">
									<label>Resultado</label>
									<input type="text" name="resultado" id="resultado" class="form-control" value="<?php echo isset($_REQUEST['resultado'])?$_REQUEST['resultado']:''?>" placeholder="Resultado">
								</div>
							</div>	
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
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