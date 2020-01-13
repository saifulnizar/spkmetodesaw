<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		 if($this->session->userdata('logged_in') !== TRUE){
			redirect('welcome');
		}
		$this->load->model(['m_kriteria','m_guru','m_siswa','m_nilai','m_rank']);
	}
	
	public function index()
	{
		$data['rank'] = $this->m_rank->join_siswa_private();
		$data['kriteria'] = $this->m_kriteria->get_all();
		$this->load->view('user', $data);
	}
	
	function print_t(){
		$data['rank'] = $this->m_rank->join_siswa_private();
		$this->load->view('print_user', $data);
	}
	
	/*============ FUNGSI CRUD DATA SISWA ============*/
	
		function get_siswa(){
			$data=$this->m_siswa->get_siswa();
			echo json_encode($data);
		}
		
		function simpan_siswa(){
			$x = $this->input->post('nisn');
			$f = $this->m_siswa->get_by_nisn($x);
			
			if ($f == FALSE){
				$count = $this->m_siswa->get();
				$id = $count + 1 ;
				$s = $this->m_siswa->get_by_id($id);
				
				if ($s == TRUE){
					$cek = $this->m_siswa->get();
						for ($i=1; $i<=$cek; $i++){
								$s = $this->m_siswa->get_by_id_coba($i);
								if ($s == FALSE){
									
										$array = array(
											'id_siswa'		=> $i,
											'id_guru'		=> $this->session->userdata('id_guru'),
											'nisn' 			=> $this->input->post('nisn'),
											'nama_siswa' 	=> $this->input->post('nama_siswa'),
											'jenis_kelamin' => $this->input->post('jenis_kelamin'),
											'tanggal_lahir' => $this->input->post('tanggal_lahir'),
											'alamat'		=> $this->input->post('alamat')
											);
										$this->m_siswa->save($array);

										redirect('user');
									
									}
								
						}
							
						
					}else{
						
							$array = array(
								'id_siswa'		=> $id,
								'id_guru'		=> $this->session->userdata('id_guru'),
								'nisn' 			=> $this->input->post('nisn'),
								'nama_siswa' 	=> $this->input->post('nama_siswa'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'tanggal_lahir' => $this->input->post('tanggal_lahir'),
								'alamat'		=> $this->input->post('alamat')
								);
							$this->m_siswa->save($array);

							redirect('user');
						}
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
								<div class="toast-body"><strong> Maaf NISN Siswa tidak tersedia ...!!!</strong>
								</div>
								</div>'
				);
				redirect('user');
				
			}
					
			
		}
		
		function update_siswa(){
			$id = $this->input->post('id_siswa');
			$data = array ( 
						'nisn' 			=> $this->input->post('nisn'),
						'nama_siswa' 	=> $this->input->post('nama_siswa'),
						'jenis_kelamin' => $this->input->post('jenis_kelamin'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'alamat' 		=> $this->input->post('alamat')
					);
			$data=$this->m_siswa->update($id, $data);
			echo json_encode($data);
		}
		
		function hapus_siswa(){
			$id		 = $this->input->post('id');
			$data	=$this->m_siswa->hapus($id);
			echo json_encode($data);
		}
	
	/*========== END FUNGSI CRUD DATA SISWA ==========*/
	
	
	
	/*================= FUNGSI TB_NILAI =================*/
	
		function get_nilai(){
			$data=$this->m_nilai->get_all();
			echo json_encode($data);
		}
		
		function get_nilai_id(){
			$id = 1;
			$data=$this->m_nilai->get_nilai($id);
			for ($i=1; $i<=$data; $i++){
			echo $data->id_siswa;
			}
		}
		
		function simpan_nilai(){
			
			
			$id_siswa 		= $_POST['id_siswa'];
			$id_kriteria 	= $_POST['id_kriteria'];
			$nilai		 	= $_POST['nilai'];
			
			$data = array();
			$x = 0;
			
			foreach ($id_kriteria as $kriteria){
				array_push($data, array (
					'id_siswa' 		=> $id_siswa[$x],
					'id_kriteria' 	=> $kriteria,
					'nilai'			=> $nilai[$x],	
				));
				
				$x++;
				
			}
			
			$sql = $this->m_nilai->save($data);
			redirect('user');
		}
		
		function delete_nilai(){
			$id = $this->input->post('id_siswa_nilai');
			$this->m_nilai->hapus($id);
			redirect('user');
		}

	/*=============== END FUNGSI TB_NILAI ===============*/
	
	
	
	/*============= FUNGSI TB_GURU =============*/
		
		function get_data_private(){
			$data = $this->m_guru->get_private();
			echo json_encode($data);
		}
		
		function get_guru(){
			$data=$this->m_guru->get_all();
			echo json_encode($data);
		}
		
		function simpan_guru(){
			$data=$this->m_kriteria->save();
			echo json_encode($data);
		}
		
		function update_guru(){
			$id 	= $this->input->post('id_guru');
			$data 	= array ( 
							'nama_guru' 	=> $this->input->post('nama_guru'),
							'keterangan' 	=> $this->input->post('ket'),
							'sandi'			=> $this->input->post('sandi')
							);
			$data=$this->m_guru->update($id, $data);
			echo json_encode($data);
		}
	
	/*=========== END FUNGSI TB_GURU ===========*/
	
}
