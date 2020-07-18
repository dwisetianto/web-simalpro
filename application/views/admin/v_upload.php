
<html>
<head>
	<title>Tes</title>
</head>
<body>
	<center><h1>Membuat Upload File Dengan CodeIgniter</h1></center>
	<?php echo $error;?>
 
 <form action="<?php echo base_url().'admin/uploadi/do_uploadi'?>" method="post" enctype="multipart/form-data">
 
	<input type="file" name="berkas" />
 
	<br /><br />
 
	<input type="submit" value="upload" />
 
</form>
 
</body>
</html>