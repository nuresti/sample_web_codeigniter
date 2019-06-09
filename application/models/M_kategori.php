<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class M_kategori extends CI_Model
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
				");

			return $query->result();
		}
		public function validation($mode){
			$this->load->library('form_validation');

			if($mode == "save")
				$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required | max_length[50]');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

				if ($this->form_validation->run())
					return true;

				else
					return false;
		}
		public function save(){
			$data = array(
				'nama_kategori' => $this->input->post('nama_kategori'),
				'deskripsi' => $this->input->post('deskripsi'),
			);

			$result = $this->db->insert('kategori', $data);
			return $result;
		}
		public function edit(){
			$id = $this->input->post('id');
			$nama_kategori = $this->input->post('nama_kategori');
	        $deskripsi = $this->input->post('deskripsi');
	 
	        $this->db->set('nama_kategori', $nama_kategori);
	        $this->db->set('deskripsi', $deskripsi);
	        $this->db->where('id', $id);
	        $result=$this->db->update('kategori');
	        return $result;
		}
		public function delete($id){
			$id=$this->input->post('id');
	        $this->db->where('id', $id);
	        $result=$this->db->delete('kategori');
	        return $result;
		}
		
	}
 ?>