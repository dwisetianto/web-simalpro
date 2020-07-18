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
  <title>SIMALPRO | Switching</title>
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
  
  <?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
  
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

   <?php 
    $this->load->view('admin/v_header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: non sto -->
  <?php if (!$lokasi2) : ?>
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li class="">
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

        <li class="active">
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
    <!-- sidebar: sto -->
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

        <li class="active">
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
        Switching
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php if ($lokasi2) : ?><li><a href="#"><?php echo $lokasi2;?></a></li><?php endif; ?>
        <li><a href="#">Switching</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" href="<?php echo base_url().'admin/switching/add_switching'?>"><span class="fa fa-plus"></span> Add Switching</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px; width: 100%">
                <thead>
                <tr>
                  <?php if (!$lokasi2) : ?>
                    <th rowspan="2">Lokasi</th>
                  <?php endif; ?>
                    <th rowspan="2">Nama Perangkat</th>
                    <th rowspan="2">Type</th>
                    <th rowspan="2">Fungsi</th>
                    <th colspan="2">Kap. Terpasang</th>
                    <th colspan="2">Kap. Terpakai</th> 
                    <th rowspan="2">Tanggal Integrasi</th> 
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2" style="text-align:right;">Aksi</th>
                  </tr>
                  <tr>
                    <th>SST</th>
                    <th>PRA</th>
                    <th>SST</th>
                    <th>PRA</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $tro_id=$i['no_urut'];
                       $lokasi=$i['lokasi'];
                       $nama_perangkat=$i['nama_perangkat'];
                       $type=$i['type'];
                       $fungsi=$i['fungsi'];
                       $kap_terpasang_sst=$i['kap_terpasang_sst'];
                       $kap_terpasang_pra=$i['kap_terpasang_pra'];
                       $kap_terpakai_sst=$i['kap_terpakai_sst'];
                       $kap_terpakai_pra=$i['kap_terpakai_pra'];
                       $tgl_integrasi=$i['tgl_integrasi'];
                       $keterangan=$i['keterangan'];
                       
                    ?>
                <tr>
                  <?php if (!$lokasi2) : ?>
                  <td><?php echo $lokasi;?></td>
                  <?php endif; ?>
                  <td><?php echo $nama_perangkat;?></td>
                  <td><?php echo $type;?></td>
                  <td><?php echo $fungsi;?></td>
                  <td><?php echo $kap_terpasang_sst;?></td>
                  <td><?php echo $kap_terpasang_pra;?></td>
                  <td><?php echo $kap_terpakai_sst;?></td>
                  <td><?php echo $kap_terpakai_pra;?></td>
                  <td><?php echo $tgl_integrasi;?></td>
                  <td><?php echo $keterangan;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $tro_id;?>"><span class="fa fa-pencil"></span></a>
                        <?php if($this->session->userdata('level')==1) :?><a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $tro_id;?>"><span class="fa fa-trash"></span></a><?php endif; ?>
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
                       $tro_id=$i['no_urut'];
                       $lokasi=$i['lokasi'];
                       $nama_perangkat=$i['nama_perangkat'];
                       $type=$i['type'];
                       $fungsi=$i['fungsi'];
                       $kap_terpasang_sst=$i['kap_terpasang_sst'];
                       $kap_terpasang_pra=$i['kap_terpasang_pra'];
                       $kap_terpakai_sst=$i['kap_terpakai_sst'];
                       $kap_terpakai_pra=$i['kap_terpakai_pra'];
                       $tgl_integrasi=$i['tgl_integrasi'];
                       $keterangan=$i['keterangan'];
            ?>
  <!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $tro_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit data switching</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/switching/update_switching'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $tro_id;?>"/> 
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Lokasi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="lokasi" class="form-control" value="<?php echo $lokasi;?>" id="inputUserName" placeholder="Lokasi" required>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama Perangkat</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama_perangkat" class="form-control" value="<?php echo $nama_perangkat;?>" id="inputUserName" placeholder="Nama Perangkat" required>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Type</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="type" class="form-control" value="<?php echo $type;?>" id="inputUserName" placeholder="Type">
                                        </div>
                                    </div>   
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Fungsi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="fungsi" class="form-control" value="<?php echo $fungsi;?>" id="inputUserName" placeholder="Fungsi">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kap. Terpasang SST</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kap_terpasang_sst" class="form-control" value="<?php echo $kap_terpasang_sst;?>" id="inputUserName" placeholder="Kap. Terpasang SST">
                                        </div>
                                    </div>  
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kap. Terpasang PRA</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kap_terpasang_pra" class="form-control" value="<?php echo $kap_terpasang_pra;?>" id="inputUserName" placeholder="Kap. Terpasang PRA">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kap. Terpakai SST</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kap_terpakai_sst" class="form-control" value="<?php echo $kap_terpakai_sst;?>" id="inputUserName" placeholder="Kap. Terpakai SST">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kap. Terpakai PRA</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kap_terpakai_pra" class="form-control" value="<?php echo $kap_terpakai_pra;?>" id="inputUserName" placeholder="Kap. Terpakai PRA">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Tanggal Integrasi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="tgl_integrasi" class="form-control" value="<?php echo $tgl_integrasi;?>" id="inputUserName" placeholder="Tanggal Integrasi">
                                        </div>
                                    </div>       
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan;?>" id="inputUserName" placeholder="Keterangan">
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
              $tro_id=$i['no_urut'];
                       $lokasi=$i['lokasi'];
                       $nama_perangkat=$i['nama_perangkat'];
                       $type=$i['type'];
            ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $tro_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Perangkat</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/switching/hapus_switching'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $tro_id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus <b><?php echo $nama_perangkat;?> - <?php echo $type;?></b> ?</p>
                               
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

<?php if(!$lokasi2):?>
<script>
  $(function () {
    //$("#example1").DataTable({
      //"paging": true,
      //"ordering": false,
      //"info": false
    //});
    var groupColumn = 0;
    var lokasi = "<?php echo $lokasi2; ?>";
    var table = $('#example1').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "scrollX": true,
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 15,
        "rowGroup": {
            startRender: null,
            endRender: function ( rows, group ) {
                return group +' ('+rows.count()+' rows)' + '<tr class="group" style="background-color: #d73925; color: #fff; font-weight: bold;"><td colspan="8">'+group+'</td><td>'+ rows.count() +'</td></tr>';
            }
        },
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                  if (!lokasi){
                                      $(rows).eq( i ).before(
                                          '<tr class="group" style="background-color: #d73925; color: #fff; font-weight: bold;"><td colspan="9">Lokasi: '+group+'</td><td></td></tr>'
                                      );
                              }
                  else {
                                      $(rows).eq( i ).before(
                                          '<tr class="group" style="background-color: #d73925; color: #fff; font-weight: bold;"><td colspan="9">Kelompok: '+group+'</td><td></td></tr>'
                                      );
                              }
 
                    last = group;
                }


            } );

                $('#example1 tbody').find('.group').each(function (i,v) {
                  var rowCount = $(this).nextUntil('.group').length;
                  $(this).find('td:last').append('<span class="label pull-right bg-green" style="font-size: 13px;">Jumlah: ' + rowCount + '</span>') });

        }
    } );
 
    // Order by the grouping


    $('#example1 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );

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
<?php else : ?>
<script>
  $(function () {
    $("#example1").DataTable({
      scrollX: true
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  </script>
  <?php endif; ?>
    
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Perangkat Switching Berhasil disimpan ke database.",
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
                    text: "Perangkat Switching berhasil di update",
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
                    text: "Perangkat Switching Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
      <?php endif;?>
</body>
</html>
