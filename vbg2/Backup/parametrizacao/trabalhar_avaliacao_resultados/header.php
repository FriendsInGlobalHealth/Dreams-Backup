<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="UTF-8">
	<title>Same Page Property</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="JavaScript" type="text/js" href="jquery.js">
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar">
				<span class="sr-only">Toggle navigation</span>
				<span <class="icon-bar"></span>
				<span <class="icon-bar"></span>
				<span <class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://localhost/tarv/">Inicio</a>
		</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="cadastro.php">CADASTRO <span class="sr-only">(current)</span></a></li>

					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SERVICOS</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="BUSCAS/index.php">BUSCAS</a></li>
							<li><a href="index.php">APSS</a></li>
							<li><a href="index.php">LINHAS Terapeuticas</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated Link</a></li>
							<li class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>					

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">FILTRAGEM</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="http://localhost/tarv/filtros/pacientes/index.php">PACIENTES REGISTADOS</a></li>
							<li><a href="http://localhost/tarv/filtros/buscas/index.php">BUSCAS FEITAS</a></li>
							<li><a href="http://localhost/tarv/filtros/2linha/index.php">PEDIDO DE 2 LINHA</a></li>
							<li><a href="http://localhost/tarv/filtros/3linha/index.php">PEDIDO DE 3 LINHA</a></li>
							<li><a href="http://localhost/tarv/filtros/APSS/index.php"> APSS REGISTADOS</a></li>							
						</ul>
					</li>	
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">DEFINICOES</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="http://localhost/tarv/bairro/index.php">BAIRROS</a></li>
							<li><a href="http://localhost/tarv/residencia/index.php">RESIDENCIAS</a></li>
							<li><a href="http://localhost/tarv/resultado_buscas/index.php">RESULTADO DE BUSCAS</a></li>
						</ul>
					</li>	

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</ul>
			</div>
		</div>
