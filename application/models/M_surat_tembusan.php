<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class M_surat_tembusan extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			
		} 

		function get_all_data()
		{
			$query = $this->db->query("
				SELECT 
					*
				FROM tb_kp_surat_tembusan
				
				");
			return $query->result();

		}
		function get_all_surat_by_id($id)
		{
			$query = $this->db->query("
				SELECT 
					a.id_surat,
					b.id_tembusan
					FROM tb_kp_surat_tembusan b
					LEFT JOIN tb_kp_surat_digital a
					ON b.id_surat_digital = a.id_surat
					WHERE b.id_surat_digital = $id
				");
			return $query->result();
		}
	}
	
 ?>