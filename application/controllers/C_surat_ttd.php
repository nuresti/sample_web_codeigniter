<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 *  
	 */
	class C_surat_ttd extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_surat_ttd');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		public function index()
		{
			$data['title'] = 'Surat Tanda Tangan';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['tab_sdm'] = $this->M_surat_ttd->get_all_sdm();
			$data['ttd_digital'] = $this->M_surat_ttd->get_all_data();
			$this->load->view('partials/header', $data);
			$this->load->view('kelola_surat/v_surat_ttd', $data);
			$this->load->view('partials/footer');
		}

		public function ks_surat_ttd_list()
		{

			$data['surat_ttd'] = $this->M_surat_ttd->get_all_data();

			header('Content-Type: application/json');
	    	$data = json_encode($data);
	    	echo $data;

		}

		public function ks_add_ttd()
		{
			$data['title'] = 'Surat Tanda Tangan';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('no_nrk', 'No NRK', 'required|trim');

			if($this->form_validation->run() == false){

				$this->load->view('partials/header', $data);
				$this->load->view('kelola_surat/v_surat_ttd', $data);
				$this->load->view('partials/footer');

			}else{

					$config['upload_path'] = 'assets/ttd_digital/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = 2048;
					$config['max_width'] = 1024;
					$config['max_height'] = 768;

					$this->load->library('upload', $config);

					// $this->upload->initialize($config);

					if (!$this->upload->do_upload('alamat_url'))
					{
						echo $this->upload->display_errors();

					}else
					{
						// $old_image = $data['user']['alamat_url'];
						// unlink(FCPATH . 'assets/ttd_digital/' . $old_image);

						$data['alamat_url'] = $this->upload->data('file_name');
						$data['no_nrk'] = $this->input->post('no_nrk');

						// var_dump($data);
						// die;
						//store to db
					
					 	$this->M_surat_ttd->save($data);

					}

				// $this->db->where('email', $email2);
				// $this->db->insert('user');

				$this->session->set_flashdata('message', 
					'<script type="text/javascript">
                        $(document).ready(function(){
                        	swal("Berhasil!", "Data Berhasil disimpan" , "success");
                        })
                    </script>');
					redirect('c_surat_ttd');
			}

			
		}

		public function ks_update_ttd()
		{
			$data['title'] = 'Surat Tanda Tangan';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$id = $this->input->post('id_ttd');
			$no_nrk = $this->input->post('no_nrk');
			$upload_image = $_FILES['alamat_url']['name'];
				

			if($upload_image)
			{ 
				unset($config);
				$config['upload_path'] = 'assets/ttd_digital/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;
				$config['max_width'] = 1024;
				$config['max_height'] = 768;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('alamat_url'))
				{
					echo $this->upload->display_errors();

				}else
				{

					$old_image = $this->input->post('old');
					unlink(FCPATH . 'assets/ttd_digital/' . $old_image);

					$upload_data = $this->upload->data();

					
					$alamat_url= base_url().'assets/ttd_digital/'.$upload_data['file_name'];

					
					$this->db->set('alamat_url', $alamat_url);
				}
			}
					$this->db->set('no_nrk', $no_nrk);
					$this->db->where('id_ttd', $id);
					$this->db->update('tb_kp_surat_ttd');

					$this->session->set_flashdata('message', 
					'<script type="text/javascript">
                        $(document).ready(function(){
                        	swal("Berhasil!", "Data Berhasil diubah" , "success");
                        })
                    </script>');

					redirect('c_surat_ttd');
		}

		public function ks_delete_ttd()
		{
			$id = $this->input->post('id_ttd');
			$this->db->where('id_ttd', $id);
			$this->db->delete('tb_kp_surat_ttd');

			$this->session->set_flashdata('message', 
				'<script type="text/javascript">
	                $(document).ready(function(){
	                	swal("Berhasil!", "Data Berhasil dihapus" , "success");
	                })
	            </script>');

			redirect('c_surat_ttd');
		}
		/* == MASTER SURAT TTD == */	
	}
 ?>