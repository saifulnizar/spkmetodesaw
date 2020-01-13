	<?php
	function get_normalisasi_guru($id){
		$ci = &get_instance();
		
		// ambil data tb_alternatif
		$siswa = $ci->db->query("select * from data_siswa where id_guru = '$id'")->result();
			
		/* START ulangi sebanyak data tb_alternatif */
		$i = 1;
		foreach($siswa as $a){ ?>
		
			<!-- M U L A I     tampilkan pada tabel -->
			<tr>
				<td><?= $a->nisn ?></td>
				<td><?= $a->nama_siswa ?></td>
				
				<?php
					// ambil jumlah data tb_kriteria
					$count = $ci->db->query("SELECT * FROM tb_kriteria")->result();
					
					/* START ulangi sebanyak jumlah data tb_kriteria */
					foreach($count as $x) {
						
						// SELECT nilai berdasarkan id_alternatif dan id_kriteria
						$ci->db->where('id_siswa', $a->id_siswa);
						$kriteria = $ci->db->where('id_kriteria', $x->id_kriteria)->get('tb_normal')->row();?>
							
							<?php /*========= Cek kekosongan data =========*/
								
									if (empty($kriteria->normalisasi)) {?>
								
										<td>data belum di hitung
										</td>
								
								<?php } else {?>
								
									<td><?= $kriteria->normalisasi ?></td>

								<?php } /*======= end Cek kekosongan data ======*/
								?>
							
							
							<?php
					}
				?>
					<!-- END ulangi sebanyak jumlah data tb_kriteria -->
				
			</tr>
			<!-- E N D tampilkan pada tabel -->
			
		<?php $i++;}
		/* END ulangi sebanyak data tb_alternatif */
		}?>
	
	
	
	
	<?php
	function get_normalisasi(){
		$ci = &get_instance();
		
		// ambil data tb_alternatif
		$siswa = $ci->db->query("select * from data_siswa")->result();
			
		/* START ulangi sebanyak data tb_alternatif */
		$i = 1;
		foreach($siswa as $a){ ?>
		
			<!-- M U L A I     tampilkan pada tabel -->
			<tr>
				<td><?= $a->nisn ?></td>
				<td><?= $a->nama_siswa ?></td>
				
				<?php
					// ambil jumlah data tb_kriteria
					$count = $ci->db->query("SELECT * FROM tb_kriteria")->result();
					
					/* START ulangi sebanyak jumlah data tb_kriteria */
					foreach($count as $x) {
						
						// SELECT nilai berdasarkan id_alternatif dan id_kriteria
						$ci->db->where('id_siswa', $a->id_siswa);
						$kriteria = $ci->db->where('id_kriteria', $x->id_kriteria)->get('tb_normal')->row();?>
						
							<?php /*========= Cek kekosongan data =========*/
								
									if (empty($kriteria->normalisasi)) {?>
								
										<td>data belum di hitung
										</td>
								
								<?php } else {?>
								
									<td><?= $kriteria->normalisasi ?></td>

								<?php } /*======= end Cek kekosongan data ======*/
								?>
							
							<?php
					}
				?>
					<!-- END ulangi sebanyak jumlah data tb_kriteria -->
				
			</tr>
			<!-- E N D tampilkan pada tabel -->
			
		<?php $i++;}
		/* END ulangi sebanyak data tb_alternatif */
		}?>
	
	
	
	
	<?php
		
		function kriteria(){
		
			$ci = &get_instance();
			
			$siswa = $ci->db->query("select * from data_siswa")->result();
			
			$a = 1;
			foreach ($siswa as $x) { ?>
			
				<tr>
					<td><?= $x->nama_siswa ?></td>
					
					
					<?php
						// ambil jumlah data tb_kriteria
						$count = $ci->db->query("SELECT * FROM tb_kriteria")->num_rows();
						
						/* START ulangi sebanyak jumlah data tb_kriteria */
						for($j=1;$j <= $count; $j++){
							
							// SELECT nilai berdasarkan id_alternatif dan id_kriteria
							$ci->db->where('id_siswa', $a);
							$kriteria = $ci->db->where('id_kriteria', $j)->get('tb_nilai')->row();?>
								
								
								<?php /*========= Cek kekosongan data =========*/
								
									if (empty($kriteria->nilai)) {?>
								
										<td>belum di isi
										</td>
								
								<?php } else {?>
								
									<td><?= $kriteria->nilai ?></td>

								<?php } /*======= end Cek kekosongan data ======*/
								?>
					<?php
						}
					?>
						<!-- END ulangi sebanyak jumlah data tb_kriteria -->
					<td>
						<button type="submit" class="btn blue-info btn-sm px-3 info" data="<?= $x->id_siswa ?>">info</button>
					</td>
				</tr>
				<!-- E N D tampilkan pada tabel -->
			
			<?php $a++;}
		}
	?>
	
	
	
	
	
	
	<?php
		
		function show_kriteria($id){
		
			$ci = &get_instance();
			
			$siswa = $ci->db->query("select * from data_siswa where id_guru = '$id'")->result();
			
			$a = 1;
			foreach ($siswa as $x) { ?>
			
				<tr>
					<td><?= $x->nama_siswa ?></td>
					
					<?php
						// ambil jumlah data tb_kriteria
						$count = $ci->db->query("SELECT * FROM tb_kriteria")->num_rows();
						
						/* START ulangi sebanyak jumlah data tb_kriteria */
						for($j=1;$j <= $count; $j++){
							
							// SELECT nilai berdasarkan id_alternatif dan id_kriteria
							$ci->db->where('id_siswa', $x->id_siswa);
							$kriteria = $ci->db->where('id_kriteria', $j)->get('tb_nilai')->row();?>
								
								
								<?php /*========= Cek kekosongan data =========*/
								
									if (empty($kriteria->nilai)) {?>
								
										<td>Belum di inputkan</td>
								
								<?php } else {?>
								
									<td><?= $kriteria->nilai ?></td>

								<?php } /*======= end Cek kekosongan data ======*/
								?>
					<?php
						}
					?>
						<!-- END ulangi sebanyak jumlah data tb_kriteria -->
						<?php /*========= Cek kekosongan data =========*/
								
							if (empty($kriteria->nilai)) {?>
					<td>
						<button type="submit" class="btn blue-gradient btn-sm px-3 item_nilai" data-id_siswa="<?= $x->id_siswa ?>">Tambah</button>
					</td>
					<?php } else {?>
					<td>
						<button type="submit" class="btn btn-danger btn-sm px-3 item_nilai_hapus" data-id_siswa="<?= $x->id_siswa ?>">Hapus</button>
					</td>
					<?php } /*======= end Cek kekosongan data ======*/
								?>
				</tr>
				<!-- E N D tampilkan pada tabel -->
			
			<?php $a++;}
		}
	?>
	
	
	
	<?php
		
		function normalisasi(){
			
			$ci = &get_instance();
			
			// ambil data siswa
			$siswa = $ci->db->query("select * from data_siswa")->result();
				
			/* START ulangi sebanyak data siswa */
			$i = 1;
			foreach($siswa as $a){ ?>
			
				<!-- M U L A I     tampilkan pada tabel -->
				<tr>
					<td><?= $a->nama_siswa ?></td>
					
					<?php
						// ambil jumlah data tb_kriteria
						$count = $ci->db->query("SELECT * FROM tb_kriteria")->result();
						
						/* START ulangi sebanyak jumlah data tb_kriteria */
						foreach($count as $j){
							
							// SELECT nilai berdasarkan id_siswa dan id_kriteria
							$ci->db->where('id_siswa', $a->id_siswa);
							$kriteria = $ci->db->where('id_kriteria', $j->id_kriteria)->get('tb_nilai')->row();
							
							$y = $j->id_kriteria;
							// SELECT nilai MAX
							$query = $ci->db->query("SELECT MAX(nilai) AS data_max FROM tb_nilai WHERE id_kriteria=$y");
							$row = $query->row();?>
							
								<td><?= number_format($kriteria->nilai / $row->data_max, 3) ?></td><?php
						}
					?>
						<!-- END ulangi sebanyak jumlah data tb_kriteria -->
					
				</tr>
				<!-- E N D tampilkan pada tabel -->
				
			<?php $i++;}
			/* END ulangi sebanyak data siswa */
		}
	?>
		
		
	<?php
		function rangking(){
			$ci = &get_instance();
			
			// ambil data siswa
			$siswa = $ci->db->query("select * from data_siswa")->result();
				
			/* START ulangi sebanyak data tb_alternatif */
			$i = 1;
			$data = array();
			foreach($siswa as $a){ ?>
			
				<!-- M U L A I     tampilkan pada tabel -->
				<tr>
					<td><?= $a->nama_siswa ?></td>
					
					<?php
						// ambil jumlah data tb_kriteria
						$count = $ci->db->query("SELECT * FROM tb_kriteria")->result();
						
						/* START ulangi sebanyak jumlah data tb_kriteria */
						$temp = 0;
						foreach($count as $j){
							
							// SELECT nilai berdasarkan id_alternatif dan id_kriteria
							$ci->db->where('id_siswa', $a->id_siswa);
							$kriteria = $ci->db->where('id_kriteria', $j->id_kriteria)->get('tb_nilai')->row();
							$bobot = $ci->db->where('id_kriteria', $j->id_kriteria)->get('tb_kriteria')->row();
							
							$y = $j->id_kriteria;
							// SELECT data MAX dari tb_kriteria
							$query = $ci->db->query("SELECT MAX(nilai) AS data_max FROM tb_nilai WHERE id_kriteria=$y");
							$row = $query->row();
							
							$hasil = number_format($kriteria->nilai / $row->data_max, 3) * ($bobot->bobot);
							$temp = $temp + $hasil;
							
						}
					?>
						<!-- END ulangi sebanyak jumlah data tb_kriteria -->
					<td><?= $temp ?></td>
				</tr>
				
				<!-- E N D tampilkan pada tabel -->
				
			<?php 
				array_push($data, $temp);
				$i++;
			}/*echo "<p>Tanah yang direkomendasikan adalah tanah dengan nilai ".max($data)."</p>";
			/* END ulangi sebanyak data tb_alternatif */
		}
	?>
	
	