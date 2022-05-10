<?php
 ini_set('default_charset','UTF-8');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
        
  <title></title>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
  <title>IMD | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  


  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>BV</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>IMD</b>GBV</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        
						<img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Instrumento de Medição de Desempenho                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        
						<img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        
						<img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        
						<img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>


          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
			   <img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
			  
              <span class="hidden-xs"><?php echo $_SESSION["user_name"];	?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  <img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
                

                <p>
                  <?php echo $_SESSION["user_name"];	?>
                  <small>GBV</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Jhpiego</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a  href="#" >GBV</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Mozambique</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/vbg_logo.png" height="40px" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["user_name"];	?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><i class="fa fa-navicon"></i> MENU PRINCIPAL</li>
        <li class="active treeview menu-open">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>    
        </li>
        
           <li>
          <a href="avaliacao_visualizar.php">
            <i class="fa fa-th"></i> <span>Avalia&ccedil;&otilde;es</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">nova</small>
            </span>
          </a>
        </li>
        
           <li class="header"> 
            <i class="fa fa-cogs"></i> <span>Configurações</span>
        </li>
        
                <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>Geográficas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="country.php"><i class="fa fa-map"></i> Países</a></li>
            <li><a href="province.php"><i class="fa fa-map-pin"></i> Províncias</a></li>
            <li><a href="district.php"><i class="fa fa-map-pin"></i> Distritos</a></li>
            <li><a href="#"><i class="fa fa-map-pin"></i> Localidades</a></li>
            <li><a href="neighborhood.php"><i class="fa fa-map-pin"></i> Bairros</a></li>
             <li><a href="instance.php"><i class="fa fa-hospital-o"></i> Instance</a></li> 
			<li><a href="placeaffection.php"><i class="fa fa-hospital-o"></i> US or Local Afecto</a></li> 
          </ul>
        </li>
        
          <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Avaliações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="area.php"><i class="fa fa-circle-o"></i> Áreas em Avaliação</a></li>
            <li><a href="criterion_verification.php"><i class="fa fa-circle-o"></i> Critérios de Avaliações</a></li>
            <li><a href="intervention_plan.php"><i class="fa fa-circle-o"></i> Plano de Intervenção</a></li>
            	<li><a href="cause_plan.php"><i class="fa fa-circle-o"></i> Plano Causa</a></li>
			<li><a href="cause_type.php"><i class="fa fa-circle-o"></i> Plano Causa Tipo</a></li>
            <li><a href="area_padrao.php"><i class="fa fa-circle-o"></i> Padrões</a></li>
            <li><a href="?r=meios-verificacao"><i class="fa fa-circle-o"></i> Meios de Verificação</a></li>
            <li><a href="evaluation_type.php"><i class="fa fa-circle-o"></i> Tipos de Avaliação</a></li>
            <li><a href="period_plan.php"><i class="fa fa-circle-o"></i> Períodos de Resolução</a></li>
            
            
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator"></i>
            <span>Serviços</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="service.php"><i class="fa fa-cog"></i> Serviços</a></li>
            <li><a href="sub_service.php"><i class="fa fa-cog"></i> Sub-Serviços</a></li>
          </ul>
        </li> 
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Relatórios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Provinciais</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Distritais</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Por US</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Por Parceiro</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Por Provedor</a></li>
          </ul>
        </li>
        <li class="header"><i class="fa fa-users text-red"></i> <span> Gestao de Utilizadores </span></li>
        <li><a href="user.php"><i class="fa fa-user-plus text-green"></i> <span>Lista de Utilizadores</span></a></li>
      <li class="header">Categorias Profissionais</li>
         <li><a href="cargo.php"><i class="fa fa-circle-o"></i> Cargos</a></li>
        <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categorias</a></li>
       
 

        <li class="header">Documentação</li>
        <li><a href="#"><i class="fa fa-book text-green"></i> <span>Manuais de Suporte</span></a></li>
        <li><a href="#"><i class="fa fa-laptop text-red"></i> <span>Manual do utilizador</span></a></li>
        <li><a href="#"><i class="fa fa-graduation-cap text-yellow"></i> <span>Suporte Educacional</span></a></li>
    
        
      <!--  
        
        <li class="header">Avaliações</li>
       
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Avaliações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> 
		  
            <li class="active"><a href="avaliacao_visualizar.php"><i class="fa fa-circle-o"></i> Visualizar Avaliações</a></li>
          </ul>
        </li>
  

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Configurações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="area.php"><i class="fa fa-circle-o"></i> Area</a></li>
            <li><a href="area_padrao.php"><i class="fa fa-circle-o"></i> Area Padrao</a></li>
			<li><a href="criterion_verification.php"><i class="fa fa-circle-o"></i> Critério de verificação</a></li>
            <li><a href="evaluation_type.php"><i class="fa fa-circle-o"></i> Tipo de Avaliações</a></li> 
            <li><a href="period_plan.php"><i class="fa fa-circle-o"></i> Plano Periodo</a></li>
			<li><a href="cause_plan.php"><i class="fa fa-circle-o"></i> Plano Causa</a></li>
			<li><a href="cause_type.php"><i class="fa fa-circle-o"></i> Plano Causa Tipo</a></li>
			<li><a href="intervention_plan.php"><i class="fa fa-circle-o"></i> Plano Intervencao</a></li>
            <li><a href="cargo.php"><i class="fa fa-circle-o"></i> Cargo</a></li>
            <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categoria</a></li>
			
            <li><a href="country.php"><i class="fa fa-circle-o"></i> Pais</a></li>
            <li><a href="province.php"><i class="fa fa-circle-o"></i> province</a></li>
            <li><a href="district.php"><i class="fa fa-circle-o"></i> Distrito</a></li> 
			<li><a href="neighborhood.php"><i class="fa fa-circle-o"></i> Bairro</a></li>
            <li><a href="instance.php"><i class="fa fa-circle-o"></i> Instance</a></li> 
			<li><a href="placeaffection.php"><i class="fa fa-circle-o"></i> US or Local Afecto</a></li>  
            <li><a href="service.php"><i class="fa fa-circle-o"></i> Service</a></li>
            <li><a href="sub_service.php"><i class="fa fa-circle-o"></i> Sub Service</a></li>
          </ul>
        </li>
    -->    
        
     <!--   
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Utilizadores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="user.php"><i class="fa fa-users text-red"></i> Utilizadores</a></li>

          </ul>
        </li>
        <li><a href="#"><i class="fa fa-book text-blue"></i> <span>Manual do Utilizador</span></a></li>
-->
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) 

   <section class="content-header">
      <h1>
        Sistema de Avaliação e Monitoria de Desempenho de Cuidados Pós Violência
       
      </h1>
	 

	   
    </section>
-->
    <!-- Main content -->

    <!-- /.content -->
  



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


  
</body>
</html>
