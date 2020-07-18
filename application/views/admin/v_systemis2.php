<!--Counter Inbox-->
<?php 
    $lokasi = $this->session->userdata('lokasi');
    $witel = $this->session->userdata('witel');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMALPRO <?php echo $lokasi;?> | Integrated System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

  
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

   <?php 
    $this->load->view('admin/v_header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-chevron-left"></i> <span>Kembali Ke Dashboard Utama</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/sto'?>">
          <!--<form action="<?php echo base_url().'admin/sto'?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="lokasi" value="<?php echo $lokasi;?>" required>
          </form>-->
            <i class="fa fa-home"></i> <span>Dashboard STO</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>CME</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/cme/ac/view'?>"><i class="fa fa-keyboard-o"></i> Perangkat AC</a></li>
            <li><a href="<?php echo base_url().'admin/cme/batt/view'?>"><i class="fa fa-battery-3"></i> Perangkat Baterai</a></li>
            <li><a href="<?php echo base_url().'admin/cme/deg/view'?>"><i class="fa fa-clipboard"></i> Perangkat Diesel/Generator</a></li>
            <li><a href="<?php echo base_url().'admin/cme/invups/view'?>"><i class="fa fa-stop"></i> Perangkat Inverter</a></li>
            <li><a href="<?php echo base_url().'admin/cme/pln/view'?>"><i class="fa fa-bolt"></i> Perangkat PLN</a></li>
            <li><a href="<?php echo base_url().'admin/cme/rectifier/view'?>"><i class="fa fa-arrows-alt"></i> Perangkat Rectifier</a></li>
            <li><a href="<?php echo base_url().'admin/cme/trafo/view'?>"><i class="fa fa-archive"></i> Perangkat Trafo</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-hdd-o"></i>
            <span>Metro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/metro/view/1'?>"><i class="fa fa-list"></i> Switch</a></li>
            <li><a href="<?php echo base_url().'admin/metro/view/2'?>"><i class="fa fa-list"></i> IP Backbone</a></li>
            <li><a href="<?php echo base_url().'admin/metro/view/3'?>"><i class="fa fa-list"></i> One Network</a></li>
            <li><a href="<?php echo base_url().'admin/metro/view/4'?>"><i class="fa fa-list"></i> IP Broadband</a></li>
            <li><a href="<?php echo base_url().'admin/metro/view/5'?>"><i class="fa fa-list"></i> Data Network</a></li>
          </ul>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-refresh"></i>
            <span>Integrated System</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url().'admin/systemis/view'?>"><i class="fa fa-list"></i> Data Katalis</a></li>
            <?php if ($lokasi == 'STO KEBALEN' || $lokasi == 'STO MERGOYOSO' || $lokasi == 'STO LAMONGAN' || $lokasi == 'STO GRESIK') : ?>
              <li><a href="<?php echo base_url().'admin/systemis/denah'?>"><i class="fa fa-list"></i> Denah Konfigurasi Katalis</a></li>
            <?php endif; ?>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/event/view'?>">
            <i class="fa fa-home"></i> <span>Network Event</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-plug"></i>
            <span>Transport</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/transport/view'?>"><i class="fa fa-list"></i> OSP</a></li>
            <li><a href="<?php echo base_url().'admin/transport/view_isp'?>"><i class="fa fa-list"></i> ISP</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/switching'?>">
            <i class="fa fa-server"></i> <span>Switching</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'administrator/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Integrated System 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo $lokasi;?></a></li>
        <li class="active">Integrated System</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" href="<?php echo base_url().'admin/systemis/add_systemis'?>"><span class="fa fa-plus"></span> Add Katalis</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>IP Address</th>
                    <th>Lokasi</th>
                    <th>Datel</th>
                    <th>Ruang</th>
                    <th>Lantai</th>
                    <th>Keterangan</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $no_urut=$i['no_urut'];
                       $nama=$i['nama'];
                       $ip_adress=$i['ip_adress'];
                       $lokasi=$i['lokasi'];
                       $datel=$i['datel'];
                       $ruang=$i['ruang'];
                       $lantai=$i['lantai'];
                       $keterangan=$i['keterangan'];
                       
                    ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $ip_adress;?></td>
                  <td><?php echo $lokasi;?></td>
                  <td><?php echo $datel;?></td>
                  <td><?php echo $ruang;?></td>
                  <td><?php echo $lantai;?></td>
                  <td><?php echo $keterangan;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $no_urut;?>"><span class="fa fa-pencil"></span></a>
                        <?php if($this->session->userdata('level')==1) :?><a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $no_urut;?>"><span class="fa fa-trash"></span></a><?php endif; ?>
                  </td>
                </tr>
        <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019.</strong> All rights reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


  
  <?php foreach ($data->result_array() as $i) :
                       $no_urut=$i['no_urut'];
                       $nama=$i['nama'];
                       $ip_adress=$i['ip_adress'];
                       $lokasi=$i['lokasi'];
                       $datel=$i['datel'];
                       $ruang=$i['ruang'];
                       $lantai=$i['lantai'];
                       $keterangan=$i['keterangan'];
            ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $no_urut;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Katalis</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/systemis/update_systemis'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $no_urut;?>"/> 
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" id="inputUserName" placeholder="Nama" required>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">IP Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="ip_adress" class="form-control" value="<?php echo $ip_adress;?>" id="inputUserName" placeholder="IP Address" required>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Lokasi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="lokasi" class="form-control" value="<?php echo $lokasi;?>" id="inputUserName" placeholder="Lokasi" required>
                                        </div>
                                    </div>   
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Datel</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="datel" class="form-control" value="<?php echo $datel;?>" id="inputUserName" placeholder="Datel" required>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Ruang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="ruang" class="form-control" value="<?php echo $ruang;?>" id="inputUserName" placeholder="Ruang" required>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Lantai</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="lantai" class="form-control" value="<?php echo $lantai;?>" id="inputUserName" placeholder="Lantai" required>
                                        </div>
                                    </div>  
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan;?>" id="inputUserName" placeholder="Keterangan" required>
                                        </div>
                                    </div>                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>


    <?php foreach ($data->result_array() as $i) :
              $no_urut=$i['no_urut'];
              $nama=$i['nama'];
            ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $no_urut;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Katalis</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/systemis/hapus_systemis'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $no_urut;?>"/> 
                            <p>Apakah Anda yakin mau menghapus katalis <b><?php echo $nama;?></b> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
  
  


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    //$("#example1").DataTable({
      //"paging": true,
      //"ordering": false,
      //"info": false
    //});
    var groupColumn = 0;
    var table = $('#example1').DataTable();
 
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
    
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Katalis Berhasil disimpan ke database.",
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
                    text: "Katalis berhasil di update",
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
                    text: "Katalis Berhasil dihapus.",
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
