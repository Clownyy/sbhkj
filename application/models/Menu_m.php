<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_m extends CI_Model {

	public function getMenu()
	{
		return $this->db->get('menu');
	}
	public function getMenuWhere()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('status_menu', 1);
		return $this->db->get();
	}
	public function get($id)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('id_menu', $id);
		return $this->db->get();
	}
    public function del($id)
    {
    	$this->db->where('id_menu', $id);
    	$this->db->delete('menu');
    }
	public function inputMenu($data,$table)
	{
		$this->db->insert($table,$data);
	}

}

/* End of file Menu_m.php */
/* Location: ./application/models/Menu_m.php */