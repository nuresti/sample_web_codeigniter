<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class C_surat_form extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_surat_form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		public function index()
		{
			$data['title'] = 'Surat Form';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			// $data['data_mitra'] = $this->M_surat_form->get_data_koperasi();
			$data['data_jenis'] = $this->M_surat_form->get_jenis_surat();
			$data['data_ttd'] = $this->M_surat_form->get_data_ttd();
			$this->load->view('partials/header', $data);
			$this->load->view('kelola_surat/v_surat_form', $data);
			$this->load->view('partials/footer');
		}
		/* == MASTER SURAT DIGITAL / PEMBUATAN SURAT == */

		public function ks_list_jenis_surat_digital()
		{
			$this->cek_login();	
			$id_surat = $this->input->get('id_surat');
			// var_export($id_surat);
			// die;
			$data = $this->M_surat_pembuatan->get_list_jenis_surat($id_surat);

			header('Content-Type:application/json');
			$data = json_encode($data);
			echo $data;
		}

		public function ks_list_surat_digital()
		{
			$this->cek_login();
			$data['list_surat'] = $this->M_surat_pembuatan->get_all_data();
			$data['user_level'] = $this->M_surat_pembuatan ->get_user_level();

			$this->load->view('kelola_surat/list_surat', $data);
		}	
		

		public function ks_add_surat_digital()
		{
			$this->cek_login();

			$data = array(
	           'id_surat_master' => $this->input->post('id_surat_master'),
	           'no_surat' => $this->input->post('no_surat'),
	           'tgl_surat' => $this->input->post('tgl_surat'),
	           'lampiran' => $this->input->post('lampiran'),
	           'perihal' => $this->input->post('perihal'),
	           'id_mitra' => $this->input->post('id_mitra'),
	           'alamat_mitra' => $this->input->post('alamat'),
	           'kabkot' => $this->input->post('kabkot'),
	           'provinsi' => $this->input->post('provinsi'),
	           'status' => 0,
	           'id_ttd' => $this->input->post('id_ttd'),
	           'isian_surat' => $this->input->post('isian_surat'),

	        	);

			$this->db->insert('tb_kp_surat_digital', $data);
			$get_last_id = $this->db->insert_id();

			foreach ($this->input->post('rows') as $key=> $count){
				$nama_tembusan = $this->input->post('nama_tembusan_'.$count);
				$keterangan = $this->input->post('keterangan_'.$count);

				$data_tembusan = array(
				'id_surat_digital' => $get_last_id,
				'nama_tembusan' =>$nama_tembusan,
				'ket' => $keterangan,
			);

			$this->db->insert('tb_kp_surat_tembusan', $data_tembusan);
			}
			redirect('kartu_piutang/menu#ks_list_surat_digital', 'refresh');
			
		}

		public function ks_delete_surat_digital($id)
		{
			$this->cek_login();
			$delete = $this->db->where('id_surat', $id);
			$delete = $this->db->delete('tb_kp_surat_digital');

			if ($delete){
				$id_tembusan = $this->M_surat_tembusan->get_all_surat_by_id($id);
				$this->db->where('id_tembusan', $id_tembusan);
				$this->db->delete('tb_kp_surat_tembusan');
			}else{

				alert('Gagal di delete');
			}
		}
		/* == MASTER SURAT DIGITAL == */
	}
 ?>