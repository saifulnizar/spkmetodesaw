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
<br><br>
<p class="text-center h4">Selamat Datang </p>
<br>
<div class="row  justify-content-md-center">

<div class="col-5">
<section class="form-simple">

  <!--Form with header-->
  <div class="card">
    <div class="header pt-3 grey lighten-2">

      <div class="row d-flex justify-content-start">
        <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">SPK Siswa Teladan</h3>
      </div>

    </div>
	<form action="<?php echo site_url('welcome/login')?>" method="post">
    <div class="card-body mx-4 mt-4">
      <div class="md-form">
        <input type="text" id="nama" name="nama" class="form-control" required>
        <label for="Form-email4">Username</label>
      </div>

      <div class="md-form pb-3">
        <input type="password" id="sandi" name="sandi" class="form-control" required>
        <label for="sami">Password</label>
      </div>

      <div class="text-center mb-4">
        <button type="submit" class="btn btn-danger btn-block z-depth-2">Masuk</button>
      </div>
	 <?php echo $this->session->flashdata('msg');?>
    </div>
	</form>
  </div>

</section>
</div>


</div>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/jquery-3.4.1.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'asset/js/addons/datatables.min.js'?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url().'asset/js/popper.min.js'?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url().'asset/js/bootstrap.min.js'?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url().'asset/js/mdb.min.js'?>"></script>

</body>
</html>