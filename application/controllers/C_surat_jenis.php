<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class C_surat_jenis extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_surat_jenis');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		public function index()
		{
			$data['title'] = 'Surat Jenis';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['surat_jenis'] = $this->M_surat_jenis->get_all();
			$this->load->view('partials/header', $data);
			$this->load->view('kelola_surat/v_surat_jenis', $data);
			$this->load->view('partials/footer');
		}
		
		public function ks_add_surat_jenis()
		{
			$this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('flash', "Data Gagal di tambahkan");

				redirect('c_surat_jenis', 'refresh');
			}
			else
			{
				$data = array(
					'nama_surat' => $this->input->post('nama_surat', true),
				);
				$this->db->insert('tb_kp_surat_jenis', $data);

				$this->session->set_flashdata('flash', "ditambahkan");

				redirect('c_surat_jenis', 'refresh');
			}
		}

		public function ks_update_surat_jenis()
		{
			$this->form_validation->set_rules('id_jenis_surat', 'Id Jenis Surat', 'required');
			$this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('flash', "Data Gagal di tambahkan");

				redirect('c_surat_jenis', 'refresh');
			}
			else
			{
				$data = array(
	           'nama_surat' => $this->input->post('nama_surat'),
	        	);
				$id = $this->input->post('id_jenis_surat');


				$this->db->where('id_jenis_surat', $id);
				$this->db->update('tb_kp_surat_jenis', $data);

				
				$this->session->set_flashdata('flash', "Data Berhasil di Simpan");

				redirect('c_surat_jenis', 'refresh');
			 }

		}
		public function ks_delete_surat_jenis($id)
		{

			$this->db->where('id_jenis_surat', $id);
			$this->db->delete('tb_kp_surat_jenis');

			echo 'Deleted Successfully' ;

			redirect('c_surat_jenis', 'refresh');
		}
	
	/* == MASTER SURAT JENIS == */	
	}
 ?>