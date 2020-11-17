<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('anggota_m');
	}
	public function index()
	{
		$data['member'] = $this->db->get('anggota');
		$this->template->load('template','anggota/data_anggota', $data);
	}
	public function add()
	{
		$data = array(
			'member_id' => $this->input->post('member_id'),
			'unique_code' => $this->input->post('unique_code'),
			'jabatan' => $this->input->post('jabatan'),
			'status' => $this->input->post('status'), 
		);
		$this->dewan_m->add($data);
		$this->session->set_flashdata('success', 'Penambahan Dewan Baru Sukses!');
		redirect(base_url('dewan'));
	}
	public function edit()
	{
		$data = array(
			'member_id' => $this->input->post('member_id'),
			'unique_code' => $this->input->post('unique_code'),
			'jabatan' => $this->input->post('jabatan'),
			'status' => $this->input->post('status'), 
		);
		$where = array(
			'dewan_id' => $this->input->post('dewan_id')
		);
		$this->dewan_m->edit($data, $where);
		$this->session->set_flashdata('success', 'Perubahan Data Dewan Sukses!');
		redirect(base_url('dewan'));
	}
	public function getDataMember($id)
	{
		$this->db->where('member_id', $id);
		$query = $this->db->get('anggota')->row();
		echo json_encode($query);
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */