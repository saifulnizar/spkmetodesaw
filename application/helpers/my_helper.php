<?php
	
	function group(){
		$ci = &get_instance();
		$lev = 0;
		$guru = $ci->db->query("select * from data_guru where level = '$lev'")->result();
		
			foreach ($guru as $row) { ?>
					<div class="col-4">
					<div class="card card-cascade narrower">
						<div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

							<div>
							 
							</div>

							<a href="" class="white-text mx-3"><?= $row->nama_guru?></a>

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
										<th>Nama</th>
										<th>Nilai</th>
									  </tr>
									</thead>
									<tbody>
						<?php
							$siswa = $ci->db->query("select * from data_siswa where id_guru = '$row->id_guru'")->result();
							foreach ($siswa as $x) {
								$nilai = $ci->db->query("select * from tb_rank where id_siswa = '$x->id_siswa'")->result();
								foreach ($nilai as $i){
						?>
							
									
									
										
										<tr>
											<td><?= $x->nama_siswa ?></td>
											<td><?= $i->nilai ?></td>
										</tr>
										
								
							
								<?php }
								}?>
									</tbody>
								</table>
							</div>

						</div>
					</div>
					</div>
			<?php } 
	}?>