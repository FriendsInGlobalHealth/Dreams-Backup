<?php include '../header.php';?>
<?php include_once('config.php');?>

<?php

/*
	if(empty($_POST['Enviar'])){
		
		$_POST["Enviar"]=0;
	}
$Enviar=$_POST["Enviar"];
	
	if($Enviar)
	{
		$data=$_POST["data"];
		$nome_avaliacao_padrao=$_POST["nome_avaliacao_padrao"];
		$Avaliacao_id=$_POST["Avaliacao_id"];
		$Meio_Verificacao_id=$_POST["Meio_Verificacao_id"];
		$criterio_verificacao_id=$_POST["criterio_verificacao_id"];
		$area_padrao_id=$_POST["area_padrao_id"];
		$resultado=$_POST["resultado"];
		
		echo"ola"+'$data';
	}

*/
?>

<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>

</head>

<body>
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['nome_avaliacao_padrao']) and $_REQUEST['nome_avaliacao_padrao']!=""){
		$condition	.=	' AND nome_avaliacao_padrao LIKE "%'.$_REQUEST['nome_avaliacao_padrao'].'%" ';
	}
	if(isset($_REQUEST['data']) and $_REQUEST['data']!=""){
		$condition	.=	' AND data LIKE "%'.$_REQUEST['data'].'%" ';
	}
	if(isset($_REQUEST['Avaliacao_id']) and $_REQUEST['Avaliacao_id']!=""){
		$condition	.=	' AND Avaliacao_id LIKE "%'.$_REQUEST['Avaliacao_id'].'%" ';
	}
	
	if(isset($_REQUEST['Meio_Verificacao_id']) and $_REQUEST['Meio_Verificacao_id']!=""){
		$condition	.=	' AND Meio_Verificacao_id LIKE "%'.$_REQUEST['Meio_Verificacao_id'].'%" ';
	}
	if(isset($_REQUEST['criterio_verificacao_id']) and $_REQUEST['criterio_verificacao_id']!=""){
		$condition	.=	' AND criterio_verificacao_id LIKE "%'.$_REQUEST['criterio_verificacao_id'].'%" ';
	}
	if(isset($_REQUEST['area_padrao_id']) and $_REQUEST['area_padrao_id']!=""){
		$condition	.=	' AND area_padrao_id LIKE "%'.$_REQUEST['area_padrao_id'].'%" ';
	}
	if(isset($_REQUEST['resultado']) and $_REQUEST['resultado']!=""){
		$condition	.=	' AND resultado LIKE "%'.$_REQUEST['resultado'].'%" ';
	}	
	
	$userData	=	$db->getAllRecords('sa_avaliacao_padrao','*',$condition,'ORDER BY id DESC');
	?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Avaliacao</strong> <a href="add-users.php" class="float-right btn btn-danger btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Avaliacao</a></div>
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
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Avaliacao</h5>
					<form method="get" action="browse-users.php">
						<div class="row">
					
							<div class="col-sm-2">
								<div class="form-group">
									<label>Nome da Avaliacao Padrao</label>
									<input type="text" name="nome_avaliacao_padrao" id="nome_avaliacao_padrao" class="form-control" value="<?php echo isset($_REQUEST['nome_avaliacao_padrao'])?$_REQUEST['nome_avaliacao_padrao']:''?>" placeholder="Nome da Avaliacao Padrao">
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Data</label>
									<input type="text" name="data" id="data" class="form-control" value="<?php echo isset($_REQUEST['data'])?$_REQUEST['data']:''?>" placeholder="Nome da Avaliacao Padrao">
								</div>
							</div>							
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Id da avaliacao</label>
									<input type="email" name="Avaliacao_id" id="Avaliacao_id" class="form-control" value="<?php echo isset($_REQUEST['Avaliacao_id'])?$_REQUEST['Avaliacao_id']:''?>" placeholder="Id da avaliacao">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Meio de Verificar</label>
									<input type="tel" name="Meio_Verificacao_id" id="Meio_Verificacao_id" class="form-control" value="<?php echo isset($_REQUEST['Meio_Verificacao_id'])?$_REQUEST['Meio_Verificacao_id']:''?>" placeholder="Meio de Verificar">
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Criterio de Verificacao</label>
									<input type="tel" name="criterio_verificacao_id" id="criterio_verificacao_id" class="form-control" value="<?php echo isset($_REQUEST['criterio_verificacao_id'])?$_REQUEST['criterio_verificacao_id']:''?>" placeholder="Meio de Verificar">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Area Padrao</label>
									<input type="tel" name="area_padrao_id" id="area_padrao_id" class="form-control" value="<?php echo isset($_REQUEST['area_padrao_id'])?$_REQUEST['area_padrao_id']:''?>" placeholder="Meio de Verificar">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Resultado</label>
									<input type="tel" name="resultado" id="resultado" class="form-control" value="<?php echo isset($_REQUEST['resultado'])?$_REQUEST['resultado']:''?>" placeholder="Meio de Verificar">
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
		</form>
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-danger text-white">
						<th >Nr#</th>					
						<th>Nome da Avaliacao</th>
						<th>Data</th>							
						<th>Id da Avaliacao</th>
						<th>Meio de Verificacao</th>
						<th>Criterio de Verificacao</th>
						<th>Area Padrao</th>
						<th>Resultado</th>						
						<th class="text-center">Action</th>
						<th>Option</th>
						<th >SIM/NAO</th>
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
						<td><?php echo $val['nome_avaliacao_padrao'];?></td>
						<td><?php echo $val['data'];?></td>						
						<td><?php echo $val['Avaliacao_id'];?></td>
						<td><?php echo $val['Meio_Verificacao_id'];?></td>
						<td><?php echo $val['criterio_verificacao_id'];?></td>
						<td><?php echo $val['area_padrao_id'];?></td>
						<td><?php echo $val['resultado'];?></td>						
						<td align="center">
							<a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>
						
						<td><div class="radio">
						<label><input type="radio" name="option" checked>Sim</label>
						</div>
						<div class="radio">
						<label><input type="radio" name="option">Nao</label>
						
						</div></td>
						<td><input type="submit" class="form-group" name="Enviar" value="Enviar"> </td>
			
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		</form>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
	
</body>
</html>