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
  <title>SIMALPRO <?php if ($lokasi) { echo $lokasi; }; ?> | Transport <?php echo $link;?></title>
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
  <?php else : ?>
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
        Transport <?php echo $link;?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php if ($lokasi) : ?><li><a href="#"><?php echo $lokasi;?></a></li><?php endif; ?>
        <li><a href="#">Transport</a></li>
        <li class="active"><?php echo $link;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="">
            <div class="box-header">
              <form action="<?php echo base_url().'admin/transport/add_transport'?>" method="post" enctype="multipart/form-data">
                <button class="btn btn-success btn-flat" value="<?php echo $link;?>" name="link"><span class="fa fa-plus"></span> Add Transport</button>
              </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                    <th>Nomor</th>
                    <!--<th>Link</th>-->
                    <th>Merk</th>
                    <th>Project</th>
                    <th>Tahun Operasi</th>
                    <th>Jenis & Type Fiber</th>
                    <th>Type Con. (Pig Tail)</th>
                    <th>Kap. Core</th>
                    <th>Kap. Terpakai</th>
                    <th>Kap. Idle</th>
                    <th>Rusak</th>
                    <th>Sisa Baik</th>
                    <th>Panjang (KM)</th>
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
                       $link=$i['link'];     
                       $merk=$i['merk'];     
                       $project=$i['project'];     
                       $tahun_operasi=$i['tahun_operasi'];     
                       $type_fiber=$i['type_fiber'];     
                       $type_con=$i['type_con'];     
                       $kap_core=$i['kap_core'];     
                       $kap_terpakai=$i['kap_terpakai'];
                       $kap_idle=$i['kap_idle'];     
                       $rusak=$i['rusak'];     
                       $sisa_baik=$i['sisa_baik'];     
                       $panjang=$i['panjang'];     
                       $keterangan=$i['keterangan'];     
                    ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <!--<td><?php echo $link;?></td>-->
                  <td><?php echo $merk;?></td>
                  <td><?php echo $project;?>
                  <?php if($lokasi) : ?>
                  <form action="<?php echo base_url().'admin/transport/project'?>" method="post" enctype="multipart/form-data">
                    <button class="btn btn-success btn-flat pull-left" value="<?php echo $project;?>" name="project">Lihat</button>
                  </form>
                  <?php endif; ?>
                  </td>
                  <td><?php echo $tahun_operasi;?></td>
                  <td><?php echo $type_fiber;?></td>
                  <td><?php echo $type_con;?></td>
                  <td><a href="<?php echo base_url().'admin/transport/edit_link/'.$no_urut?>"><?php echo $kap_core ;?></a></td>
                  <td><!--<a data-toggle="modal" data-target="#ModalEditPakai<?php echo $no_urut;?>"><?php echo $kap_terpakai ;?></a>-->
                  <?php echo $kap_terpakai ;?></td>
                  <td><?php echo $kap_idle;?></td>
                  <td><?php echo $rusak;?></td>
                  <td><?php echo $sisa_baik;?></td>
                  <td><?php echo $panjang;?></td>
                  <td><?php echo $keterangan;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $no_urut;?>"><span class="fa fa-pencil"></span></a>
                        <?php if($this->session->userdata('level')==1) :?><a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $no_urut;?>"><span class="fa fa-trash"></span></a><?php endif; ?>
                  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
              </table>
              <form action="<?php echo base_url().'admin/transport'?>" method="post" enctype="multipart/form-data">
                <button class="btn btn-success btn-flat pull-left" value="" name="link"><span class="fa fa-arrow-left"></span> Kembali</button>
              </form>
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


  <!--Modal Edit-->
  <?php foreach ($data->result_array() as $i) :
                       $no_urut=$i['no_urut'];
                       $link=$i['link'];     
                       $merk=$i['merk'];     
                       $project=$i['project'];     
                       $tahun_operasi=$i['tahun_operasi'];     
                       $type_fiber=$i['type_fiber'];     
                       $type_con=$i['type_con'];     
                       $kap_core=$i['kap_core'];     
                       $kap_terpakai=$i['kap_terpakai'];
                       $kap_idle=$i['kap_idle'];     
                       $rusak=$i['rusak'];     
                       $sisa_baik=$i['sisa_baik'];     
                       $panjang=$i['panjang'];     
                       $keterangan=$i['keterangan'];  
            ?>
  
        <div class="modal fade" id="ModalEdit<?php echo $no_urut;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Transport</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/transport/update_transport'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                                <input type="hidden" name="kode" value="<?php echo $no_urut;?>"/>       

                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Link</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="link" class="form-control" value="<?php echo $link;?>" id="inputUserName" placeholder="Link" required>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Merk</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="merk" class="form-control" value="<?php echo $merk;?>" id="inputUserName" placeholder="Merk">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Project</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="project" class="form-control" value="<?php echo $project;?>" id="inputUserName" placeholder="Project">
                                        </div>
                                    </div>   
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Tahun Operasi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="tahun_operasi" class="form-control" value="<?php echo $tahun_operasi;?>" id="inputUserName" placeholder="Tahun Operasi">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Type Fiber</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="type_fiber" class="form-control" value="<?php echo $type_fiber;?>" id="inputUserName" placeholder="Type Fiber">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Type Con.</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="type_con" class="form-control" value="<?php echo $type_con;?>" id="inputUserName" placeholder="Type Con.">
                                        </div>
                                    </div>  

                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kapasitas Core</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kap_core" class="form-control" value="<?php echo $kap_core;?>" id="inputUserName" placeholder="Kapasitas Core">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kapasitas Terpakai</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kap_terpakai" class="form-control" value="<?php echo $kap_terpakai;?>" id="inputUserName" placeholder="Kapasitas Terpakai">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kapasitas Idle</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="project" class="form-control" value="<?php echo $project;?>" id="inputUserName" placeholder="Kapasitas Idle">
                                        </div>
                                    </div>   
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Rusak</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="rusak" class="form-control" value="<?php echo $rusak;?>" id="inputUserName" placeholder="Rusak">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Sisa Baik</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="sisa_baik" class="form-control" value="<?php echo $sisa_baik;?>" id="inputUserName" placeholder="Sisa Baik">
                                        </div>
                                    </div>
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Panjang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="panjang" class="form-control" value="<?php echo $panjang;?>" id="inputUserName" placeholder="Panjang">
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
                       $no_urut=$i['no_urut'];
            ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $no_urut;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Transport</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/transport/hapus_transport'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $no_urut;?>"/> 
                            <p>Apakah Anda yakin mau menghapus data Transport ini?</p>
                               
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

    <!--Modal Edit-->
  <?php foreach ($data->result_array() as $i) :    
                       $no_urut=$i['no_urut'];
                       $linknm=$i['link'];
                       $kap_core=$i['kap_core'];     
                       $kap_terpakai=$i['kap_terpakai'];
                       $kap_idle=$i['kap_idle'];
                       $witelid=$i['idwitel']; 
                       $merk=$i['merk']; 
            ?>
  
        <div class="modal fade" id="ModalEditPakai<?php echo $no_urut;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Transport</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/transport/update_osp_pakai'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                                <input type="hidden" name="kode" value="<?php echo $no_urut;?>"/>
                                <input type="hidden" name="linknm" value="<?php echo $linknm;?>"/>
                                <input type="hidden" name="merk" value="<?php echo $merk;?>"/>
                                <input type="hidden" name="ncore" value="<?php echo $kap_core;?>"/>
                                <input type="hidden" name="witelid" value="<?php echo $witelid;?>"/>
                                
                                <?php $j=0;
                                $x=$this->m_transport->get_core_link($no_urut,$merk,$witelid);
                                foreach ($x->result_array() as $i){ ?>
                                  <div class="form-group">
                                        <input type="hidden" name="icore[]" value="<?php echo $j;?>"/>
                                        <label for="inputUserName" class="col-sm-2 control-label">Link <?php echo $j;?></label>
                                        <div class="col-sm-3">
                                            <input type="text" name="node1[]" class="form-control" value="<?php echo $i['node1'];?>" id="inputUserName" placeholder="Node 1">
                                        </div>
                                        <div class="col-sm-1">to</div>
                                        <div class="col-sm-3">
                                            <input type="text" name="node2[]" class="form-control" value="<?php echo $i['node2'];?>" id="inputUserName" placeholder="Node 2">
                                        </div>
                                        <a data-toggle="modal" data-target="#ModalHapusLink<?php echo $i['idkabel'];?>"><span class="fa fa-remove"></span></a>
                                    </div> 
                            <?php $j++;
                                }?>                            
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

  <?php foreach ($core->result_array() as $i) :
                       $idkabel=$i['idkabel'];
           ?>
  <!--Modal Hapus Link-->
        <div class="modal fade" id="ModalHapusLink<?php echo $idkabel;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Transport</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/transport/hapus_link'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $idkabel;?>"/> 
                            <p>Apakah Anda yakin mau menghapus data Transport ini?</p>
                               
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
    $("#example1").DataTable({
      "scrollX": true
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
                    text: "Transport Berhasil disimpan ke database.",
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
                    text: "Transport berhasil di update",
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
                    text: "Transport Berhasil dihapus.",
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
