<!--Counter Inbox-->
<?php 
      $lokasi = $this->session->userdata('lokasi');
    $idwitel = $this->session->userdata('witel');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMALPRO | Add Transport</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.css'?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

  
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

   <?php 
    $this->load->view('admin/v_header');
  ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php if (!$lokasi) : ?>
      <section class="sidebar">
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Menu Utama</li>
          <li>
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

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-plug"></i>
            <span>Transport</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url().'admin/transport'?>"><i class="fa fa-list"></i> OSP</a></li>
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
    <?php else: ?>
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

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-plug"></i>
            <span>Transport</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url().'admin/transport/view'?>"><i class="fa fa-list"></i> OSP</a></li>
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
    <?php endif; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transport
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php if ($lokasi) : ?><li><a href="#"><?php echo $lokasi;?></a></li><?php endif; ?>
        <li><a href="#">Transport</a></li>
        <?php if ($link) : ?><li><a href="#"><?php echo $link;?></a></li><?php endif; ?>
        <li class="active">Add Perangkat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Perangkat</h3>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url().'admin/transport/simpan_transport'?>" method="post" enctype="multipart/form-data">
                <?php if (!$link) : ?>
                  <div class="form-group">
                    <label for="metro">Link</label>
                    <select class="form-control select2" name="link" style="width: 100%;" required>
                      <option value="">Pilih Link</option>
              <?php
                $sto=$this->db->query("SELECT DISTINCT link FROM tbl_temp");
                foreach ($sto->result_array() as $i) :
                  $lok=$i['link'];
                  ?>
                      <option value="<?php echo $lok;?>"><?php echo $lok;?></option>
              <?php endforeach;?>
                    </select>
                  </div>
                <?php else: ?>
                  <div class="form-group">
                    <label for="metro">Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Link" value="<?php echo $link; ?>" readonly>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                                        <label for="witel">Witel</label>
                                        <div>
                                            <select class="form-control select2" name="witel" style="width: 100%;" <?php if($idwitel!='0') echo "disabled='true'";?> required>
                                            <option value="">Pilih Witel</option>
                                    <?php
                                      $wit=$this->db->query("SELECT * FROM tbl_witel");
                                      foreach ($wit->result_array() as $i) :
                                        if($idwitel==$i['idwitel']) {
                                          echo "<option value='".$i['idwitel']."'selected>".$i['nama_witel']."</option>";
                                        }
                                        else {
                                          echo "<option value='".$i['idwitel']."'>".$i['nama_witel']."</option>";
                                        }
                                        ?>
                                    <?php endforeach;?>
                                          </select>
                                        </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-xs-6">
                                <label for="core">Merk</label>
                                <input type="text" class="form-control" name="merk" placeholder="Merk" required>
                      </div>
                      <div class="col-xs-6">
                                <label for="link">Project</label>
                                <input type="text" class="form-control" name="project" placeholder="Project" required>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-xs-4">
                                <label for="core">Tahun Operasi</label>
                                <input type="text" class="form-control" name="tahun_operasi" placeholder="Tahun Operasi" required>
                      </div>
                      <div class="col-xs-4">
                                <label for="link">Jenis & Type Fiber</label>
                                <input type="text" class="form-control" name="type_fiber" placeholder="Jenis & Type Fiber" required>
                      </div>
                      <div class="col-xs-4">
                                <label for="core">Type Con.</label>
                                <input type="text" class="form-control" name="type_con" placeholder="Type Con.">
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-xs-4">
                                <label for="core">Kap. Core</label>
                                <input type="text" class="form-control" name="kap_core" placeholder="Kap. Core" required>
                      </div>
                      <div class="col-xs-4">
                                <label for="link">Kap. Terpakai</label>
                                <input type="text" class="form-control" name="kap_terpakai" placeholder="Kap. Terpakai" required>
                      </div>
                      <div class="col-xs-4">
                                <label for="core">Kap. Idle</label>
                                <input type="text" class="form-control" name="kap_idle" placeholder="Kap. Idle">
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                      <div class="col-xs-4">
                                <label for="core">Rusak</label>
                                <input type="text" class="form-control" name="rusak" placeholder="Rusak">
                      </div>
                      <div class="col-xs-4">
                                <label for="link">Sisa Baik</label>
                                <input type="text" class="form-control" name="sisa_baik" placeholder="Sisa Baik">
                      </div>
                      <div class="col-xs-4">
                                <label for="core">Panjang (KM)</label>
                                <input type="text" class="form-control" name="panjang" placeholder="Panjang (KM)">
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                </div>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Simpan</button>
              </form>


              <form action="<?php echo base_url().'admin/transport/link2'?>" method="post" enctype="multipart/form-data">
                <button class="btn btn-success btn-flat pull-left" value="<?php echo $link;?>" name="link"><span class="fa fa-arrow-left"></span> Kembali</button>
              </form>
              <!-- /.form-group -->
            </div>

              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (left) -->
      </div>
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

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js'?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.extensions.js'?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<!-- Page script -->

<script>
  $(document).ready(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    $(".select2").select2();
    $(".select2-tags").select2({
      tags: true
    });
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
