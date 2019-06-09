<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class M_surat_jenis extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			
		}

		function get_all()
		{
			$query = $this->db->query("
				SELECT 
					 *
				FROM tb_kp_surat_jenis
				");
			return $query->result();

		}
	}
	
 ?>