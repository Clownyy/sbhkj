<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['transaction_m','item_m','stock_m']);
	}

	public function index()
	{
		$data['product'] = $this->item_m->get();
		$data['carts'] = $this->transaction_m->getCarts();
		$this->template->load('template', 'transaction/transaction/transaction_data', $data);
	}
	public function cartStore()
	{
		$harga = $this->item_m->get()->row()->price;
		$item_id = $this->input->post('item_id');
		$jumlah = $this->input->post('qty');
		$status = 1;
		$kode_unik = rand(111111111111, 999999999999);
		$user_id = $this->input->post('user_id');

		$params = array(
			'item_id' => $item_id,
			'jumlah' => $jumlah,
			'sub_total' => $harga * $jumlah,
			'status' => $status,
			'kode_unik' => $kode_unik,
			'user_id' => $user_id
		);
		$this->stock_m->kurang_stock();
		$this->transaction_m->inputTransaction($params, 'carts');
	}

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */