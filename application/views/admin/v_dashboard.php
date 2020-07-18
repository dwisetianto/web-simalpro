<!--Counter Inbox-->
<?php 
?>
<?php 
    $witel = $this->session->userdata('witel');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMALPRO</title>
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
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/map3.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/mapbutton.css'?>">

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
        <li class="header">Menu Utama</li>
        <li class="active">
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
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
            <li><a href="<?php echo base_url().'admin/cme/ac'?>"><i class="fa fa-keyboard-o"></i> Perangkat AC</a></li>
            <li><a href="<?php echo base_url().'admin/cme/batt'?>"><i class="fa fa-battery-3"></i> Perangkat Baterai</a></li>
            <li><a href="<?php echo base_url().'admin/cme/deg'?>"><i class="fa fa-clipboard"></i> Perangkat Diesel/Generator</a></li>
            <li><a href="<?php echo base_url().'admin/cme/invups'?>"><i class="fa fa-stop"></i> Perangkat Inverter</a></li>
            <li><a href="<?php echo base_url().'admin/cme/pln'?>"><i class="fa fa-bolt"></i> Perangkat PLN</a></li>
            <li><a href="<?php echo base_url().'admin/cme/rectifier'?>"><i class="fa fa-arrows-alt"></i> Perangkat Rectifier</a></li>
            <li><a href="<?php echo base_url().'admin/cme/trafo'?>"><i class="fa fa-archive"></i> Perangkat Trafo</a></li>
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
            <li><a href="<?php echo base_url().'admin/metro/cat/1'?>"><i class="fa fa-list"></i> Switch</a></li>
            <li><a href="<?php echo base_url().'admin/metro/cat/2'?>"><i class="fa fa-list"></i> IP Backbone</a></li>
            <li><a href="<?php echo base_url().'admin/metro/cat/3'?>"><i class="fa fa-list"></i> One Network</a></li>
            <li><a href="<?php echo base_url().'admin/metro/cat/4'?>"><i class="fa fa-list"></i> IP Broadband</a></li>
            <li><a href="<?php echo base_url().'admin/metro/cat/5'?>"><i class="fa fa-list"></i> Data Network</a></a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/systemis/all_denah'?>">
            <i class="fa fa-refresh"></i> <span>Integrated System</span>
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
            <li><a href="<?php echo base_url().'admin/transport'?>"><i class="fa fa-list"></i> OSP</a></li>
            <li><a href="<?php echo base_url().'admin/transport/isp'?>"><i class="fa fa-list"></i> ISP</a></li>
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
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
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
        Dashboard
              <?php
                if($witel == 2) { echo "Witel Surabaya Selatan"; };
              ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih STO</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-12" style="overflow-x: auto;">
                    <center>
                <form action="<?php echo base_url().'admin/dashboard/map'?>" method="post" enctype="multipart/form-data" class="container">
                <?php
                if($witel == 1) {?>
                      <img style="height: 401px; width: 600px; margin-left: -160px; margin-top: 11px;" src="<?php echo base_url().'theme/images/mapsbu.png';?>" alt="Surabaya Utara">      
                      
                      <button class="btnBabad" type="submit" name="lokasi" value="STO BABAD" title="STO BABAD">BBA</button>
                      <button class="btnBambe" type="submit" name="lokasi" value="STO BAMBE" title="STO BAMBE">BBE</button>
                      <button class="btnBrondong" type="submit" name="lokasi" value="STO BRONDONG" title="STO BRONDONG">BRD</button>
                      <button class="btnBalongpanggang" type="submit" name="lokasi" value="STO BALONGPANGGANG" title="STO BALONGPANGGANG">BPG</button>
                      <button class="btnBawean" type="submit" name="lokasi" value="STO BAWEAN" title="STO BAWEAN">BWN</button>
                      <button class="btnBanyuurip" type="submit" name="lokasi" value="STO BANYUURIP" title="STO BANYUURIP">BYU</button>
                      <button class="btnCerme" type="submit" name="lokasi" value="STO CERME" title="STO CERME">CME</button>
                      <button class="btnDudukSampeyan" type="submit" name="lokasi" value="STO DUDUKSAMPEYAN" title="STO DUDUKSAMPEYAN">DDS</button>
                      <button class="btnGresik" type="submit" name="lokasi" value="STO GRESIK" title="STO GRESIK">GSK</button>
                      <button class="btnKebalen" type="submit" name="lokasi" value="STO KEBALEN" title="STO KEBALEN">KBL</button>
                      <button class="btnKedamean" type="submit" name="lokasi" value="STO KEDAMEAN" title="STO KEDAMEAN">KDM</button>
                      <button class="btnKenjeran" type="submit" name="lokasi" value="STO KENJERAN" title="STO KENJERAN">KJR</button>
                      <button class="btnKalianak" type="submit" name="lokasi" value="STO KALIANAK" title="STO KALIANAK">KLA</button>
                      <button class="btnKandangan" type="submit" name="lokasi" value="STO KANDANGAN" title="STO KANDANGAN">KNN</button>
                      <button class="btnKapasan" type="submit" name="lokasi" value="STO KAPASAN" title="STO KAPASAN">KPS</button>
                      <button class="btnKarangpilang" type="submit" name="lokasi" value="STO KARANGPILANG" title="STO KARANGPILANG">KRP</button>
                      <button class="btnLakarsantri" type="submit" name="lokasi" value="STO LAKARSANTRI" title="STO LAKARSANTRI">LKS</button>
                      <button class="btnLamongan" type="submit" name="lokasi" value="STO LAMONGAN" title="STO LAMONGAN">LMG</button>
                      <button class="btnMergoyoso" type="submit" name="lokasi" value="STO MERGOYOSO" title="STO MERGOYOSO">MGO</button>
                      <button class="btnGresik2" type="submit" name="lokasi" value="STO PONGANGAN" title="STO PONGANGAN">POG</button>
                      <button class="btnSukodadi" type="submit" name="lokasi" value="STO SUKODADI" title="STO SUKODADI">SKD</button>
                      <button class="btnSedayu" type="submit" name="lokasi" value="STO SEDAYU" title="STO SEDAYU">SDY</button>
                      <button class="btnTandes" type="submit" name="lokasi" value="STO TANDES" title="STO TANDES">TDS</button>
                      <button class="btnNonSto" type="submit" name="lokasi" value="NON STO" title="NON STO">NON STO</button>
                    <!-- /.chart-responsive -->
                <?php
                }
                elseif($witel == 2) {?>
                      <img style="height: 401px; width: 600px; margin-left: -195px; margin-top: -10px;" src="<?php echo base_url().'theme/images/mapsbs.png';?>" alt="Surabaya Selatan">
                      <button class="btnDarmo" type="submit" name="lokasi" value="DARMO">DMO</button>
                      <button class="btnGubeng" type="submit" name="lokasi" value="GUBENG">GBG</button>
                      <button class="btnInjoko" type="submit" name="lokasi" value="INJOKO">IJK</button>
                      <button class="btnJagir" type="submit" name="lokasi" value="JAGIR">JGR</button>
                      <button class="btnManyar" type="submit" name="lokasi" value="MANYAR">MYR</button>
                      <button class="btnRungkut" type="submit" name="lokasi" value="RUNGKUT">RKT</button>
                      <button class="btnWaru2" type="submit" name="lokasi" value="TROPODO">TPO</button>
                      <button class="btnWaru" type="submit" name="lokasi" value="WARU">WRU</button>

                <?php
                }
                ?>
                </form>                      
                    </center>
                  </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
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
