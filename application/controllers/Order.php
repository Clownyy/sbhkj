<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['transaction_m','menu_m']);
	}
	public function index()
	{
		$data['carts'] = $this->transaction_m->getCarts();
		$data['totalCarts'] = $this->transaction_m->jumlahCarts();
		$data['menu'] = $this->menu_m->getMenuWhere();
		$this->template->load('template', 'order/index',$data);
	}

}

/* End of file Order.php */
/* Location: ./application/controllers/Order.php */