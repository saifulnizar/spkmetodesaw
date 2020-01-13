

	
	<!--============================ MODAL UNTUK TB_KRITERIA =================================-->
	
		<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Edit Kriteria</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form>
			  <div class="modal-body mx-3">
				<div class="md-form mb-5">
				  
				  <input type="hidden" id="id_kriteria" name="id_kriteria" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="defaultForm-email"></label>
				</div>

				<div class="md-form mb-4">
				  <i class="fas fa-graduation-cap prefix grey-text"></i>
				  <input type="text" id="kriteria_edit" name="kriteria_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
				</div>
				
				 <div class="md-form mb-3">
				  <i class="fas fa-graduation-cap prefix grey-text"></i>
				  <input type="text" id="bobot_edit" name="bobot_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="defaultForm-pass"></label>
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="edit_kriteria">Edit</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>


		<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Tambah Kriteria</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form  method="POST">
			  <div class="modal-body mx-3">
			  
				<div class="md-form mb-4">
				  <i class="fas fa-graduation-cap prefix grey-text"></i>
				  <input type="text" id="kriteria" name="kriteria" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="defaultForm-pass">Kriteria</label>
				</div>
				
				 <div class="md-form mb-3">
				  <i class="fas fa-graduation-cap prefix grey-text"></i>
				  <input type="text" id="bobot" name="bobot" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="defaultForm-pass">Bobot</label>
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="tambah_kriteria">Tambah</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>

		<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Hapus Kriteria</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form>
			  <div class="modal-body mx-3">
				
				  <input type="hidden" name="id_kriteria" id="id_kriteria" class="form-control validate">
				 
				<h4>Apakah anda yakin akan menghapus kriteria ini...!!!</h4>
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="hapus">Hapus</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		
		<!--============================ MODAL UNTUK TB_GURU =================================-->
		
		<div class="modal fade" id="formPasif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Mute Akun Guru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form>
			  <div class="modal-body mx-3">
				
				  <input type="hidden" name="id_guru_pasif" id="id_guru_pasif" class="form-control validate">
				<h4>Apakah anda yakin akan menonaktifkan akun ini...!!!</h4>
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="pasif" >Mute</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade" id="formHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Hapus Akun Guru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form>
			  <div class="modal-body mx-3">
				
				  <input type="hidden" name="id_guru_hapus" id="id_guru_hapus" class="form-control validate">
				<h4>Apakah anda yakin akan menghapus akun ini...!!!</h4>
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="delete" >Hapus</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade" id="formAktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Aktifasi Akun Guru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form>
			  <div class="modal-body mx-3">
				
				  <input type="hidden" name="id_guru" id="id_guru" class="form-control validate">
				<h4>Apakah anda yakin akan mengaktifkan akun ini...!!!</h4>
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="aktif" >Aktifasi</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Tambah Akun Guru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/simpan_guru')?>" method="post">
			  <div class="modal-body mx-3">
				
				<div class="md-form mb-5">
				  <i class="fas fa-user prefix grey-text"></i>
				  <input type="text" name="id_guru_tambah" id="id_guru_tambah" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form34">Id Guru</label>
				</div>
				
				<div class="md-form mb-5">
				  <i class="fas fa-user prefix grey-text"></i>
				  <input type="text" name="nama_guru" id="nama_guru" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form34">Nama</label>
				</div>

				<div class="md-form mb-5">
				  <i class="fas fa-info prefix grey-text"></i>
				  <input type="text" name="ket" id="ket" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form29">Keterangan</label>
				</div>

				<div class="md-form mb-5">
				  <i class="fas fa-key prefix grey-text"></i>
				  <input type="text" name="sandi" id="sandi" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form32">Kata sandi</label>
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-unique">Tambah <i class="fas fa-paper-plane-o ml-1"></i></button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		
		
		<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Update Akun Guru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body mx-3">
				
				<div class="md-form mb-5">
				  <i class="fas fa-user prefix grey-text"></i>
				  <input type="hidden" name="id_guru_edit" id="id_guru_edit" class="form-control validate" readonly>
				 
				</div>
				
				<div class="md-form mb-5">
				  <i class="fas fa-user prefix grey-text"></i>
				  <input type="text" name="nama_guru_edit" id="nama_guru_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form34"></label>
				</div>

				<div class="md-form mb-5">
				  <i class="fas fa-info prefix grey-text"></i>
				  <input type="text" name="ket_edit" id="ket_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form29"></label>
				</div>

				<div class="md-form mb-5">
				  <i class="fas fa-key prefix grey-text"></i>
				  <input type="text" name="sandi_edit" id="sandi_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form32"></label>
				</div>
				
				<div class="md-form mb-5">
				  <i class="fas fa-tag prefix grey-text"></i>
				  <input type="text" name="level" id="level" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form32"></label>
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button type="submit" id="ubah_guru" class="btn btn-unique">Update <i class="fas fa-paper-plane-o ml-1"></i></button>
			  </div>
			</div>
		  </div>
		</div>
		
		
			
		<!--============================ MODAL UNTUK HITUNG =================================-->
	
		<div class="modal fade right" id="HasilHitung" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
		  <div class="modal-dialog modal-fluid" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalPreviewLabel">Hasil Perhitungan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
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
							<table class="table table-hover mb-0">
								<!--Table head-->
								<thead>
								  <tr>
									<th>Nama<i class="fas fa-sort ml-1"></i></th>
									<?php foreach ($kriteria as $row) {?>
										<th><?= $row->kriteria ?><i class="fas fa-sort ml-1"></i></th>
										<?php }?>
								  </tr>
								</thead>
								<tbody>
								
									<?php normalisasi() ?>
									
								</tbody>
							  </table>
						</div>

					</div>
				</div>
				</div>
					<div class="col-5">
						<div class="card card-cascade narrower">
						<div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

							<div>
							 
							</div>

							<a href="" class="white-text mx-3">Tabel Hasil</a>

							<div>
							 
							</div>

						</div>
						<div class="px-4">

							<div class="table-wrapper">
								<!--Table-->
								<table class="table table-hover mb-0">
									<!--Table head-->
									<thead>
									  <tr>
										<th>Nama<i class="fas fa-sort ml-1"></i></th>
										<th>Nilai<i class="fas fa-sort ml-1"></i></th>
									  </tr>
									</thead>
									<tbody>
									
											<?php rangking() ?>
										
									</tbody>
								  </table>
							</div>

						</div>
						</div>
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<a href="<?php echo site_url('admin/hitung');?>"><button type="button" class="btn btn-primary">Simpan</button></a>
			  </div>
			</div>
		  </div>
		</div>
		<!-- Modal -->
		
		
		
		
		<!--Modal: modalSocial-->
<div class="modal fade" id="modalSocial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">

    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header light-blue darken-3 white-text">
        <h4 class="title"><i class="fas fa-users"></i>Info Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>

      <!--Body-->
      <div class="modal-body mb-0" id="info_siswa">

		<input type="text" name="id_guru" id="id_guru" class="form-control validate">

      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: modalSocial-->