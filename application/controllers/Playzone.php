<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playzone extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
	}
	public function dod()
	{
		$data['member'] = $this->db->get('anggota');
		$data['dod'] = $this->db->get('challenge');
		$this->template->load('template','playzone/dod', $data);
	}
	public function generateRandomName()
	{
		$this->db->order_by('rand()');
		$this->db->limit(1);
		$query = $this->db->get('anggota')->row();
		echo json_encode($query);
	}
	public function getChallengeByColor($id)
	{
		$this->db->where('chall_id', $id);
		$query = $this->db->get('challenge')->row();
		echo json_encode($query);
	}
}

/* End of file Playzone.php */
/* Location: ./application/controllers/Playzone.php */