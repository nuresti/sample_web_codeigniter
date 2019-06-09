<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class M_produk extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}

		public function get_all_data(){
			$query = $this->db->query("
				SELECT 
					* 
				FROM
					kategori 
				")

			return $query->result();
		}

	}
 ?>