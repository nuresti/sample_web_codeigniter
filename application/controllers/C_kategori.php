<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kategori extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('m_kategori');
	}
	public function index()
	{
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('partials/header', $data);
		$this->load->view('kategori_page', $data);
		$this->load->view('partials/footer');
		
	}
	public function show_kategori(){
		$data['data_kategori'] = $this->m_kategori->get_all_data();
		$this->load->view('kategori_page', $data);

	}
	public function add_kategori(){

			$data = $this->m_kategori->save();
			echo json_encode($data);
			
			}
	public function update(){
        $data=$this->m_kategori->edit();
        echo json_encode($data);
    }
 
    public function delete(){
        $data=$this->m_kategori->delete();
        echo json_encode($data);
    }

    public function pdfexample()
    {
    	$this->load->library('pdf');

    	$this->load->view('pdfmaster/pdf_view');
    }
}
