<!-- Query for Count Status -->
<?php
  $query=$this->db->query("SELECT * FROM data_pertanyaan WHERE status=''");
  $query2=$this->db->query("SELECT * FROM data_pertanyaan WHERE status='Dipenuhi'");
  $jum_belumdiproses=$query->num_rows();
  $jum_dipenuhi=$query2->num_rows();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | Pertanyaan</title>
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
                <li class="active"><a href="<?php echo base_url().'backend/pertanyaan' ?>"><i class="fa fa-list-alt"></i>Pertanyaan</a></li>
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
            Data Pertanyaan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Pertanyaan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-info btn-flat" href="<?php echo base_url().'backend/pertanyaan' ?>"><span class="fa fa-plus"></span> Kembali</a>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <?php
                  foreach ($data->result_array() as $d):
                    $id=$d['id'];
                    $id_kat=$d['id_kategori'];
                    $id_pemohon=$d['id_pemohon'];
                    $pertanyaan=$d['pertanyaan'];
                    $jawaban=$d['jawaban'];
                    $kontak_eskalasi=$d['kontak_eskalasi'];
                    $media=$d['media'];
                    $status=$d['status'];
                    $tgl_permohonan=$d['tgl_permohonan'];
                    $tgl_selesai=$d['tgl_selesai'];
                  ?>
                  <!-- Table for Kategori and Status -->
                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="0">
                        <tr>
                          <td><b>Kategori</b></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-6"></div>
                    <div class="col-xs-3">
                      <table width="100%" border="0">
                        <tr>
                          <td><b>Status Permohonan</b></td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="1">
                        <?php
                        foreach ($kat->result_array() as $k):
                          $id_kategori=$k['id_kategori'];
                          $nama_kategori=$k['nama_kategori'];
                        ?>
                        <tr>
                          <?php if ($id_kat==$id_kategori): ?>
                          <td><?php echo $nama_kategori;?></td>
                          <?php endif;?>
                        </tr>
                        <?php endforeach;?>
                      </table>
                    </div>
                    <div class="col-xs-6"></div>
                    <div class="col-xs-3">
                      <table width="100%" border="1">
                        <tr>
                          <?php if ($status=='Dipenuhi'): ?>
                          <td>Dipenuhi</td>
                          <?php elseif ($status=='Ditolak'): ?>
                          <td>Ditolak</td>
                          <?php else: ?>
                          <td>Diproses</td>
                          <?php endif;?>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.Table for Kategori and Status -->

                  <!-- Pembatas -->
                  <div class="row">
                    <div class="col-xs-12"><br></div>
                  </div>
                  <!-- /.Pembatas -->

                  <!-- Table for Tanggal -->
                  <div class="row">
                    <div class="col-xs-4">
                      <table width="100%" border="0">
                        <tr>
                          <td align="center"><b>Tanggal</b></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-8"></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                      <table width="100%" border="1">
                        <tr>
                          <td align="center" width="50%"><b>Permohonan</b></td>
                          <td align="center" width="50%"><b>Selesai</b></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-8"></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                      <table width="100%" border="1">
                        <tr>
                          <td align="center" width="50%"><?php echo $tgl_permohonan;?></td>
                          <td align="center" width="50%"><?php echo $tgl_selesai;?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-8"></div>
                  </div>
                  <!-- /.Table for Tanggal -->

                  <!-- Pembatas -->
                  <div class="row">
                    <div class="col-xs-12"><br></div>
                  </div>
                  <!-- /.Pembatas -->

                  <!-- Table for Data Pemohon and Media -->
                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="0">
                        <tr>
                          <td><b>Data Pemohon</b></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-6"></div>
                    <div class="col-xs-3">
                      <table width="100%" border="0">
                        <tr>
                          <td><b>Media</b></td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-9"></div>
                    <div class="col-xs-3">
                      <table width="100%" border="1">
                        <tr>
                          <td><?php echo $media;?></td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <!-- Isi for Data pemohon -->
                  <?php
                  foreach ($pemohon->result_array() as $p):
                    $nama_pemohon=$p['nama_pemohon'];
                    $instansi_asal=$p['instansi_asal'];
                    $kontak=$p['kontak'];
                  ?>
                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="0">
                        <tr>
                          <td>Nama :</td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-9"></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="1">
                        <tr>
                          <td><?php echo $nama_pemohon;?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-9"></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-12"><br></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="0">
                        <tr>
                          <td>Instansi Asal :</td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-9"></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="1">
                        <tr>
                          <td><?php echo $instansi_asal;?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-9"></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-12"><br></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="0">
                        <tr>
                          <td>Kontak :</td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-9"></div>
                  </div>

                  <div class="row">
                    <div class="col-xs-3">
                      <table width="100%" border="1">
                        <tr>
                          <td><?php echo $kontak;?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-xs-9"></div>
                  </div>
                  <?php endforeach;?>
                  <!-- Isi for Data pemohon -->
                  <!-- /.Table for Data Pemohon and Media -->

                  <div class="row">
                    <div class="col-xs-12"><br></div>
                  </div>

                  <!-- Table for Pertanyaan, Jawaban, and Kontak Eskalasi -->
                  <div class="row">
                    <div class="col-xs-4">
                      <table width="100%" border="0">
                        <tr>
                          <td><b>Pertanyaan</b></td>
                        </tr>
                      </table>
                    </div>

                    <div class="col-xs-4">
                      <table width="100%" border="0">
                        <tr>
                          <td><b>Jawaban</b></td>
                        </tr>
                      </table>
                    </div>

                    <div class="col-xs-4">
                      <table width="100%" border="0">
                        <tr>
                          <td><b>Kontak Eskalasi</b></td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-4">
                      <table width="100%" border="1">
                        <tr>
                          <td height="100" style="vertical-align: top;"><?php echo $pertanyaan;?></td>
                        </tr>
                      </table>
                    </div>

                    <div class="col-xs-4">
                      <table width="100%" border="1">
                        <tr>
                          <td height="100" style="vertical-align: top;"><?php echo $jawaban;?></td>
                        </tr>
                      </table>
                    </div>

                    <div class="col-xs-4">
                      <table width="100%" border="1">
                        <tr>
                          <td height="100" style="vertical-align: top;"><?php echo $kontak_eskalasi;?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.Table for Pertanyaan, Jawaban, and Kontak Eskalasi -->
                  <?php endforeach;?>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <!-- Footer -->
      <?php $this->load->view('backend/v_footer') ?>

    </div><!-- ./wrapper -->


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
                    text: "Pertanyaan & Jawaban Berhasil disimpan ke database.",
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
                    text: "Pertanyaan & Jawaban berhasil di update",
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
                    text: "Pertanyaan & Jawaban Berhasil dihapus.",
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
