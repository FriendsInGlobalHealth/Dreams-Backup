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
			<a class="navbar-brand" href="http://localhost/contas/index.php">Inicio</a>
		</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="insertProductos.php">Produtos <span class="sr-only">(current)</span></a></li>

					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stock</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="http://localhost/contas/Loja/index.php">Lojas</a></li>
							<li><a href="http://localhost/contas/Tipos_productos/index.php">Tipos de Produtos</a></li>
							<li><a href="http://localhost/contas/productos/index.php">Produtos</a></li>
							<li><a href="http://localhost/contas/productos/search/index.php">Buscar Produtos</a></li>							
							<li><a href="http://localhost/contas/updating/index.php">Actualizar Produtos</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated Link</a></li>
							<li class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>					
					
					
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Facturacao</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="http://localhost/contas/Loja/index.php">Lojas</a></li>
							<li><a href="http://localhost/contas/Tipos_productos/index.php">Tipos de Produtos</a></li>
							<li><a href="http://localhost/contas/productos/index.php">Efectuar venda</a></li>
							<li><a href="http://localhost/contas/productos/search/index.php">Buscar venda</a></li>							
							<li><a href="http://localhost/contas/updating/index.php">Actualizar venda</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated Link</a></li>
							<li class="divider"></li>
							<li><a href="#">One more separated link</a></li>
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
