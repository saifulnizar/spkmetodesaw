<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SPK Siswa Teladan</title>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
	<link href="<?php echo base_url().'asset/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'asset/css/addons/datatables.min.css'?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url().'asset/css/addons/datatables.css'?>" rel="stylesheet">
 
	<link href="<?php echo base_url().'asset/css/mdb.min.css'?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
	<link href="<?php echo base_url().'asset/css/style.css'?>" rel="stylesheet">

</head>
<body>
<div class="container">
<br>
	
<a href="<?php echo site_url('user')?>"><button type="button" class="btn btn-dark"><span id="log"></span></button></a>
							<!--Table-->
							<table class="table table-hover mb-0">
								<!--Table head-->
								<thead>
								  <tr>
									<th>NISN<i class="fas fa-sort ml-1"></i></th>
									<th>Nama<i class="fas fa-sort ml-1"></i></th>
									<th>Nilai<i class="fas fa-sort ml-1"></i></th>
								  </tr>
								</thead>
								<tbody>
								
									<?php foreach ($rank as $row) {?>
									<tr>
										<td><?= $row->nisn ?></td>
										<td><?= $row->nama_siswa ?></td>
										<td><?= $row->nilai ?></td>
										</tr>
									<?php } ?>
									
								</tbody>
							  </table>
				
				
</div>


  <script type="text/javascript" src="<?php echo base_url().'asset/js/jquery-3.4.1.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/addons/datatables.min.js'?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url().'asset/js/popper.min.js'?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url().'asset/js/bootstrap.min.js'?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript">
  
$(document).ready (function () {

	window.print();
	$('#log').html('Kembali');
});	
  </script>
  

</body>
</html>