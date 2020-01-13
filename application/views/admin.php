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
<div class="container" >
<br>
	<nav class="navbar navbar-expand-md navbar-dark mdb-color mb-0">
		<!-- SideNav slide-out button -->
		<div class="float-left">
		 
		</div>
		<!-- Breadcrumb-->
		<div class="mr-auto">
		  <nav aria-label="breadcrumb">
			<ol class="breadcrumb clearfix d-none d-md-inline-flex pt-0">
			  <ul class="nav nav-pills" id="pills-tab" role="tablist">
			   <li class="nav-item">
				<a class="nav-link btn btn-dark " id="pills-contact-tab" data-toggle="pill" href="#pills-my" role="tab"
				  aria-controls="pills-my" aria-selected="false">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link btn btn-dark  " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
				  aria-controls="pills-home" aria-selected="true">Seleksi Siswa</a>
			  </li>
			  <li class="nav-item" id="hasil">
				<a class="nav-link btn btn-dark " id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
				  aria-controls="pills-contact" aria-selected="false">Hasil Seleksi</a>
			  </li>
			   
			</ul>
			</ol>
		  </nav>
		</div>
		<ul class="navbar-nav ml-auto nav-flex-icons">
		  
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
			  aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i><?php echo $this->session->userdata('username')?>
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink">
			  <a class="dropdown-item waves-effect waves-light" href="<?php echo site_url('welcome/logout')?>">Keluar</a>
			</div>
		  </li>
		</ul>
	</nav>
	<hr>
	
			<div class="tab-content pt-2 pl-1" id="pills-tabContent">
			   <div class="tab-pane fade show active" id="pills-my" role="tabpanel" aria-labelledby="pills-my-tab">
				
				<div class="row">
					
					<div class="col-6">
						<img src="<?php echo base_url('asset/img/sd.jpg')?>" alt="Responsive image" class="img-fluid">
					</div>
				
					<div class="col-6">
						<p class="h6"><strong> SELAMAT DATANG DI HALAMAN KEPALA SEKOLAH </strong>SPK SISWA TELADAN SDN BANYUWANGI 1 </p>
						<hr>
						<div class="row">
							<div class="col-6">
							<p class="card-text">Berikut adalah kriteria yang di gunakan sebagai acuan dalam pemilihan  siswa teladan </p>
							
							<p class="card-text">1. Akhlak</p>
							<p class="card-text">2. Sikap</p>
							<p class="card-text">3. Nilai Rapot</p>
							<p class="card-text">4. Kuesioner</p>
							</div>
							<div class="col-6">
							<p class="text-center">Tabel Rating Kecocokan</p>
								<table class="table table-sm table-bordered">
								  <thead class="grey lighten-2">
									<tr>
									  <th style="text-align:center;"><strong>Nilai</strong></th>
									  <th style="text-align:center;"><strong>Keterangan</strong></th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
										<td style="text-align:center;">0 - 59 </td>
										<td style="text-align:center;">Sangat Kurang</td>
									</tr>
									<tr>
										<td style="text-align:center;">60 - 69 </td>
										<td style="text-align:center;">Kurang</td>
									</tr>
									<tr>
										<td style="text-align:center;">70 - 79 </td>
										<td style="text-align:center;">Cukup</td>
									</tr>
									<tr>
										<td style="text-align:center;">80 - 89 </td>
										<td style="text-align:center;">Baik</td>
									</tr>
									<tr>
										<td style="text-align:center;">90 - 100 </td>
										<td style="text-align:center;">Sangat Baik</td>
									</tr>
								  </tbody>
								</table>
							</div>
						</div>
						<hr>
						<p class="h6">Langkah Menjalankan sistem</p>
						<p class="card-text"><strong> 1. Pilih menu seleksi siswa untuk mengelola bobot kriteria dan melakukan seleksi</strong></p>
						
						<p class="card-text"><strong> 2. Pilih menu hasil seleksi untuk melihat rekomendasi siswa teladan </strong></p>
						<hr>
						<p class="h6">Info Akun</p>
						<p class="title mb-0"><?php echo $this->session->userdata('username')?></p>
						<p class="text-muted " style="font-size: 13px"><?php echo $this->session->userdata('keterangan')?></p>
						<p class="text-muted " style="font-size: 13px"><?php echo $this->session->userdata('id_guru')?></p> 
					</div>
						
				<?php echo $this->session->flashdata('gagal');?>
				</div>
					<hr>
					<button type="button" class="btn btn-elegant btn-sm float-right" id="tampil_daftar">Daftar Guru</button>
						<button type="button" class="btn btn-elegant btn-sm float-right" id="tutup_daftar">Tutup</button>
					<div class = "row">
					<div class="col-7">
						<div class="card card-cascade narrower" id="tabel_aktif">
							<div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

								<div>
								 
								</div>

								<p class="white-text mx-3">Tabel Guru</p>

								<div>
								  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#modalContactForm">
									<i class="fas fa-p-alt mt-0"></i> Tambah 
								  </button>
								</div>

							</div>
							<div class="px-4">
								<div class="table-wrapper table-sm">
									<!--Table-->
									<table class="table table-hover mb-0">
										<!--Table head-->
										<thead>
										  <tr>
											<th>Id</th>
											<th>Nama</th>
											<th>Keterangan</th>
											<th>Sandi</th>
											<th style="text-align:center;">Action<i class="fas fa-sort ml-1"></i></th>
										  </tr>
										</thead>
										<tbody id="show_guru">
										
											<!--Tampilkan guru-->
											
										</tbody>
									 </table>
								</div>

							</div>
						</div>
					</div>
					
						<div class="col-5">
						<div class="card card-cascade narrower" id="tabel_pasif">
							<div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

								<div>
								</div>

								<p class="white-text mx-3">Tabel Guru Non Aktif</p>

								<div>
								</div>

							</div>
							<div class="px-4">
								<div class="table-wrapper table-sm">
									<!--Table-->
									<table class="table table-hover mb-0">
										<!--Table head-->
										<thead>
										  <tr>
											<th>Id</th>
											<th>Nama</th>
											<th style="text-align:center;">Action</th>
										  </tr>
										</thead>
										<tbody id="show_non">
										
											<!--Tampilkan guru-->
											
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
						
					</div>
			  </div>
			 
			 <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div class="row">
				  <div class="col-5">
				  <div class="card">
						  <div class="card-body">
						 
							<p class="h5">Setelah menambah atau menghapus kriteria silakan reset nilai siswa </p>
							
						  </div>
						</div>
						<br>
					<div class="card card-cascade narrower">
						<div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

							<div>
							</div>

							<p class="white-text mx-3">Tabel Kriteria</p>

							<div>
							  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#modalTambah">
								<i class="fas fa-p-alt mt-0"></i> Tambah 
							  </button>
							</div>

						</div>
						<div class="px-4">
							<div class="table-wrapper tbale">
								<!--Table-->
								<table class="table table-hover mb-0">
									<!--Table head-->
									<thead>
									  <tr>
										<th>#<i class="fas fa-sort ml-1"></i></th>
										<th>Kriteria<i class="fas fa-sort ml-1"></i></th>
										<th>Bobot<i class="fas fa-sort ml-1"></i></th>
										<th style="text-align:center;">Action<i class="fas fa-sort ml-1"></i></th>
									  </tr>
									</thead>
									<tbody id="show_bobot">
									
										<!--Tampilkan siswa-->
										
									</tbody>
								 </table>
							</div>

						</div>
					</div>
					<!-- Table with panel -->
				  </div>
				   
					<div class="col-7">
					
						<div class="card">
						  <div class="card-body">
						  <button type="submit" id="seleksi" class="btn btn-elegant float-right"><span class="text float-left" id="logText"></span>
								</button>
							<p class="h5">Untuk melakukan proses seleksi pastikan semua data nilai siswa sudah terisi </p>
							<span id="pesan" ></span>
						  </div>
						</div>
						<br>
						<div class="card card-cascade narrower">
						<div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

							<div>
							 
							</div>

							<a href="" class="white-text mx-3">Tabel Nilai Calon Siswa Teladan</a>

							<div>
							 <a href="<?php echo site_url('admin/reset_nilai')?>"> <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
								<i class="fas fa-p-alt mt-0"></i> Reset 
							  </button></a>
							</div>

						</div>
						<div class="px-4">

							<div class="table-wrapper tbale">
								<!--Table-->
								<table class="table table-hover mb-0" id="nilai_siswa">
									<!--Table head-->
									<thead>
									  <tr>
										<th>Nama</th>
										<?php foreach ($kriteria as $row) {?>
										<th><?= $row->kriteria ?></th>
										<?php }?>
										<th>Info</th>
									  </tr>
									</thead>
									<tbody>
									
										<?php kriteria() ?>
										
									</tbody>
								 </table>
							</div>

						</div>
					</div>
						
					</div>
				
				
				</div>
				
				
			  </div>
			  
			  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
				<div class="row">
				<div class="col-7">
				<div class="card card-cascade narrower">
					<div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

						<div>
						 
						</div>

						<a href="" class="white-text mx-3">Tabel Normalisasi</a>

						<div>
						
						</div>

					</div>
					<div class="px-4">

						<div class="table-wrapper">
							<!--Table-->
							<table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm">
								<!--Table head-->
								<thead>
								  <tr>
									<th>NISN</th>
									<th>Nama</th>
									<?php foreach ($kriteria as $row) {?>
										<th><?= $row->kriteria ?></th>
										<?php }?>
								  </tr>
								</thead>
								<tbody>
								
									<?php get_normalisasi() ?>
									
								</tbody>
							  </table>
						</div>

					</div>
				</div>
				</div>
					<div class="col-5">
					
					</div>
				</div>
				<br>
				<hr>
				<div>
				<p class="text-center h6">Tabel Hasil Seleksi</p><a href = "<?php echo site_url('admin/print_hasil')?>">
				<button type="button" class="float-left btn btn-sm btn-primary">Print Hasil</button></a>
				</div>
				<hr>
				<div class="row">
					
						<?php group() ?>
					
					
				</div>

			  </div>
			
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
  
  <?php $this->load->view('asset/ajax_admin')?>
  <?php $this->load->view('asset/modal_admin')?>

</body>
</html> 