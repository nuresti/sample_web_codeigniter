<?php 
	defined("BASEPATH") or exit ('No script text allowed');


	/**
	 * 
	 */
	class C_menu extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('menu_model', 'menu');
			is_logged_in();
		}

		public function index()
		{

			$data['title'] = "Menu Management";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$data['menu'] = $this->db->get('user_menu')->result_array();
				

			$this->form_validation->set_rules('menu', 'Menu', 'required');

			if ($this->form_validation->run() == false)
			{	
				$this->load->view('partials/header', $data);
				$this->load->view('menu/index', $data);
				$this->load->view('partials/footer');

			}else{
				$this->db->insert('user_menu', ['menu' =>$this->input->post('menu')]);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  New Menu Added !
				</div>');
				redirect('c_menu');
			}

			
		}

		public function submenu()
		{
			$data['title'] = "Submenu Management";
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$data['subMenu'] = $this->menu->getSubMenu();
			$data['menu'] = $this->db->get('user_menu')->result_array();

			$this->form_validation->set_rules('title', 'Sub Menu', 'required');
			$this->form_validation->set_rules('menu_id', 'Menu', 'required');
			$this->form_validation->set_rules('url', 'Url', 'required');
			$this->form_validation->set_rules('icon', 'icon', 'required');


			if ($this->form_validation->run() == false)
			{
				$this->load->view('partials/header', $data);
				$this->load->view('menu/submenu', $data);
				$this->load->view('partials/footer');
			}else{

				$data = [
					'title' => $this->input->post('title'),
					'menu_id' => $this->input->post('menu_id'),
					'url' => $this->input->post('url'),
					'icon' => $this->input->post('icon'),
					'is_active' => $this->input->post('is_active'),
				];
				$this->db->insert('user_sub_menu', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  New Sub Menu Added !
				</div>');
				redirect('c_menu/submenu');
			}
			
		}
	}
 ?>