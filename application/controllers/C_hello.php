<?php 
	defined("BASEPATH") or exit ('No script text allowed');


	/**
	 * 
	 */
	class C_hello extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$this->load->model("M_hello");
			$data =array();
			$data['halo']= $this->M_hello->katakata();

			$this->load->view("v_hello", $data);
		}
	}
 ?>