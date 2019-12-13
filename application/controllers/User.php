<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
	}
	public function index()
	{
		$data['allusers'] = $this->user_m->get();

		$this->template->load('template', 'user/user_data', $data);
	}
	public function add()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
			array('matches'=>'%s tidak sesuai dengan password')
		);
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan isi!');
		$this->form_validation->set_message('min_length','{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique','{field} sudah digunakan');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_form_add');	
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan')</script>";
			}
			echo "<script>window.location='".base_url('user')."'</script>";
		}

	}
	public function edit()
	{
		$user_id = $this->input->post('user_id');
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$address = $this->input->post('address');
		$level = $this->input->post('level');

		if (!empty($this->input->post('password'))) {
			$data = array(
				'name' => $name,
				'username' => $username,
				'password' => $password,
				'address' => $address,
				'level' => $level,
			);
		}else{
			$data = array(
				'name' => $name,
				'username' => $username,
				'address' => $address,
				'level' => $level,
			);
		}
		$where = array(
			'user_id' => $user_id,
		);
		$this->user_m->edit_data($where,$data,'user');
		redirect(base_url('user'));
	}
	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if ($this->db->affected_rows() > 0) {
			echo  "<script>alert('Data Berhasil Dihapus!')</script>";
		}
		echo "<script>window.location='".base_url('user')."'</script>";
	}
}
