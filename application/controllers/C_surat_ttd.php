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

			$data = $this->M_surat_ttd->get_all_data();

			header('Content-Type: application/json');
	    	$data = json_encode($data);
	    	echo $data;

		}

		public function ks_add_ttd()
		{
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			//upload gambar
			unset($config);
			$config['upload_path'] = './ttd_digital/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 100;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('alamat_url'))
			{
				echo $this->upload->display_errors();

			}else
			{
				$upload_data = $this->upload->data();
				$data['no_nrk'] = $this->input->post('no_nrk');
				$data['alamat_url'] = $upload_data['file_name'];

				var_dump($data);
				die;
				//store to db
			
				$result= $this->M_surat_ttd->save($data);;
	            echo json_decode($result);

			}

			header('Content-Type: application/json');
	    	$data = json_encode($data);
	    	echo $data;
		}

		public function ks_update_ttd()
		{
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$data['no_nrk'] = $this->input->post('no_nrk');
			$id = $this->input->post('id_ttd');
			$old_photo = $this->input->post('old');
			if($_FILES['alamat_url']['name'] != "")
			{
					//upload gambar
				unset($config);
				$config['upload_path'] = './ttd_digital/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 100;
				$config['max_width'] = 1024;
				$config['max_height'] = 768;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('alamat_url'))
				{
					echo $this->upload->display_errors();
					$data['alamat_url'] = base_url().'ttd_digital/'.$old_photo;
				}else
				{
					$upload_data = $this->upload->data();

					$data['alamat_url']= base_url().'ttd_digital/'.$upload_data['file_name'];
				}
			}
			else
			{
					
					$data['alamat_url'] = $old_photo;

			}
					$this->db->where('id_ttd', $id);
					$this->db->update('tb_kp_surat_ttd', $data);

					redirect('c_surat_ttd');
		}

		public function ks_delete_ttd($id)
		{
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			// $file = base_url().'ttd_digital/'.$href;

			// if (is_readable($file) && unlink($file)){
				

			// 	echo "The file has been deleted";

			// }else{
			// 	echo "The file was not found or not readable and could not be deleted";
			// }
			$this->db->where('id_ttd', $id);
				$this->db->delete('tb_kp_surat_ttd');

				echo 'Deleted Successfully' ;
			

			redirect('c_surat_ttd');
		}
		/* == MASTER SURAT TTD == */	
	}
 ?>