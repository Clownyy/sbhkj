<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('menu_m');
		$this->load->model('category_m');
	}
	public function index()
	{
		$data['kategori'] = $this->category_m->get();
		$data['menus'] = $this->menu_m->getMenu();
		$this->template->load('template','menu/menu_data', $data);
	}
	public function update()
	{
		$config['upload_path'] = './assets/uploads/menu/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['file_name'] = 'menu-'.date('ymd').'-'.substr(rand(),0,10);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$params = array(
				'nama_menu' => $this->input->post('nama_menu'), 
				'jenis' => $this->input->post('jenis'), 
				'harga' => $this->input->post('harga'),
				'status_menu' => $this->input->post('status_menu'), 
			);
			$this->db->where('id_menu', $this->input->post('id_menu'));
			$this->db->update('menu', $params);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('success','berhasil terupdate');
			}
			redirect('menu');
		}else if ($this->upload->do_upload('foto')) {
			$params = array(
				'nama_menu' => $this->input->post('nama_menu'), 
				'jenis' => $this->input->post('jenis'), 
				'harga' => $this->input->post('harga'), 
				'foto' => $this->upload->data('file_name'),
				'status_menu' => $this->input->post('status_menu'), 
			);
			$this->db->where('id_menu', $this->input->post('id_menu'));
			$this->db->update('menu', $params);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('success','berhasil terupdate');
			}
			redirect('menu');
		}
	}
	public function deleteMenu($id)
	{
		$menu = $this->menu_m->get($id)->row();
		if ($menu->foto != null) {
			$target_file = './assets/uploads/menu/'.$menu->foto;
			unlink($target_file);
		}
		$this->menu_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Menu '.$menu->nama_menu.' Sukses dihapus');
		}
		redirect('menu');
	}
	public function insert()
	{
		$config['upload_path'] = './assets/uploads/menu/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['file_name'] = 'menu-'.date('ymd').'-'.substr(rand(),0,10);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto')) {
			$params = array(
				'barcode' => rand(111111, 999999).rand(111111,999999),
				'nama_menu' => $this->input->post('nama_menu'), 
				'jenis' => $this->input->post('jenis'), 
				'harga' => $this->input->post('harga'), 
				'foto' => $this->upload->data('file_name'),
				'status_menu' => $this->input->post('status_menu'), 
			);
			$this->menu_m->inputMenu($params, 'menu');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Menu '.$this->input->post('nama_menu').' berhasil ditambahkan');
			}
		}
		redirect('menu');
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */