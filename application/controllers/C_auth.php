<?php 
	defined("BASEPATH") or exit ('No script text allowed');


	/**
	 * 
	 */
	class C_auth extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
		}

		function index()
		{

			if ($this->session->userdata('email')) {
				# code...
				redirect('c_user');
			}
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');

			if($this->form_validation->run() == false){
				$data['title'] = "User Login";
				$this->load->view('templates/auth_header');
				$this->load->view("auth/v_login", $data);
				$this->load->view('templates/auth_footer');

			}else{

				//Validasi sukses
				$this->_login();

			}
			
			
		}

		private function _login()
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			// var_dump($user);
			// die;

			if ($user){
				//jika usernya aktif
				if($user['is_active'] == 1)
				{
					//Cek Password
					if(password_verify($password, $user['password'])){

						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id'],
						];

						$this->session->set_userdata($data);

						if ($user['role_id'] == 1)
						{
							redirect('c_admin');
						}else{
							redirect('c_user');
						}

					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Wrong password !
				</div>');
						redirect('c_auth');
					}

				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  This email has not been activated !
				</div>');
					redirect('c_auth');
				}

			}else{
				//tidak ada user dengan email itu
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Email is not registered !
				</div>');
				redirect('c_auth');
			}
		}

		public function registration()
		{
			if ($this->session->userdata('email')) {
				# code...
				redirect('c_user');
			}
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'This email has already registered !',
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password dont macth !',
				'min_length' => 'Password too short' 
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

			if($this->form_validation->run() == false){
				$this->load->view('templates/auth_header');
				$this->load->view("auth/v_registration");
				$this->load->view('templates/auth_footer');
			}else{


				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'image' => 'default.png',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 0,
					'date_created' => time()
				];

				//siapkan token
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $this->input->post('email'),
					'token' => $token,
					'date_created' => time()
				];
				// var_dump($token);
				// die;

				$this->db->insert('user', $data);
				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'verify');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  Your Account has been created, check your email to activate account !
				</div>');
				redirect('c_auth');
			}
			
		}
		private function _sendEmail($token, $type)
		{
			$config = [
				'protocol' => 'smtp',
    			'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_user' => 'resti.dummy@gmail.com',
				'smtp_pass' => 'virtunesia',
				'smtp_port' => 465,
				'mailtype'  => 'html', 
    			'charset'   => 'iso-8859-1',
				'newline' => "\r\n"
			];

			//$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->from('resti.dummy@gmail.com', 'Admin Pro');
			$this->email->to($this->input->post('email'));

			if($type == 'verify'){

				$this->email->subject('Account Verification');
				$this->email->message('Click this link to verify your account : <a href ="'.base_url(). 'c_auth/verify?email='.$this->input->post('email').'&token='.urlencode($token).'">Activate</a>');

			}else if($type == 'forgot'){

				$this->email->subject('Reset Password');
				$this->email->message('Click this link to reset your password : <a href ="'.base_url(). 'c_auth/resetPassword?email='.$this->input->post('email').'&token='.urlencode($token).'">Reset Password</a>');

			}			

			if($this->email->send()){
				return true;
			}else{

				echo $this->email->print_debugger();
				die;
			}
		}
		public function verify()
		{
			$email = $this->input->get('email');



			$token = $this->input->get('token');

			// $user = $this->db->get_where('user', ['email' => $email])->row_array();

			$this->db->where('email', $email);
			$user = $this->db->get('user');

			// var_dump($user);
			// die;

			if($user){

				$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

				if($user_token){

					if(time() - $user_token['date_created'] < (60*60*24)){
						$this->db->set('is_active', 1);
						$this->db->where('email', $email);
						$this->db->update('user');

						$this->db->delete('user_token', ['email' => $email]);

						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						  	'.$email.' has been activated ! Please Login.
						</div>');
						redirect('c_auth');

					}else{
						$this->db->delete('user', ['email' => $email]);
						$this->db->delete('user_token', ['email' => $email]);
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						  Account activation failed ! Token expired.
						</div>');
						redirect('c_auth');
					}

				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Account activation failed ! Token invalid.
				</div>');
				redirect('c_auth');
				}

			}else{

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Account activation failed ! Wrong email.
				</div>');
				redirect('c_auth');
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  You have been logout !
				</div>');
				redirect('c_auth');
		}

		public function blocked()
		{
				$this->load->view("auth/v_blocked");
		}
		public function forgotPassword()
		{

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');	

			if ($this->form_validation->run() == false){
				$data['title'] = "Forgot Password";
				$this->load->view('templates/auth_header', $data);
				$this->load->view("auth/v_forgot_pass");
				$this->load->view('templates/auth_footer');

			}else{
				$email = $this->input->post('email');

				$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

				if($user){

					$token = base64_encode(random_bytes(32));
					$user_token = [
						'email' => $email,
						'token' => $token,
						'date_created' => time()
					];

					$this->db->insert('user_token', $user_token);

					$this->_sendEmail($token, 'forgot');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  Please check your email to reset your password.
				</div>');
				redirect('c_auth/forgotPassword');

				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Email is not registered or activated.
				</div>');
				redirect('c_auth/forgotPassword');
				}
			}
			
		}
		public function resetPassword()
		{
			$email = $this->input->get('email');
			$token = $this->input->get('token');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if($user){
				$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
				if($user_token){
					$this->session->set_userdata('reset_email', $email);
					$this->changePassword();

				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  		Reset password failed ! Token invalid.
					</div>');
				redirect('c_auth');

				}

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  	Reset password failed ! Wrong email.
				</div>');
				redirect('c_auth');
			}
		}
		public function changePassword()
		{
			if(!$this->session->userdata('reset_email')){
				redirect('c_auth');
			}

			$this->form_validation->set_rules('password1', 'New Password', 'trim|required|min_length[3]|matches[password2]');
			$this->form_validation->set_rules('password2', 'Retype Password', 'trim|required|min_length[3]|matches[password1]');

			if($this->form_validation->run() == false){
				$data['title'] = "Change Password";
				$this->load->view('templates/auth_header', $data);
				$this->load->view("auth/v_change_pass");
				$this->load->view('templates/auth_footer');
			}else{
				$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

				$email = $this->session->userdata('reset_email');
				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->session->unset_userdata('reset_email');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  		Password has been changed. Please login.
					</div>');
				redirect('c_auth');
			}
			
		}
	}
 ?>
















