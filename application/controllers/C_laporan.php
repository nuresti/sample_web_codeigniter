<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
	class C_laporan extends CI_Controller {
	    public function __construct()
	        {   
	            parent::__construct();
	            $this->load->library('Pdf');
	        }
	    public function index()
	        {
	            $this->load->view('pdfmaster/pdf_view', $data);
	        }
	}