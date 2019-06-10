<?php 
	defined("BASEPATH") or exit("'No direct script access allowed");
	/**
	 * 
	 */
	class M_surat_form extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function get_all_data()
		{
			$query = $this->db->query("
				SELECT
					*
				FROM tb_kp_surat_digital
				");
			return $query->result();
		}
		public function get_jenis_surat()
		{
			$query = $this->db->query("
				SELECT 
					a.id_jenis_surat,
					a.isian_surat,
					b.nama_surat
				FROM tb_kp_surat_master a
				LEFT JOIN tb_kp_surat_jenis b
				ON a.id_jenis_surat = b.id_jenis_surat

				");
			return $query->result();
		}
		// public function get_data_koperasi()
		// {
		// 	$query = $this->db->query("
		// 		SELECT 
		// 			 a.nama_mitra,
		// 			 a.alamat,
		// 			 b.nama_prov,
		// 			 c.nama_lengkap_kabkot
		// 		FROM tb_koperasi a
		// 			LEFT JOIN tb_prov b
		// 			ON a.provinsi = b.id_prov
		// 			LEFT JOIN tb_kabkot c
		// 			ON a.kab_kot = c.id_kab
		// 			WHERE a.id_koperasi = '3320080.1' 
		// 		");
		// 	return $query->row();
		// }
		public function get_data_ttd(){
			$query = $this->db->query("
				SELECT
					a.id_ttd,
					a.no_nrk,
					a.alamat_url,
					b.nama
				FROM
					tb_kp_surat_ttd a
				LEFT JOIN
					tab_sdm b
				ON
					a.no_nrk = b.nrk
				");
			return $query->result();
		}
	}
 ?>