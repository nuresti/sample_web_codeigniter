<?php 

	defined("BASEPATH") or exit ('No script text allowed');

	/**
	 * 
	 */
	function is_logged_in()
	{
		$ci = get_instance(); //untuk memanggil library ci di fungsi ini, ga bisa pake $this krn ga bs amnil object 
		if (!$ci->session->userdata('email'))
		{
			redirect('c_auth');
		}else {
			$role_id = $ci->session->userdata('role_id');
			$menu = $ci->uri->segment(1);
			

			$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

			$menu_id = $queryMenu['id'];

			// var_dump($menu_id);
			// die;

			$userAccess = $ci->db->get_where('user_access_menu', [
							'role_id' => $role_id, 
							'menu_id' => $menu_id 
						]);

			if ($userAccess->num_rows() < 1)
			{
				redirect('c_auth/blocked');
			}
		}
	}

	function goToDefaultPage() 
	{
	  if ($this->session->userdata('role_id') == 1) 
	  {
	    redirect('admin');

	  } elseif ($this->session->userdata('role_id') == 2) 
	  {
	    redirect('user');
	    
	  } else {
	    // jika ada role_id yg lain maka tambahkan disini
	  }
	}

	function check_access($role_id, $menu_id)
	{
		$ci = get_instance();

		$ci->db->where('role_id', $role_id);
		$ci->db->where('menu_id', $menu_id);
		$result = $ci->db->get('user_access_menu');


		if($result->num_rows() > 0){
			return "checked = 'checked'";
		}
	}
 ?>