<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url().'assets/plugins/iCheck/flat/blue.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url().'assets/plugins/morris/morris.css' ?>" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker-bs3.css' ?>" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ?>" rel="stylesheet" type="text/css" />

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
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url().'backend/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $admin; ?></h3>
                  <p>Admin</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="<?php echo base_url().'backend/pengguna' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $kategori; ?></h3>
                  <p>Kategori</p>
                </div>
                <div class="icon">
                  <i class="ion ion-gear-a"></i>
                </div>
                <a href="<?php echo base_url().'backend/kategori' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $pertanyaan; ?></h3>
                  <p>Data pertanyaan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="<?php echo base_url().'backend/pertanyaan' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <!-- Footer -->
      <?php $this->load->view('backend/v_footer'); ?>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.3.min.js' ?>"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js' ?>" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url().'assets/plugins/morris/morris.min.js" type="text/javascript' ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js' ?>" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ?>" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url().'assets/plugins/knob/jquery.knob.js' ?>" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js' ?>" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js' ?>" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js' ?>" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js' ?>" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url().'assets/dist/js/pages/dashboard.js' ?>" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'assets/dist/js/demo.js' ?>" type="text/javascript"></script>
  </body>
</html>