<?php 
	defined("BASEPATH") or exit ('No script text allowed');


	/**
	 * 
	 */
	class C_user extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			is_logged_in();
		}

		public function index()
		{
			$data['title'] = 'My Profile';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
				
			$this->load->view('partials/header', $data);
			$this->load->view('user/myprofile', $data);
			$this->load->view('partials/footer');
		}
		public function myprofile()
		{
			$data['title'] = 'My Profile';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('partials/header', $data);
			$this->load->view('user/myprofile', $data);
			$this->load->view('partials/footer');
		}
		public function edit()
		{
			$data['title'] = 'Edit Profile';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('frname', 'First Name', 'required|trim');
			$this->form_validation->set_rules('lsname', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
			$this->form_validation->set_rules('phone', 'Mobile Phone', 'required|trim');
			$this->form_validation->set_rules('website', 'Website Url', 'required|trim');

			$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
			$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
			$this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|min_length[3]|matches[new_password1]');

			if( isset($_POST['submit1']) ) {

				if ($this->form_validation->run() == false){

				$this->load->view('partials/header', $data);
				$this->load->view('user/myprofile', $data);
				$this->load->view('partials/footer');

				}else{

					$frname = $this->input->post('frname');
					$lsname = $this->input->post('lsname');
					$email = $this->input->post('email');
					$phone = $this->input->post('phone');
					$website = $this->input->post('website');

					$this->db->set('first_name', $frname);
					$this->db->set('last_name', $lsname);
					$this->db->set('phone', $phone);
					$this->db->set('website_url', $website);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					  Your profile has been updated !
					</div>');
						redirect('c_user');
				}

			}else if (isset($_POST['submit2']) ){

				$email2 = $this->input->post('email2');
				//cek jika ada gambar yang akan di upload
				$upload_image = $_FILES['image']['name'];

				if($upload_image)
				{
					$config['upload_path'] = 'assets/layouts/layout3/img/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';

					$this->load->library('upload', $config);

					if($this->upload->do_upload('image'))
					{

						$old_image = $data['user']['image'];
						if($old_image != 'default.jpg')
						{
							unlink(FCPATH . 'assets/layouts/layout3/img/' . $old_image);
						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);

					}else{

						echo $this->upload->display_errors();
					}
				}

				$this->db->where('email', $email2);
				$this->db->update('user');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  Your profile avatar has been updated !
				</div>');
					redirect('c_user');
				
			}else if (isset($_POST['submit3']) ){

				if ($this->form_validation->run() == false){
					$this->load->view('partials/header', $data);
					$this->load->view('user/myprofile', $data);
					$this->load->view('partials/footer');

				}else{
					$current_password = $this->input->post('current_password');
					$new_password = $this->input->post('new_password1');

					if(!password_verify($current_password, $data['user']['password']) ){

						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						  Wrong current password !
						</div>');
							redirect('c_user');

					}else{

						if($current_password == $new_password){

							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						  New password can not be the same as Current password !
						</div>');
							redirect('c_user');

						}else{
							//password yang benar
							$password_hash = password_hash('$new_password', PASSWORD_DEFAULT);

							$this->db->set('password', $password_hash);
							$this->db->where('email', $this->session->userdata('email'));
							$this->db->update('user');

							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						  Password Changes !
						</div>');
							redirect('c_user');
						}
					}

				}

			}
	
		}
	}
 ?>