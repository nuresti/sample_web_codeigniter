<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class C_surat_form extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_surat_form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		public function index()
		{
			$data['title'] = 'Surat Form';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('partials/header', $data);
			$this->load->view('kelola_surat/v_surat_form', $data);
			$this->load->view('partials/footer');
		}
	}
 ?>