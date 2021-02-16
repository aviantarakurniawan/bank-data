<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | 404</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css' ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <!-- Header -->
      <?php $this->load->view('backend/v_header'); ?>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="<?php echo base_url().'backend/dashboard' ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url().'backend/pengguna' ?>">
                <i class="fa fa-users"></i> <span>Pengguna</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url().'backend/pertanyaan' ?>">
                <i class="fa fa-clipboard"></i> <span>Master Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'backend/pertanyaan' ?>"><i class="fa fa-list-alt"></i>Pertanyaan</a></li>
                <li><a href="<?php echo base_url().'backend/kategori' ?>"><i class="fa fa-gears"></i>Kategori</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            404 Error Page
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">404 error</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
              <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href='<?php echo base_url().'backend/dashboard' ?>'>return to dashboard</a>
              </p>
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Footer -->
      <?php $this->load->view('backend/v_footer'); ?>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.3.min.js' ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js' ?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js' ?>" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'assets/dist/js/demo.js' ?>" type="text/javascript"></script>
  </body>
</html>
