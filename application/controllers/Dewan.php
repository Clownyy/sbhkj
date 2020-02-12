<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dewan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
	}
	public function index()
	{
		$this->template->load('template','dewan/data_dewan');
	}

}

/* End of file Dewan.php */
/* Location: ./application/controllers/Dewan.php */