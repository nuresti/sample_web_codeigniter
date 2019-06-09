<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class C_surat_master extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_surat_master');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		public function index()
		{
			$data['title'] = 'Surat Master';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['isi_surat'] = $this->M_surat_master->get_all();
			$data['jenis_surat'] = $this->M_surat_master->get_jenis_surat();
			$this->load->view('partials/header', $data);
			$this->load->view('kelola_surat/v_surat_master', $data);
			$this->load->view('partials/footer');
		}

		public function ks_add_surat_master()
		{
			$data = array(
				'id_jenis_surat' => $this->input->post('id_jenis_surat'),
				'isian_surat' => $this->input->post('isian_surat')
			);

			$this->db->insert('tb_kp_surat_master', $data);

			redirect('c_surat_master', 'refresh');
		}
		public function ks_update_surat_master()
		{
			$this->form_validation->set_rules('id_jenis_surat', 'Id Jenis Surat', 'required');
			$this->form_validation->set_rules('isian_surat', 'Isian Surat', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('flash', "Data Gagal di tambahkan");

				redirect('c_surat_master', 'refresh');
			}
			else
			{
				$data = array(
	           'id_jenis_surat' => $this->input->post('id_jenis_surat'),
	           'isian_surat' => $this->input->post('isian_surat'),
	        	);
				$id = $this->input->post('id');


				$this->db->where('id', $id);
				$this->db->update('tb_kp_surat_master', $data);

				
				$this->session->set_flashdata('flash', "Data Berhasil di Simpan");

				redirect('c_surat_master', 'refresh');
			 }

		}
		public function ks_delete_surat_master($id)
		{
			$this->cek_login();
			$this->db->where('id', $id);
			$this->db->delete('tb_kp_surat_master');

			echo 'Deleted Successfully';

			redirect('c_surat_master', 'refresh');
		}
		/* == MASTER SURAT ISI == */
	}
 ?>