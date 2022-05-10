<?php
//header.php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sistema de Avaliação e Monitoria de Desempenho de Cuidados Pos Violência</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">Sistema de Avaliação e Monitoria de </h2>
			<h2 align="center"> Desempenho de Cuidados Pos Violência</h2>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="index.php" class="navbar-brand">Home</a>
					</div>
					<ul class="nav navbar-nav">
					<?php
					if($_SESSION['type'] == 'master')
					{
					?>
						<li><a href="user.php">User</a></li>

						
					<?php
					}
					?>
						<li><a href="evaluation.php">evaluation</a></li>
					</ul>
					
				
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo $_SESSION["user_name"]; ?></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php">Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">				
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo "Configuracao" ?></a>
							<ul class="dropdown-menu">
								<li><a href="criterion_verification.php">Verification criterio</a></li>
								<li><a href="area_padrao.php">Area Padrao</a></li>
								<li><a href="area.php">Area</a></li>
								<li><a href="cargo.php">Cargo</a></li>
								<li><a href="categoria.php">Categoria</a></li>
								<li><a href="country.php">Country</a></li>
								<li><a href="district.php">District</a></li>
								<li><a href="evaluation_type.php">Evaluation Type</a></li> 
								<li><a href="instance.php">Instance</a></li>
								<li><a href="province.php">province</a></li>
								<li><a href="service.php">service</a></li>
								<li><a href="sub_service.php">Sub Service</a></li>
								<li><a href="service.php">service</a></li>								
							</ul>
						</li>
			
						
					</ul>						

				</div>
			</nav>
			