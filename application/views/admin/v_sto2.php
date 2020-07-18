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
  <title>SIMALPRO <?php echo $lokasi;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!--Header-->
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

        <li class="active">
          <a href="<?php echo base_url().'admin/sto'?>">
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


        <li>
          <a href="<?php echo base_url().'admin/systemis/denah'?>">
            <i class="fa fa-refresh"></i> <span>Integrated System</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
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
        Selamat datang di <?php echo $lokasi; ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo $lokasi; ?></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <?php 
            $no=0;
          foreach ($data->result_array() as $i) :
            $no++;
            $no_urut=$i['no_urut'];
            $embed=$i['embed'];
            $lokasi2=$i['lokasi'];   
            $koordinat=$i['koordinat'];   
            $foto=$i['foto'];   
            ?>
                      <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom" style="overflow: hidden;">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <?php if($this->session->userdata('level')==1) :?><li><a href="#edit<?php echo $no; ?>" data-toggle="tab">Edit</a></li><?php endif; ?>
              <li class="active"><a href="#fotogedung<?php echo $no; ?>" data-toggle="tab">Gedung</a></li>
              <li><a href="#koordinat<?php echo $no; ?>" data-toggle="tab">Koordinat</a></li>
              <li><a href="#peta<?php echo $no; ?>" data-toggle="tab">Peta</a></li>
              <li class="pull-left header" style="padding-bottom:  8px"><i class="fa fa-map-pin"></i> Lokasi <?php echo $lokasi2;?></li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="tab-pane active" id="fotogedung<?php echo $no; ?>" style="">
                <?php
                  error_reporting(0);
                  $imageURL = base_url().'assets/gedung/'.$foto;
                  $url = preg_replace("/ /", "%20", $imageURL);
                  if (!$foto) {  
                      echo '<div class="box-body">Foto lokasi tidak tersedia</div>';
                  } else {
                    echo '<img src="'.base_url().'assets/gedung/'.$foto.'" style="width: 100%">';
                  }; ?>
              </div>
              <div class="tab-pane" id="koordinat<?php echo $no; ?>" style="">
                <div class="box-body"><b><?php echo $lokasi2; ?></b>: <?php echo $koordinat;?></div>
              </div>
              <div class="tab-pane" id="peta<?php echo $no; ?>" style="">
                <style type="text/css">
                  iframe { border: 0; width: 100% !important; height: 300px; margin-bottom: 0px; display: block; }
                </style>
                <?php echo $embed;?>
              </div>
              <?php if($this->session->userdata('level')==1) :?>
                <div class="tab-pane" id="edit<?php echo $no; ?>" style="">
                <div class="box-header"></div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/sto/update_landing'?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">     
                     <input type="hidden" name="kode" value="<?php echo $no_urut;?>"/> 
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Embed</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="embed" class="form-control" id="inputUserName" placeholder="Embed" value="<?php echo html_escape($embed); ?>">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Koordinat</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="koordinat" class="form-control" id="inputUserName" placeholder="Koordinat" value="<?php echo $koordinat; ?>">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="foto"/>
                                        </div>
                                  </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>

              </div>
            <?php endif; ?>

            </div>
          </div>
          <!-- /.nav-tabs-custom -->

<!--
          <div class="box box-danger" style="overflow: hidden;">
            <div class="box-header with-border">
              <h3 class="box-title">Lokasi <?php echo $lokasi2;?></h3>
            </div>
                <style type="text/css">
                  .box iframe { border: 0; width: 100% !important; height: 300px; margin-bottom: 0px; display: block; }
                </style>
                <?php echo $embed;?>
              </div>  
          -->
                <!-- /.attachment -->
            <!-- /.box-body -->
          <!-- /.box -->
        <?php endforeach;?>
          </div>

        <div class="col-md-4">
          <!-- MAP & BOX PANE -->
          <!--
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Koordinat</h3>
            </div>

            <div class="box-body">
              <ul>
                <?php foreach ($data->result_array() as $i) :
                    $koordinat=$i['koordinat'];   
                    $lokasi2=$i['lokasi'];   
                    ?>
                  <li><b><?php echo $lokasi2; ?></b>: <?php echo $koordinat;?></li>
                <?php endforeach;?>
              </ul>
            </div>
          </div>
-->
            <!-- /.box-body -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Denah Gedung</h3>
            </div>

            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Size</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $query=$this->db->query("SELECT * FROM tbl_denah WHERE lokasi='$lokasi'");
                    $no=0;
                    foreach ($query->result_array() as $i) :
                       $no++;
                       $no_urut=$i['no_urut'];
                       $lokasi=$i['lokasi'];
                       $nama_file=$i['nama_file'];
                       $file_path= 'assets/denah/'.$nama_file;
                       $size=filesize($file_path);
                       $size2;
                       if ($size >= 1048576) $size2 = number_format((float)$size/1048576, 2, '.', '').' MB';
                       else if ($size >= 1024) $size2 = number_format((float)$size/1024, 1, '.', '').' KB';
                       else $size2 = $size.' byte';
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td style="word-break: break-all;"><?php echo $nama_file; ?></td>
                  <td style="word-break: break-all;"><?php echo $size2 ?></td>
                  <td style="text-align:right;">
                    <a href="<?php echo base_url().'admin/sto/download/'.$no_urut?>">Unduh</a>
                    <?php if($this->session->userdata('level')==1) :?> <br /> <a href="<?php echo base_url().'admin/sto/hapus/'.$no_urut?>">Hapus</a><?php endif; ?>
                  </td>
                </tr>

        <?php endforeach;?>
                </tbody>
              </table>
              <br />
              <a class="btn btn-success btn-flat pull-right" data-toggle="modal" data-target="#myModal" style="display: block;"><span class="fa fa-plus"></span> Add Denah</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
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



        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Denah</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/sto/simpan_denah'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <input type="hidden" name="lokasi" value="<?php echo $lokasi;?>" required>
                      <!--<input type="hidden" name="xlokasi" value="<?php echo $lokasi;?>" required>-->
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">File</label>
                        <div class="col-sm-7">
                          <input type="file" name="denah" required/>
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


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>

</body>

</html>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Denah Berhasil disimpan ke database.",
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
                    text: "Denah berhasil di update",
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
                    text: "Denah Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='update-foto'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Informasi STO berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php else:?>

    <?php endif;?>
