<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMALPRO | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/square/blue.css'?>">

  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div>
   <p><?php echo $this->session->flashdata('msg');?></p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"> <img src="data:image/png;base64,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"></p><hr/>

    <form action="<?php echo base_url().'administrator/auth'?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->
    <hr/>
    <p><center>Copyright 2019.<br/> All Right Reserved</center></p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
