<script type="text/javascript">

	$(document).ready (function () {
		
		$('#dtVerticalScrollExample').DataTable({
"scrollY": "200px",
"scrollCollapse": true,
});

 $('.toast').toast('show');
$('.dataTables_length').addClass('bs-select');
		
		setInterval(function(){
			button_seleksi();
		}, 5000);
		
		$('#tabel_aktif').hide(); $('#tabel_pasif').hide(); $('#tutup_daftar').hide();
		
		$('#tampil_daftar').on('click',function(){
			setTimeout(function(){
						$('#tampil_daftar').hide();
						$('#tabel_aktif').show(); $('#tabel_pasif').show(); $('#tutup_daftar').show();	
						}, 500);
		});
		
		$('#tutup_daftar').on('click',function(){
			setTimeout(function(){
						
						$('#tabel_aktif').hide(); $('#tabel_pasif').hide(); $('#tutup_daftar').hide();	
						$('#tampil_daftar').show();
						}, 500);
		});
		
		data_kriteria();
		data_guru();
		data_guru_non();
		button_seleksi();
		
		function data_kriteria(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo site_url('admin/get_kriteria')?>',
				async  : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for (i=0; i<data.length; i++){
						html +='<tr>'+
								  '<td>'+data[i].id_kriteria+'</td>'+
								  '<td>'+data[i].kriteria+'</td>'+
								  '<td>'+data[i].bobot+'</td>'+
								  '<td style="text-align:center;">'+
									'<button type="button" class="btn btn-info btn-sm item_edit px-3" data-id_kriteria="'+data[i].id_kriteria+'" data-kriteria="'+data[i].kriteria+'" data-bobot="'+data[i].bobot+'">Edit</button>'+
									'<button type="button" class="btn btn-danger btn-sm item_hapus px-3" data-id_kriteria="'+data[i].id_kriteria+'">Hapus</button>'+
								'</td>'+
								'</tr>';
					}
				
					$('#show_bobot').html(html);
				}
				
			});
		}
		
		// ambil data bobot untuk proses edit
		$('#show_bobot').on('click','.item_edit',function(){
            var id	= $(this).data('id_kriteria');
			var nm	= $(this).data('kriteria');
			var js	= $(this).data('bobot');;
            $('#modalEdit').modal('show');
            $('[name="id_kriteria"]').val(id);
			$('[name="kriteria_edit"]').val(nm);
			$('[name="bobot_edit"]').val(js);
        });
		
		$('#show_bobot').on('click','.item_hapus',function(){
            var id	= $(this).data('id_kriteria')
            $('#modalHapus').modal('show');
            $('[name="id_kriteria"]').val(id);
        });
		
		// fungsi edit kriteria
		$('#edit_kriteria').on('click',function(){
            var id_kriteria= $('#id_kriteria').val();
            var kriteria	= $('#kriteria_edit').val();
            var bobot	= $('#bobot_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/update_kriteria')?>",
                dataType : "JSON",
                data : {id_kriteria:id_kriteria, kriteria:kriteria, bobot:bobot},
                success: function(data){
                    $('[name="id_kriteria"]').val("");
                    $('[name="kriteria"]').val("");
                    $('[name="bobot"]').val("");
                    $('#modalEdit').modal('hide');
                    data_kriteria();
                }
            });
            return false;
        });
		
		
		$('#tambah_kriteria').on('click',function(){
            var kriteria	= $('#kriteria').val();
            var bobot		= $('#bobot').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/simpan_kriteria')?>",
                dataType : "JSON",
                data : {kriteria:kriteria, bobot:bobot},
                success: function(data){
                    $('[name="kriteria"]').val("");
                    $('[name="bobot"]').val("");
                    $('#modalTambah').modal('hide');
                    data_kriteria();
                }
            });
            return false;
        });
		
		$('#hapus').on('click',function(){
            var id	= $('#id_kriteria').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/hapus_kriteria')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_kriteria"]').val("");
                    $('#modalHapus').modal('hide');
                    data_kriteria();
                }
            });
            return false;
        });
		
	//================END Kriteria=======================
	
	
	
	
	
	//=================== FUNGSI TB_GURU ==================
	  
	  
		function data_guru(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo site_url('admin/get_aktif')?>',
				async  : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for (i=0; i<data.length; i++){
						html +='<tr>'+
								  '<td>'+data[i].id_guru+'</td>'+
								  '<td>'+data[i].nama_guru+'</td>'+
								  '<td>'+data[i].keterangan+'</td>'+
								  '<td>'+data[i].sandi+'</td>'+
								  '<td style="text-align:center;">'+
									'<button type="button" class="btn btn-info btn-sm edit_guru px-3" data-id_guru="'+data[i].id_guru+'" data-guru="'+data[i].nama_guru+'" data-ket="'+data[i].keterangan+'" data-sandi="'+data[i].sandi+'" data-level="'+data[i].level+'">Edit</button>'+
									'<button type="button" class="btn btn-danger btn-sm hapus_guru px-3" data-id_guru="'+data[i].id_guru+'">Hapus</button>'+
									'<button type="button" class="btn btn-warning btn-sm pasif_guru px-3" data-id_guru="'+data[i].id_guru+'">Mute</button>'+
								
								'</td>'+
								'</tr>';
					}
				
					$('#show_guru').html(html);
				}
				
			});
		}
		
		function data_guru_non(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo site_url('admin/get_pasif')?>',
				async  : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for (i=0; i<data.length; i++){
						html +='<tr>'+
								  '<td>'+data[i].id_guru+'</td>'+
								  '<td>'+data[i].nama_guru+'</td>'+
								  '<td style="text-align:center;">'+
									'<button type="button" class="btn btn-warning btn-sm aktif_guru px-3" data-id_guru="'+data[i].id_guru+'">Aktif</button>'+
								
								'</td>'+
								'</tr>';
					}
				
					$('#show_non').html(html);
				}
				
			});
		}
		
			
		$('#show_guru').on('click','.edit_guru',function(){
            var a	= $(this).data('id_guru');
			var b	= $(this).data('guru');
			var c	= $(this).data('ket');
			var d	= $(this).data('sandi');
			var e	= $(this).data('level');
			
            $('#formEdit').modal('show');
            $('[name="id_guru_edit"]').val(a);
			$('[name="nama_guru_edit"]').val(b);
			$('[name="ket_edit"]').val(c);
			$('[name="sandi_edit"]').val(d);
			$('[name="level"]').val(e);
        });
		
		$('#show_guru').on('click','.hapus_guru',function(){
            var id	= $(this).data('id_guru');
            $('#formHapus').modal('show');
            $('[name="id_guru_hapus"]').val(id);
        });
		
		$('#show_guru').on('click','.pasif_guru',function(){
            var id	= $(this).data('id_guru');
            $('#formPasif').modal('show');
            $('[name="id_guru_pasif"]').val(id);
        });
		
		$('#show_non').on('click','.aktif_guru',function(){
            var id	= $(this).data('id_guru');
            $('#formAktif').modal('show');
            $('[name="id_guru"]').val(id);
        });
		
		
		$('#tambah_guru').on('click',function(){
            var id_guru		= $('#id_guru_tambah').val();
            var nama_guru	= $('#nama_guru').val();
			var ket			= $('#ket').val();
			var sandi		= $('#sandi').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/simpan_guru')?>",
                dataType : "JSON",
                data : {id_guru:id_guru, nama_guru:nama_guru, ket:ket, sandi:sandi},
                success: function(data){
                    $('[name="id_guru_tambah"]').val("");
					$('[name="nama_guru"]').val("");
					$('[name="ket"]').val("");
                    $('[name="sandi"]').val("");
                    $('#modalContactForm').modal('hide');
                    data_guru();
                }
            });
            return false;
        });
		
		$('#ubah_guru').on('click',function(){
            var id_guru		= $('#id_guru_edit').val();
            var nama_guru	= $('#nama_guru_edit').val();
			var ket			= $('#ket_edit').val();
			var sandi		= $('#sandi_edit').val();
			var level		= $('#level').val();
			
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/update_guru')?>",
                dataType : "JSON",
                data : {id_guru:id_guru, nama_guru:nama_guru, ket:ket, sandi:sandi, level:level},
                success: function(data){
                    $('[name="id_guru_edit"]').val("");
					$('[name="nama_guru_edit"]').val("");
					$('[name="ket_edit"]').val("");
                    $('[name="sandi_edit"]').val("");
					$('[name="level"]').val("");
                    $('#formEdit').modal('hide');
                    data_guru();
                }
            });
            return false;
        });
		
		$('#delete').on('click',function(){
            var id	= $('#id_guru_hapus').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/hapus_guru')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_guru_hapus"]').val("");
                    $('#formHapus').modal('hide');
                    data_guru();
                }
            });
            return false;
        });
		
		$('#pasif').on('click',function(){
            var id	= $('#id_guru_pasif').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/pasif_guru')?>",
                dataType : "JSON",
                data : {id:id,},
                success: function(data){
                    $('[name="id_guru"]').val("");
                    $('#formPasif').modal('hide');
                    data_guru();
					data_guru_non();
                }
            });
            return false;
        });
		
		$('#aktif').on('click',function(){
            var id	= $('#id_guru').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/aktif_guru')?>",
                dataType : "JSON",
                data : {id:id,},
                success: function(data){
                    $('[name="id_guru"]').val("");
                    $('#formAktif').modal('hide');
                    data_guru();
					data_guru_non();
                }
            });
            return false;
        });
	  
	//=================== END FUNGSI TB_GURU ==================//
	
	
	//============FUNGSI SELEKSI============//
	
		$('#logText').html('Seleksi');
		
		$('#seleksi').on('click',function(){
			$('#logText').html('Proses hitung.....');
			$('#seleksi').removeClass('btn-elegant').addClass('btn-default').show();
						setTimeout(function(){
							$('#logText').html('');
							$('#logText').removeClass('text').addClass('spinner-border').show();
							//location.reload();
						}, 1000);
						
						setTimeout(function(){
							$('#logText').removeClass('spinner-border').addClass('text').show();
							$('#seleksi').removeClass('btn-default').addClass('btn-elegant').show();
							$('#logText').html('Seleksi');
							$('#HasilHitung').modal('show');
						}, 2000);
		});
	
	//==========END FUNGSI SELEKSI==========//
	

	  //========= FUNGSI INFO SISWA ==========//
	  
		$('#nilai_siswa').on('click','.info',function(){
			var id=$(this).attr('data');
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/admin/get_info')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html +='<p class="font-weight-bold">NISN			:<span>'+data[i].nisn+'</span></p>'+
								'<p class="font-weight-bold">Nama			:<span>'+data[i].nama_siswa+'</span></p>'+
								'<p class="font-weight-bold">Gender			:<span>'+data[i].jenis_kelamin+'</span></p>'+
								'<p class="font-weight-bold">Tanggal Lahir	:<span>'+data[i].tanggal_lahir+'</span></p>'+
								'<p class="font-weight-bold">Alamat			:<span>'+data[i].alamat+'</span></p>'+
								'<hr>'+
								'<p class="font-weight-bold">Nama Wali Kelas :<span>'+data[i].nama_guru+'</span></p>'+
								'<p class="font-weight-bold">Id Wali Kelas   :<span>'+data[i].id_guru+'</span></p>'
						;
                    }
                    $('#info_siswa').html(html); 
					$('#modalSocial').modal('show');
                }
				
            });
		});
		
	//========= END FUNGSI INFO SISWA ==========//
	
	
			// FUNGSI BUTTON SELEKSI // 
			
			function button_seleksi(){
				$.ajax({
					type  : 'ajax',
					url   : '<?php echo site_url('admin/button')?>',
					async  : false,
					dataType : 'json',
					success : function(response){
						$('#pesan').html(response.message);
						
						if (response.error) {
							$('#seleksi').hide();
						}
						else{
							$('#seleksi').show();
						}
				
					}
					
				});
			}
			
	});
</script>