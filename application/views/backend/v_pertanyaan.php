<!-- Query for Count Status -->
<?php
  $query=$this->db->query("SELECT * FROM data_pertanyaan WHERE status=''");
  $query2=$this->db->query("SELECT * FROM data_pertanyaan WHERE status='Dipenuhi'");
  $query3=$this->db->query("SELECT * FROM data_pertanyaan WHERE status='Ditolak'");
  $jum_diproses=$query->num_rows();
  $jum_dipenuhi=$query2->num_rows();
  $jum_ditolak=$query3->num_rows();
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
                  <div class="box-title">
                    <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Pertanyaan</a>
                    <a class="btn btn-info btn-flat" data-toggle="modal" data-target="#exportModal"><span class="fa fa-download"></span> Export</a>
                  </div>
                  
                  <div class="box-tools pull-right">
                    <label class="label label-success ">Dipenuhi (<b><?php echo $jum_dipenuhi;?></b>)</label>
                    <label class="label label-danger">Ditolak (<b><?php echo $jum_ditolak;?></b>)</label>
                    <label class="label label-warning">Diproses (<b><?php echo $jum_diproses;?></b>)</label>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th style="width: 350px;">Pertanyaan</th>
                        <th>Jawaban</th>
                        <th style="width: 150px;">Tgl. Permohonan</th>
                        <th style="width: 100px;">Status</th>
                        <th style="text-align:center; width: 80px;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=0;
                          foreach($data->result_array() as $a):
                              $no++;
                              $id=$a['id'];
                              $id_kategori=$a['id_kategori'];
                              $id_pemohon=$a['id_pemohon'];
                              $pertanyaan=$a['pertanyaan'];
                              $jawaban=$a['jawaban'];
                              $status=$a['status'];
                              $tgl_permohonan=$a['tgl_permohonan'];
                      ?>
                      <tr>
                        <td><?php echo $no;?></td>

                        <?php
                        foreach ($kat->result_array() as $k):
                          $id_kat=$k['id_kategori'];
                          $nama_kategori=$k['nama_kategori'];
                        ?>
                        <?php if ($id_kat==$id_kategori):?>
                        <td><?php echo $nama_kategori;?></td>
                        <?php endif;?>
                        <?php endforeach;?>

                        <td style="width: 350px;"><?php echo $pertanyaan;?></td>
                        <td><?php echo $jawaban;?></td>
                        <td style="width: 150px;"><?php echo $tgl_permohonan;?></td>
                        <td style="text-align:center; width: 100px;">
                          <?php if ($status=='Dipenuhi'): ?>
                            <label class="label label-success">Dipenuhi</label>
                          <?php elseif($status=='Ditolak'): ?>
                            <label class="label label-danger">Ditolak</label>
                          <?php else: ?>
                            <label class="label label-warning">Diproses</label>
                          <?php endif ?>
                        </td>
                        <td style="text-align:center; width: 80px;">
                          <a class="btn btn-xs" title="Detail" href="<?php echo base_url().'backend/pertanyaan/detail_pertanyaan/'.$id_pemohon ?>"><span class="fa fa-search"></span></a>
                          <a class="btn btn-xs" data-toggle="modal" title="Ubah" data-target="#ModalUpdate<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                          <a class="btn btn-xs" data-toggle="modal" title="Hapus" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
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
            <h4 class="modal-title">Tambah Pertanyaan</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pertanyaan/simpan_pertanyaan'?>" enctype="multipart/form-data">
            <div class="modal-body">
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Kategori</label>
                <div class="col-xs-8">
                  <select name="id_kategori" class="form-control" required>
                    <option value="">-PILIH-</option>
                    <?php foreach ($kat->result_array() as $k):
                      $id_kategori=$k['id_kategori'];
                      $nama_kategori=$k['nama_kategori'];
                    ?>
                    <option value="<?php echo $id_kategori;?>"><?php echo $nama_kategori;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Nama Pemohon</label>
                  <div class="col-xs-8">
                    <input name="nama_pemohon" class="form-control" type="text" placeholder="Nama Pemohon" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Instansi Asal</label>
                  <div class="col-xs-8">
                    <input name="instansi_asal" class="form-control" type="text" placeholder="Instansi Asal" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Kontak</label>
                  <div class="col-xs-8">
                    <input name="kontak" class="form-control" type="text" placeholder="Kontak" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Pertanyaan</label>
                  <div class="col-xs-8">
                    <textarea name="pertanyaan" class="form-control" placeholder="Pertanyaan" rows="5" required></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Jawaban</label>
                  <div class="col-xs-8">
                    <input name="jawaban" class="form-control" type="text" placeholder="Jawaban" required>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Kontak Eskalasi</label>
                <div class="col-xs-8">
                  <textarea name="kontak_eskalasi" class="form-control" placeholder="Kontak Eskalasi" rows="5"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Media</label>
                <div class="col-xs-8">
                  <select name="media" class="form-control">
                    <option value="">-PILIH-</option>
                    <option value="Media Sosial Instagram">Media Sosial Instagram</option>
                    <option value="Media Sosial Facebook">Media Sosial Facebook</option>
                    <option value="E-mail">E-mail</option>
                    <option value="Ruang Layanan Informasi">Ruang Layanan Informasi</option>
                    <option value="Pesan Singkat">Pesan Singkat</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Status</label>
                <div class="col-xs-8">
                  <select name="status" class="form-control">
                    <option value="">-PILIH-</option>
                    <option value="Dipenuhi">Dipenuhi</option>
                    <option value="Ditolak">Ditolak</option>
                    <option value="">Diproses</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Tanggal Permohonan</label>
                <div class="col-xs-8">
                  <input type="date" name="tgl_permohonan" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Tanggal Selesai</label>
                <div class="col-xs-8">
                  <input type="date" name="tgl_selesai" class="form-control">
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

    <!-- Modal Export Pertanyaan -->
    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Export Excel</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pertanyaan/export_excel'?>" enctype="multipart/form-data">
            <div class="modal-body">
              
              <div class="form-group">
                  <label class="control-label col-xs-3" >Tanggal Awal</label>
                  <div class="col-xs-8">
                    <input name="cari" class="form-control" type="date" placeholder="Tanggal Awal" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Tanggal Akhir</label>
                  <div class="col-xs-8">
                    <input name="cari2" class="form-control" type="date" placeholder="Tanggal Akhir" required>
                  </div>
              </div>

            </div>
          
            <div class="modal-footer">
              <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
              <button class="btn btn-primary btn-flat">Export</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Ubah Pertanyaan -->
    <?php
      $no=0;
      foreach ($data->result_array() as $a):
        $no++;
        $id=$a['id'];
        $id_kategori=$a['id_kategori'];
        $pertanyaan=$a['pertanyaan'];
        $jawaban=$a['jawaban'];
        $kontak_eskalasi=$a['kontak_eskalasi'];
        $media=$a['media'];
        $status=$a['status'];
        $tgl_permohonan=$a['tgl_permohonan'];
        $tgl_selesai=$a['tgl_selesai'];
    ?>
    <div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Pertanyaan</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pertanyaan/update_pertanyaan'?>" enctype="multipart/form-data">
            <div class="modal-body">
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Kategori</label>
                <div class="col-xs-8">
                  <select name="id_kategori" class="form-control" required>
                    <option value="">-PILIH-</option>
                    <?php foreach ($kat->result_array() as $k):
                      $id_kat=$k['id_kategori'];
                      $nama_kategori=$k['nama_kategori'];
                    ?>
                    <?php if ($id_kat==$id_kategori):?>
                      <option value="<?php echo $id_kat;?>" selected><?php echo $nama_kategori;?></option>
                    <?php else:?>
                      <option value="<?php echo $id_kat;?>"><?php echo $nama_kategori;?></option>
                    <?php endif;?>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Pertanyaan</label>
                  <div class="col-xs-8">
                      <input name="pertanyaan" value="<?php echo $pertanyaan;?>" class="form-control" type="text" placeholder="Pertanyaan" required>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-xs-3" >Jawaban</label>
                  <div class="col-xs-8">
                      <input name="jawaban" value="<?php echo $jawaban;?>" class="form-control" type="text" placeholder="Jawaban" required>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Kontak Eskalasi</label>
                <div class="col-xs-8">
                  <textarea name="kontak_eskalasi" class="form-control" placeholder="<?php echo $kontak_eskalasi;?>" rows="5"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Media</label>
                <div class="col-xs-8">
                  <select name="media" class="form-control">
                    <option value="">-PILIH-</option>
                    <option value="Media Sosial Instagram">Media Sosial Instagram</option>
                    <option value="Media Sosial Facebook">Media Sosial Facebook</option>
                    <option value="E-mail">E-mail</option>
                    <option value="Ruang Layanan Informasi">Ruang Layanan Informasi</option>
                    <option value="Pesan Singkat">Pesan Singkat</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Status</label>
                <div class="col-xs-8">
                  <select name="status" class="form-control">
                    <option value="">-PILIH-</option>
                    <option value="Dipenuhi">Dipenuhi</option>
                    <option value="Ditolak">Ditolak</option>
                    <option value="">Diproses</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Tanggal Permohonan</label>
                <div class="col-xs-8">
                  <input type="date" value="<?php echo $tgl_permohonan;?>" name="tgl_permohonan" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3">Tanggal Selesai</label>
                <div class="col-xs-8">
                  <input type="date" value="<?php echo $tgl_selesai;?>" name="tgl_selesai" class="form-control">
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

    <!-- Modal Hapus Pertanyaan -->
    <?php
      $no=0;
      foreach ($data->result_array() as $a):
        $no++;
        $id=$a['id'];
        $id_kategori=$a['id_kategori'];
        $pertanyaan=$a['pertanyaan'];
        $jawaban=$a['jawaban'];
        $kontak_eskalasi=$a['kontak_eskalasi'];
        $media=$a['media'];
        $status=$a['status'];
        $tgl_permohonan=$a['tgl_permohonan'];
        $tgl_selesai=$a['tgl_selesai'];
    ?>
    <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Hapus Kategori</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pertanyaan/hapus_pertanyaan'?>" enctype="multipart/form-data">
            <div class="modal-body">
              
              <input type="hidden" name="kode" value="<?php echo $id;?>">
              <p>Apakah Anda yakin mau menghapus Pertanyaan <b><?php echo $pertanyaan;?></b> ?</p>

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
