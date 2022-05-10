<?php include("conexao.php");

if(isset($_POST['email']) && strlen($_POST['email']) > 0){
	
	if(!isset($_SESSION))
		session_start();
	
	$_SESSION['email'] = $mysqli->escape_string($_POST['email']);
	$_SESSION['senha'] = $mysqli->escape_string($_POST['senha']);
	
	$sql_code = "SELECT senha, email FROM sa_users WHERE email='$_SESSION[email]' AND senha='$_SESSION[senha]' ";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$dado = $sql_query->fetch_assoc();
	$total = $sql_query->num_rows;
	
	if($total == 0){
		$erro[] = "Este email nao pertence a nenhum usuario";
	}
	else
	{
		if($dado['senha'] == $_SESSION['senha']){
		$_SESSION['email'] = $dado['email'];
		
	
		}else{
		
		$erro[] = "senha incorreta.";
		$erro[] = "Usuario reconhecido incorreta.";
		}
	}
	
	if(count($erro) == 0 || !isset($erro))
	{
		echo"<script>alert('Login efetuado com sucesso');location.href='index.php';</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IBL - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block "> <img src="img/login.png" height="518px"> </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"> Bem-vindo ao  Sistema de Avaliação e Monitoria de Desempenho de Cuidados Pós Violência</h1>
                  </div>
                  <form class="user" name="forml" method="post" action="">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="senha" id="senha" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
					
            					<div class="form-group">
            						<input name="Login" class="btn btn-danger btn-user btn-block" type="submit" required="required" class="button" id="Login" placeholder="Email"
            						value="Autenticar">
            					</div>					
					
                    <hr>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
