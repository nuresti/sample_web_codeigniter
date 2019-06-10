<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
	class C_laporan extends CI_Controller {
	    public function __construct()
	        {   
	            parent::__construct();
	            $this->load->library('Pdf');
	        }
	    /* == CREATED PDF VIEW == */
		public function index()
	        {
	        	$data['title'] = 'Cetak PDF';
				$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();	

	            $this->load->view('pdfmaster/pdf_view', $data);
	        }
	    public function pdf_default()
	    {
	    	$data['title'] = 'Cetak PDF';
				$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();	
	        	$id = $this->uri->segment(3);	        	
	        	$data['surat'] = $this->db->get_where('tb_kp_surat_master', ['id' => $id])->row_array();
	        	
				// echo $id;
				// exit;
	            $this->load->view('pdfmaster/pdf_view', $data);
	    }

		public function pdf_no_rek()
	        {
	        	$this->cek_login();
	        	$id = $this->uri->segment(3);

	        	$data = $this->M_surat_pembuatan->get_data_by($id);
	        	$data['list_tembusan'] = $this->M_surat_pembuatan->get_tembusan_by($id);

	      //   	$split_image = $data['alamat_url'];
			    // $get_image = explode("/",$split_image);

		    	// $data['get_image'] = '<img width:"70px;" height="71px" src="' . $_SERVER['DOCUMENT_ROOT']. 'ttd_digital/'.$get_image[4].'" />';

	            $this->load->view('pdf_file/surat_no_rekening', $data);

	        }

	    public function pdf_tagihan()
	        {
	        	$this->cek_login();
	            $this->load->view('pdf_file/surat_tagihan');
	        }
	    /* == CREATED PDF VIEW == */
	}