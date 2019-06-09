<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class M_surat_master extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			
		}

		function get_all()
		{
			$query = $this->db->query("
				SELECT 
					a.*,
					b.id_jenis_surat,
					b.nama_surat
				FROM tb_kp_surat_master a
				LEFT JOIN tb_kp_surat_jenis b
				ON a.id_jenis_surat = b.id_jenis_surat
				");
			return $query->result();

		}
		function get_jenis_surat()
		{
			$query = $this->db->query("
				SELECT
					*
				FROM tb_kp_surat_jenis
				GROUP BY nama_surat;
				");
			return $query->result();
		}
	}
	
 ?>