<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class M_surat_ttd extends CI_Model
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
				FROM tb_kp_surat_ttd
				");
			return $query->result();

		}
		function get_all_sdm()
		{
			$query = $this->db->query("
				SELECT 
					 *
				FROM tab_sdm
				");
			return $query->result();

		}

		function save($data)
		{	
			$insert['no_nrk'] = $data['no_nrk'];
			$insert['alamat_url'] = base_url().'ttd_digital/'.$data['alamat_url'];

			$query = $this->db->insert('tb_kp_surat_ttd', $insert);
		}
		function edit($id_ttd)
		{	
			$query = $this->db->query("
					SELECT a.id_ttd, a.alamat_url, b.nrk, b.nama 
					FROM tb_kp_surat_ttd a
					LEFT JOIN tab_sdm b
					ON a.no_nrk = b.nrk
					WHERE a.id_ttd = $id_ttd");

			if ($query){
				return $query->row();	
			}else
			{
				return false;
			}
			
		}
	
	}
	
 ?>M_surat_ttd.php