<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
	}
	public function index()
	{
		$this->template->load('template', 'dashboard');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */