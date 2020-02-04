<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_m extends CI_Model {

	// public function sub_total()
	// {
	// 	$item_id = $this->input->post('item_id');
	// 	$harga = $this->db->select('price')->from('p_item')->where('item_id', $item_id);
	// 	$hargaSatuan = $this->db->get()->row()->price;
	// 	$jumlah = $this->input->post('jumlah');
	// 	$sub_total = $hargaSatuan * $jumlah;
	// }
	public function inputTransaction($data,$table)
	{
		$this->db->insert($table,$data);
	}
	public function getCarts()
	{
		$this->db->select('carts.*, p_item.name as item_name, p_item.barcode as barcode');
		$this->db->from('carts');
		$this->db->join('p_item', 'p_item.item_id = carts.item_id');
		$this->db->where('status', 1);
		$this->db->where('user_id', $this->session->userdata('userid'));
		$query = $this->db->get();
		return $query;
	}

}

/* End of file Transaction_m.php */
/* Location: ./application/models/Transaction_m.php */