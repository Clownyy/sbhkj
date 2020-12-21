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
			'fullname' => $this->input->post('fullname'),
			'birth_place' => $this->input->post('birth_place'),
			'birth_date' => $this->input->post('birth_date'),
			'tahun' => $this->input->post('tahun'),
			'asal_sekolah' => $this->input->post('asal_sekolah'),
			'asal_gudep' => $this->input->post('asal_gudep'),
			'address' => $this->input->post('address'),
		);
		$this->anggota_m->add($data);
		$this->session->set_flashdata('success', 'Penambahan Anggota Baru Sukses!');
		redirect(base_url('anggota'));
	}
	public function edit()
	{
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'birth_place' => $this->input->post('birth_place'),
			'birth_date' => $this->input->post('birth_date'),
			'tahun' => $this->input->post('tahun'),
			'asal_sekolah' => $this->input->post('asal_sekolah'),
			'asal_gudep' => $this->input->post('asal_gudep'),
			'address' => $this->input->post('address'),
		);
		$where = array(
			'member_id' => $this->input->post('member_id')
		);
		var_dump($where);
		$this->anggota_m->edit($data, $where);
		$this->session->set_flashdata('success', 'Perubahan Data Anggota Sukses!');
		redirect(base_url('anggota'));
	}
	public function delete($id)
	{
		$this->anggota_m->del($id);
		$this->session->set_flashdata('success', 'Hapus data anggota berhasil!');
		redirect(base_url('anggota'));
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