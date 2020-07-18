<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<center><h1>Catalyst <?php echo $this->session->userdata('lokasi') ?></h1></center>
</center>
	<table cellpadding="3" border="1" id="myTable">
		<tr>
			<th>No</th>
			<th>Nama Katalis</th>
			<th>Lantai</th>
			<th>Ruang</th>
			<th>Port</th>
			<th>Arah</th>
			<th>Keterangan</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data->result_array() as $u): 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u['nama_catalyst'] ?></td>
			<td><?php echo $u['lantai'] ?></td>
			<td><?php echo $u['ruang'] ?></td>
			<td><?php echo $u['port'] ?></td>
			<td><?php echo $u['arah'] ?></td>
			<td><?php echo $u['keterangan'] ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript">
	$(function() {  
	//Created By: Brij Mohan
	//Website: https://techbrij.com
		function groupTable($rows, startIndex, total){
			if (total === 0){
				return;
			}
			var i , currentIndex = startIndex, count=1, lst=[];
			var tds = $rows.find('td:eq('+ currentIndex +')');
			var ctrl = $(tds[0]);
			lst.push($rows[0]);
			for (i=1;i<=tds.length;i++){
				if (ctrl.text() ==  $(tds[i]).text()){
					count++;
					$(tds[i]).addClass('deleted');
					lst.push($rows[i]);
				}
				else{
					if (count>1){
						ctrl.attr('rowspan',count);
						groupTable($(lst),startIndex+1,total-1)
					}
					count=1;
					lst = [];
					ctrl=$(tds[i]);
					lst.push($rows[i]);
				}
			}
		}
		groupTable($('#myTable tr:has(td)'),1,3);
		$('#myTable .deleted').remove();
	});
</script>
</html>