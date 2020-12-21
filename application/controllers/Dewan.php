<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dewan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['dewan_m', 'anggota_m']);
	}
	public function index()
	{
		$data['dewan'] = $this->dewan_m->get();
		$data['member'] = $this->anggota_m->getByStatus();
		$data['allMember'] = $this->db->get('anggota');
		$this->template->load('template','dewan/data_dewan', $data);
	}
	public function add()
	{
		$data = array(
			'member_id' => $this->input->post('member_id'),
			'unique_code' => $this->input->post('unique_code'),
			'jabatan' => $this->input->post('jabatan'),
			'status' => $this->input->post('status'), 
		);
		$update = array(
			'status' => "dewan"
		);
		$where = array(
			'member_id' => $this->input->post('member_id')
		);
		$this->dewan_m->add($data);
		$this->anggota_m->updateStatusToDewan($where, $update);
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
	public function delete($id)
	{
		$update = array(
			'status' => "anggota"
		);
		$this->anggota_m->updateStatusToMember($id, $update);
		$this->dewan_m->del($id);
		$this->session->set_flashdata('success', 'Hapus data dewan berhasil!');
		redirect(base_url('dewan'));
	}

}

/* End of file Dewan.php */
/* Location: ./application/controllers/Dewan.php */