<script type="text/javascript">

	$(document).ready (function () {
		 $('.toast').toast('show');
		$('#dtBasicExample').DataTable();
		data_siswa();
		data_guru();
			
			// FUNGSI VALIDASI NIM
			
			$('#id_nim').change(function(){ 
                var id = document.getElementById('nisn').value;
                $.ajax({
                    url : "<?php echo site_url('admin/get_nim');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<input type="text" value="'+data[i].harga_jual+'" class="form-control" id="harga" name="harga" onKeyup="hitung();">';
                        }
                        $('#id_nim').html(html);
 
                    }
                });
                return false;
            }); 
			
			// END
			
		function data_siswa(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo site_url('user/get_siswa')?>',
				async  : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for (i=0; i<data.length; i++){
						html +='<tr>'+
								  '<td><strong>'+data[i].nisn+'</strong></td>'+
								  '<td>'+data[i].nama_siswa+'</td>'+
								  '<td>'+data[i].jenis_kelamin+'</td>'+
								  '<td>'+data[i].tanggal_lahir+'</td>'+
								  '<td>'+data[i].alamat+'</td>'+
								  '<td >'+
									'<button type="button" class="btn btn-info btn-rounded btn-sm px-2 item_edit" data-id_siswa="'+data[i].id_siswa+'" data-nisn="'+data[i].nisn+'" data-nama_siswa="'+data[i].nama_siswa+'" data-jenis_siswa="'+data[i].jenis_kelamin+'" data-tanggal_lahir="'+data[i].tanggal_lahir+'" data-alamat="'+data[i].alamat+'"><i class="fas fa-pencil-alt mt-0"></i></button>'+
									'<button type="button" class="btn btn-danger btn-rounded btn-sm px-2 item_hapus" data-id_siswa="'+data[i].id_siswa+'"><i class="far fa-trash-alt mt-0"></i></button>'+
								'</td>'+
								'</tr>';
					}
				
					$('#show_siswa').html(html);
				}
				
			});
		}
		
		
		$('#show_siswa').on('click','.item_edit',function(){
            var id	= $(this).data('id_siswa');
			var i	= $(this).data('nisn');
			var nm	= $(this).data('nama_siswa');
			var js	= $(this).data('jenis_siswa');
			var tgl	= $(this).data('tanggal_lahir');
			var al	= $(this).data('alamat');
            $('#modalEdit').modal('show');
            $('[name="id_siswa_edit"]').val(id);
			$('[name="nisn_edit"]').val(i);
			$('[name="nama_siswa_edit"]').val(nm);
			$('[name="jenis_kelamin_edit"]').val(js);
			$('[name="tanggal_lahir_edit"]').val(tgl);
			$('[name="alamat_edit"]').val(al);
        });
		
 
        //GET hapus
        $('#show_siswa').on('click','.item_hapus',function(){
            var id=$(this).data('id_siswa');
            $('#modalHapus').modal('show');
            $('[name="id_siswa_hapus"]').val(id);
        });

		//tambah siswa
		$('#tambah_siswa').on('click',function(){
            var nisn			= $('#nisn').val();
            var nama_siswa		= $('#nama_siswa').val();
            var jenis_kelamin	= $('#jenis_kelamin').val();
			var tanggal_lahir	= $('#tanggal_lahir').val();
			var alamat			= $('#alamat').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/simpan_siswa')?>",
                dataType : "JSON",
                data : {nisn:nisn ,nama_siswa:nama_siswa, jenis_kelamin:jenis_kelamin, tanggal_lahir:tanggal_lahir, alamat:alamat},
                success: function(data){
                    $('[name="nisn"]').val("");
                    $('[name="nama_siswa"]').val("");
                    $('[name="jenis_kelamin"]').val("");
					$('[name="tanggal_lahir"]').val("");
					$('[name="alamat"]').val("");
                    $('#modalRegisterForm').modal('hide');
                    data_siswa();
                }
            });
            return false;
        });
		
		//edit siswa
		$('#edit_siswa').on('click',function(){
            var id_siswa		= $('#id_siswa_edit').val();
			var nisn			= $('#nisn_edit').val();
            var nama_siswa		= $('#nama_siswa_edit').val();
            var jenis_kelamin	= $('#jenis_kelamin_edit').val();
			var tanggal_lahir	= $('#tanggal_lahir_edit').val();
			var alamat			= $('#alamat_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/update_siswa')?>",
                dataType : "JSON",
                data : {id_siswa:id_siswa , nisn:nisn, nama_siswa:nama_siswa, jenis_kelamin:jenis_kelamin, tanggal_lahir:tanggal_lahir, alamat:alamat},
                success: function(data){
                    $('[name="id_siswa_edit"]').val("");
					$('[name="nisn_edit"]').val("");
                    $('[name="nama_siswa_edit"]').val("");
                    $('[name="jenis_kelamin_edit"]').val("");
					$('[name="tanggal_lahir_edit"]').val("");
					$('[name="alamat_edit"]').val("");
                    $('#modalEdit').modal('hide');
                    data_siswa();
                }
            });
            return false;
        });
		
		//hapus siswa
		$('#hapus_siswa').on('click',function(){
            var id = $('#id_siswa_hapus').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/hapus_siswa')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_siswa_hapus"]').val("");
                    $('#modalHapus').modal('hide');
                    data_siswa();
                }
            });
            return false;
        });
		
		$('#tb_kriteria').on('click','.item_nilai',function(){
            var id=$(this).data('id_siswa');
            $('#modalNilai').modal('show');
            $('[name="id_siswa[]"]').val(id);
        });
		
		$('#tb_kriteria').on('click','.item_nilai_hapus',function(){
            var id=$(this).data('id_siswa');
            $('#modalNilaiHapus').modal('show');
            $('[name="id_siswa_nilai"]').val(id);
        });
		
	
		//===============Fungsi Guru==============//
			
			function data_guru(){
				$.ajax({
					type  : 'ajax',
					url   : '<?php echo site_url('user/get_data_private')?>',
					async  : false,
					dataType : 'json',
					success : function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++){
							html +='<div class="col-6 text-center">'+
									'<div style="height: 10px"></div>'+
									'<p class="title mb-0">'+data[i].nama_guru+'</p>'+
									'<p class="text " style="font-size: 13px">Guru Mapel  '+data[i].keterangan+'</p>'+
									'<p class="text " style="font-size: 13px">Kata Sandi  '+data[i].sandi+'</p>'+
									'<p class="text" style="font-size: 13px">Id '+data[i].id_guru+'</p>'+
								 ' </div>'+

								 ' <div class="col-5">'+
									'<button type="button" class="btn btn-elegant btn-sm float-right edit_guru" data-id_guru="'+data[i].id_guru+'" data-guru="'+data[i].nama_guru+'" data-ket="'+data[i].keterangan+'" data-sandi="'+data[i].sandi+'">Ubah</button>'+
								  '</div>'
									;
						}
					
						$('#show_guru').html(html);
					}
					
				});
			}
			
			$('#show_guru').on('click','.edit_guru',function(){
				var a	= $(this).data('id_guru');
				var b	= $(this).data('guru');
				var c	= $(this).data('ket');
				var d	= $(this).data('sandi');
				
				$('#formEdit').modal('show');
				$('[name="id_guru_edit"]').val(a);
				$('[name="nama_guru_edit"]').val(b);
				$('[name="ket_edit"]').val(c);
				$('[name="sandi_edit"]').val(d);
			});
			
			$('#ubah_guru').on('click',function(){
				var id_guru		= $('#id_guru_edit').val();
				var nama_guru	= $('#nama_guru_edit').val();
				var ket			= $('#ket_edit').val();
				var sandi		= $('#sandi_edit').val();
				
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('user/update_guru')?>",
					dataType : "JSON",
					data : {id_guru:id_guru, nama_guru:nama_guru, ket:ket, sandi:sandi},
					success: function(data){
						$('[name="id_guru_edit"]').val("");
						$('[name="nama_guru_edit"]').val("");
						$('[name="ket_edit"]').val("");
						$('[name="sandi_edit"]').val("");
						$('#formEdit').modal('hide');
						data_guru();
					}
				});
				return false;
			});
		
	});
</script>