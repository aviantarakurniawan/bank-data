<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | Kategori</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css' ?>" rel="stylesheet" type="text/css" />
    <!-- Toast -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

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
            <li class="treeview">
              <a href="<?php echo base_url().'backend/dashboard' ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url().'backend/pengguna' ?>">
                <i class="fa fa-users"></i> <span>Pengguna</span>
              </a>
            </li>
            <li class="treeview active">
              <a href="<?php echo base_url().'backend/pertanyaan' ?>">
                <i class="fa fa-clipboard"></i> <span>Master Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url().'backend/pertanyaan' ?>"><i class="fa fa-list-alt"></i>Pertanyaan</a></li>
                <li class="active"><a href="<?php echo base_url().'backend/kategori' ?>"><i class="fa fa-gears"></i>Kategori</a></li>
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
            Kategori Pertanyaan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kategori</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Kategori</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori Pertanyaan</th>
                        <th style="text-align:center; width: 120px;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=0;
                          foreach($data->result_array() as $a):
                              $no++;
                              $id=$a['id_kategori'];
                              $nama_kategori=$a['nama_kategori'];
                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nama_kategori;?></td>
                        <td style="text-align:center; width: 120px;">
                          <a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                          <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <!-- Footer -->
      <?php $this->load->view('backend/v_footer') ?>

    </div><!-- ./wrapper -->

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Kategori</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/kategori/simpan_kategori'?>" enctype="multipart/form-data">
            <div class="modal-body">
              
              <div class="form-group">
                  <label class="control-label col-xs-3" >Nama Kategori</label>
                  <div class="col-xs-8">
                      <input name="nama_kategori" class="form-control" type="text" placeholder="Nama Kategori" required>
                  </div>
              </div>

            </div>
          
            <div class="modal-footer">
              <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
              <button class="btn btn-primary btn-flat">Simpan</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Ubah Kategori -->
    <?php
      $no=0;
      foreach ($data->result_array() as $a):
        $no++;
        $id=$a['id_kategori'];
        $nama_kategori=$a['nama_kategori'];
    ?>
    <div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Kategori</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/kategori/update_kategori'?>" enctype="multipart/form-data">
            <div class="modal-body">
              
              <div class="form-group">
                  <label class="control-label col-xs-3" >Nama Kategori</label>
                  <div class="col-xs-8">
                      <input name="nama_kategori" value="<?php echo $nama_kategori;?>" class="form-control" type="text" placeholder="Nama Kategori" required>
                  </div>
              </div>

            </div>
          
            <div class="modal-footer">
              <input type="hidden" name="kode" value="<?php echo $id;?>">
              <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
              <button class="btn btn-primary btn-flat">Ubah</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php endforeach;?>

    <!-- Hapus Kategori -->
    <?php
      $no=0;
      foreach ($data->result_array() as $a):
        $no++;
        $id=$a['id_kategori'];
        $nama_kategori=$a['nama_kategori'];
    ?>
    <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Hapus Kategori</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/kategori/hapus_kategori'?>" enctype="multipart/form-data">
            <div class="modal-body">
              
              <input type="hidden" name="kode" value="<?php echo $id;?>">
              <p>Apakah Anda yakin mau menghapus Kategori <b><?php echo $nama_kategori;?></b> ?</p>

            </div>
          
            <div class="modal-footer">
              <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
              <button class="btn btn-primary btn-flat">Hapus</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php endforeach;?>

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.1.3.min.js' ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js' ?>" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.js' ?>" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js' ?>" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'assets/dist/js/demo.js' ?>" type="text/javascript"></script>
    <!-- Toast -->
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Kategori Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Kategori berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Kategori Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>

  </body>
</html>
