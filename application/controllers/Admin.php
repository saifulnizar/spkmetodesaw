<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
			if($this->session->userdata('logged_in') !== TRUE){
				redirect('welcome');
			}
		$this->load->model(['m_kriteria','m_guru','m_siswa','m_nilai','m_normalisasi','m_rank']);
	}
	
	public function index(){
		$data['rank'] = $this->m_rank->join_siswa();
		$data['kriteria'] = $this->m_kriteria->get_all();
		$this->load->view('admin', $data);
	}
	
	
	/*========== FUNGSI CRUD TB_KRITERIA ==========*/
	
		function get_kriteria(){
			$data=$this->m_kriteria->get_all();
			echo json_encode($data);
		}
		
		function cek_nim(){
			$id = $this->input->post('id',TRUE);
			$data = $this->m_siswa->get_nim($id)->result();
			echo json_encode($data);
		}
		
		function simpan_kriteria(){
		
			$count = $this->m_kriteria->get();
			$id = $count + 1;
			$s = $this->m_kriteria->get_by_id_coba($id);
			
			if ($s == TRUE){
				$cek = $this->m_kriteria->get();
					for ($i=1; $i<=$cek; $i++){
							$s = $this->m_kriteria->get_by_id_coba($i);
							if ($s == FALSE){
								
									$data = array(
										'id_kriteria'	=> $i,
										'kriteria' 		=> $this->input->post('kriteria'),
										'bobot' 		=> $this->input->post('bobot')
										);
									$array = $this->m_kriteria->save($data);

									echo json_encode($array);
								
								
								}
							
					}
					
				}else{
					
						$data = array(
							'id_kriteria'	=> $id,
							'kriteria' 		=> $this->input->post('kriteria'),
							'bobot' 		=> $this->input->post('bobot')
							);
						$array = $this->m_kriteria->save($data);

						echo json_encode($array);
					}
					
		}
		
		function update_kriteria(){
			$id 	= $this->input->post('id_kriteria');
			$data 	= array ( 
							'kriteria' => $this->input->post('kriteria'),
							'bobot' => $this->input->post('bobot')
							);
			$data=$this->m_kriteria->update($id, $data);
			echo json_encode($data);
		}
		
		function hapus_kriteria(){
			$id		 = $this->input->post('id');
			$data	=$this->m_kriteria->hapus($id);
			echo json_encode($data);
		}
	
	/*========== END FUNGSI CRUD TB_KRITERIA ==========*/
	
	
	
	/*============ FUNGSI SISWA ============*/
		function get_info(){
			$id = $this->input->post('id');
			$data = $this->m_siswa->get_info($id);
			echo json_encode($data);
		}
		
		function get_siswa(){
			$data=$this->m_siswa->get_all();
			echo json_encode($data);
		}
		
		function get_nilai_siswa(){
			$data = $this->m_nilai->join_nilai();
			echo json_encode($data);
		}
	
	/*========== END FUNGSI SISWA ==========*/
	
	
	
	
	/*============= FUNGSI TB_GURU =============*/
	
		function get_guru(){
			$data=$this->m_guru->get_all();
			echo json_encode($data);
		}
		
		function get_aktif(){
			$data=$this->m_guru->get_active();
			echo json_encode($data);
		}
		
		function get_pasif(){
			$data=$this->m_guru->get_nonactive();
			echo json_encode($data);
		}
		
		
		function simpan_guru(){
			$id = $this->input->post('id_guru_tambah');
			
			$s = $this->m_guru->get_by_id($id);
			
			if ($s == FALSE){
				$data = array (
							'id_guru'		=> $id,
							'nama_guru' 	=> $this->input->post('nama_guru'),
							'keterangan' 	=> $this->input->post('ket'),
							'sandi'			=> $this->input->post('sandi'),
							'level'			=> 0
						  );
				$this->m_guru->save($data);
				redirect('admin');
			}else{
				
				$this->session->set_flashdata(
					'gagal', '<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
								<div class="toast-header">
								<svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
									<rect fill="#007aff" width="100%" height="100%" /></svg>
									<strong class="mr-auto">SPK Siswa Teladan</strong>
									<small>1 mins ago</small>
									<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="toast-body"><strong> Maaf Id Guru tidak tersedia ...!!!</strong>
								</div>
								</div>'
				);
				redirect('admin');
			}
		}
		
		function update_guru(){
			$id 	= $this->input->post('id_guru');
			$data 	= array ( 
							'nama_guru' 	=> $this->input->post('nama_guru'),
							'keterangan' 	=> $this->input->post('ket'),
							'sandi'			=> $this->input->post('sandi'),
							'level'			=> $this->input->post('level')
							);
			$data=$this->m_guru->update($id, $data);
			echo json_encode($data);
		}
		
		function hapus_guru(){
			$id		 = $this->input->post('id');
			$data	=$this->m_guru->hapus($id);
			echo json_encode($data);
		}
		
		function pasif_guru(){
			$id 	= $this->input->post('id');
			$level = 10;
			$data 	= array ('level'	=> $level);
			$data=$this->m_guru->update($id, $data);
			echo json_encode($data);
		}
		
		function aktif_guru(){
			$id 	= $this->input->post('id');
			$level = 0;
			$data 	= array ('level'	=> $level);
			$data=$this->m_guru->update($id, $data);
			echo json_encode($data);
		}
		
	/*=========== END FUNGSI TB_GURU ===========*/
	
	
	
	/*=============== FUNGSI TB_NORMALISASI ===============*/
	
		function get_normalisasi(){
			$this->m_normalisasi->join_get();
		}
	
	/*=============== END FUNGSI TB_NORMALISASI ===============*/
	
	
	
	/*=============== FUNGSI HITUNG ===============*/
	
	
		function hitung (){
			
			
			$cek = $this->m_normalisasi->cek();
			if($cek != 0 ){
			for($o=1;$o<=$cek;$o++){
				$this->m_normalisasi->hapus($o);
				}
			}
			
			$cek_hasil = $this->m_rank->cek();
			if($cek_hasil != 0 ){
			for($y=1;$y<=$cek_hasil;$y++){
				$this->m_rank->hapus($y);
				}
			}
			
			
			
			$siswa 	= $this->m_siswa->get();
			$normal = $this->m_normalisasi->cek();
			$rank 	= $this->m_rank->cek();
			$j= 1;
			$data = array();
			for($i=1; $i<=$siswa; $i++){
				
				$count = $this->m_kriteria->get();
					$temp = 0;
					for($x=1; $x <= $count; $x++){
						
						$kriteria = $this->m_nilai->get_normalisasi($j, $x);
						$max	  = $this->m_nilai->nilai_max($x);
						$bobot	  = $this->m_kriteria->get_by_id($x);
						
						
						$data = array(
										'id_normal'		=> $normal + 1,
										'id_siswa'		=> $kriteria->id_siswa,
										'id_kriteria'	=> $kriteria->id_kriteria,
										'normalisasi'	=> number_format($kriteria->nilai / $max->data_max, 3)
								);
							
							$this->m_normalisasi->save($data);	
							$normal = $normal + 1;
						
							$hasil = number_format($kriteria->nilai / $max->data_max, 3) * ($bobot->bobot);
							$temp = $temp + $hasil;
				}
				
				$save = array (
							'id_hasil'	=> $rank + 1,
							'id_siswa'	=> $kriteria->id_siswa,
							'nilai'		=> $temp
								);
								$this->m_rank->save($save);
								$rank = $rank + 1;
								
			array_push($data, $temp);	
			$j++;}
			redirect('admin');
		}
	
	/*============= END FUNGSI NORMALISASI =============*/
	function proses(){
		$cek_normal = $this->m_normalisasi->get_all();
		foreach ($cek_normal as $cek) {
			$o = $cek->id_normal;
			$this->m_normalisasi->hapus($o);
		}
		
		$cek_rank = $this->m_rank->get_all();
		foreach ($cek_rank as $rank){
			$y = $rank->id_hasil;
			$this->m_rank->hapus($y);
		}
		
		$normal = $this->m_normalisasi->cek();
		$rank 	= $this->m_rank->cek();
		$siswa = $this->m_siswa->get_all();
		$data = array();
			foreach ($siswa as $row) {
				$j=  $row->id_siswa;
				
				$kriteria = $this->m_kriteria->get_all();
				$index = 0;
				foreach ($kriteria as $x) {
					$i = $x->id_kriteria;
					
					$nilai 		= $this->m_nilai->get_coba_normalisasi($j, $i);
					$max	  	= $this->m_nilai->nilai_coba_max($i);
					$bobot	    = $this->m_kriteria->get_by_id_coba($i);
					
					$data = array(
										'id_normal'		=> $normal + 1,
										'id_siswa'		=> $nilai->id_siswa,
										'id_kriteria'	=> $i,
										'normalisasi'	=> number_format($nilai->nilai / $max->data_max, 3)
								);
								$this->m_normalisasi->save($data);	
								$normal = $normal + 1;
								
					$hasil =  number_format($nilai->nilai / $max->data_max, 3) * ($bobot->bobot);
					$index = $index + $hasil ; 
				}
				
				
				$save = array (
							'id_hasil'	=> $rank + 1,
							'id_siswa'	=> $nilai->id_siswa,
							'nilai'		=> $index
								);
								$this->m_rank->save($save);
								$rank = $rank + 1;
								
				array_push($data, $index);
			}
	}
	
	function button(){
		$siswa = $this->m_siswa->get();
		$kriteria = $this->m_kriteria->get();
		$nilai = $this->m_nilai->cek();	
			$jumlah =  $kriteria * $siswa;
			
			if ( $jumlah !== $nilai ){
				
				$output['error'] = true;
				$output['message'] = 'Data nilai belum terpenuhi';
				
			}else{
				$output['message'] = 'Data nilai sudah terpenuhi silakan lakukan proses seleksi';
			}			
		echo json_encode($output);
	}
	
	function coba(){
		
		$cek = $this->m_kriteria->get();
		for ($i=1; $i<=$cek; $i++){
				$s = $this->m_kriteria->get_by_id_coba($i);
				if ($s == FALSE){
					echo $i;
					
					}
				
		}
		
	}
	
	function coba1(){	
		$count = $this->m_kriteria->get();
		$id = $count + 1;
		$s = $this->m_kriteria->get_by_id_coba($id);
		
		if ($s == TRUE){
			$cek = $this->m_kriteria->get();
				for ($i=1; $i<=$cek; $i++){
						$s = $this->m_kriteria->get_by_id_coba($i);
						if ($s == FALSE){
							
								echo $i;
							
							
							}
						
				}
			
			}elseif(empty($s)){
				
					echo $id - 1;
				}else{
					echo $id;
				}
	}
	
	function hapus_semua_data(){
		
		$normal = $this->m_normalisasi->get_all();
		foreach ($normal as $row) {
			$i = $row->id_normal;
			$this->m_normalisasi->hapus($i);
		}
		$rank = $this->m_rank->get_all();
		foreach ($rank as $a ) {
			$x = $a->id_hasil;
			$this->m_rank->hapus($x);
		}
		
	}
	
	function group_hasil(){
	
		$guru = $this->m_guru->get_active();
		foreach ($guru as $row){
			echo $row->id_guru."<br>";
			
		}
	
	}
	
	function print_hasil(){
		$this->load->view('print_hasil');
	}
	
	function reset_nilai(){
		$nilai = $this->m_nilai->get_all();
		foreach ($nilai as $row) {
			$id = $row->id_nilai;
			$this->m_nilai->hapus_nilai($id);
		}
		redirect('admin');
	}
}
