<form action="<?php echo site_url('user/simpan_siswa')?>" method="post">
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Tambah Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 
      <div class="modal-body mx-3">
        <div class="md-form mb-0">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" name="nisn" id="nisn" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">NISN Siswa</label>
        </div>
		 <div class="md-form mb-0">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" name="nama_siswa" id="nama_siswa" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Nama Siswa</label>
        </div>
		 <div class="md-form mb-0">
          <select id="jenis_kelamin" name="jenis_kelamin" class="browser-default custom-select">
			  <option selected>Pilih Jenis Kelamin</option>
			  <option value="L">Laki - Laki</option>
			  <option value="P">Perempuan</option>
			</select>
        </div>
		 <div class="md-form mb-0">
          <i class="far fa-calendar-alt prefix grey-text"></i>
          <input type="text"  name="tanggal_lahir" id="tanggal_lahir" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Tanggal Lahir 0000-00-00</label>
        </div>
        <div class="md-form mb-0">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" name="alamat" id="alamat" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Alamat</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange" type="submit" >Tambah</button>
      </div>
	 
    </div>
  </div>
</div>
 </form>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form>
      <div class="modal-body mx-3">
        <div class="md-form mb-0">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="hidden" name="id_siswa_edit" id="id_siswa_edit" class="form-control validate" readonly>
         
        </div>
		<div class="md-form mb-0">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" name="nisn_edit" id="nisn_edit" class="form-control validate" readonly>
          <label data-error="wrong" data-success="right" for="orangeForm-name"></label>
        </div>
		 <div class="md-form mb-0">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" name="nama_siswa_edit" id="nama_siswa_edit" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name"></label>
        </div>
		 <div class="md-form mb-0">
         <select id="jenis_kelamin_edit" name="jenis_kelamin_edit" class="browser-default custom-select">
			  <option selected>Pilih Jenis Kelamin</option>
			  <option value="L">Laki - Laki</option>
			  <option value="P">Perempuan</option>
			</select>
        </div>
		 <div class="md-form mb-0">
          <i class="far fa-calendar-alt prefix grey-text"></i>
          <input type="text"  name="tanggal_lahir_edit" id="tanggal_lahir_edit" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name"></label>
        </div>
        <div class="md-form mb-0">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" name="alamat_edit" id="alamat_edit" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email"></label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange" type="submit" id="edit_siswa">Ubah</button>
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
        <h4 class="modal-title w-100 font-weight-bold">Hapus Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form>
      <div class="modal-body mx-3">
        
          <input type="hidden" name="id_siswa_hapus" id="id_siswa_hapus" class="form-control validate">
         
		<h4>Apakah anda yakin akan menghapus siswa ini...!!!</h4>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit" id="hapus_siswa">Hapus</button>
      </div>
	  </form>
    </div>
  </div>
</div>



<div class="modal fade" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Tambah Nilai Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 <form action="<?php echo site_url('user/simpan_nilai')?>" method="post">
      <div class="modal-body mx-3">
       
		<?php foreach ($kriteria as $q){?>
	   <div class="md-form mb-0">
          <input type="hidden" name="id_siswa[]" id="id_siswa" class="form-control validate">
        </div>
		 <div class="md-form mb-0">
          <input type="hidden" name="id_kriteria[]" id="id_kriteria" value="<?= $q->id_kriteria ?>" class="form-control validate">
        </div>
		 <div class="md-form mb-0">
          <i class="fas fa-graduation-cap prefix grey-text"></i>
          <input type="text" name="nilai[]" id="validationServer013" class="form-control" required>
          <label for="validationServer013"><?= $q->kriteria ?></label>
		</div>
		<?php } ?>
		
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange" type="submit">Tambah</button>
      </div>
	</form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNilaiHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Hapus Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php echo site_url('user/delete_nilai')?>" method="post">
      <div class="modal-body mx-3">
        
          <input type="hidden" name="id_siswa_nilai" id="id_siswa_nilai" class="form-control validate">
         
		<h4>Apakah anda yakin akan menghapus nilai siswa ini...!!!</h4>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit" id="hapus_siswa">Hapus</button>
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
				  <input type="text" name="id_guru_edit" id="id_guru_edit" class="form-control" readonly>
				  <label data-error="right" data-success="right" for="form34"></label>
				</div>
				
				<div class="md-form mb-5">
				  <i class="fas fa-user prefix grey-text"></i>
				  <input type="text" name="nama_guru_edit" id="nama_guru_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form34"></label>
				</div>

				<div class="md-form mb-5">
				  <i class="fas fa-envelope prefix grey-text"></i>
				  <input type="email" name="ket_edit" id="ket_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form29"></label>
				</div>

				<div class="md-form mb-5">
				  <i class="fas fa-tag prefix grey-text"></i>
				  <input type="text" name="sandi_edit" id="sandi_edit" class="form-control validate">
				  <label data-error="wrong" data-success="right" for="form32"></label>
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button type="submit" id="ubah_guru" class="btn btn-unique">Update <i class="fas fa-paper-plane-o ml-1"></i></button>
			  </div>
			</div>
		  </div>
		</div>