<?php 
	defined("BASEPATH") or exit ('No script text allowed');


	/**
	 * 
	 */
	class Menu_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function getSubMenu()
		{
			$query = "SELECT a.*, b.menu
						FROM user_sub_menu a
						LEFT JOIN user_menu b
						ON a.menu_id = b.id
						";

			return $this->db->query($query)->result_array();
			
		}

	}

		
 ?>