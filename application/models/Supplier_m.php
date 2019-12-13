<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {
	
    public function get($id = null)
    {
    	$this->db->from('supplier');
    	if ($id != null) {
    		$this->db->where('supplier_id', $id);
    	}
    	$query = $this->db->get();
    	return $query;
    }
    public function del($id)
    {
    	$this->db->where('supplier_id', $id);
    	$this->db->delete('supplier');
    }
    public function add($post)
    {
    	$params = [
    		'name' => $post['supplier_name'],
    		'phone' => $post['phone'],
    		'address' => $post['addr'],
    		'description' => empty($post['desc']) ? null : $post['desc'],
    	];
    	$this->db->insert('supplier', $params);
    }
    public function jumlahsupplier()
    {
    	$query = $this->db->get_where('supplier');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
    }
    public function edit($post)
    {
    	$params = [
    		'name' => $post['supplier_name'],
    		'phone' => $post['phone'],
    		'address' => $post['addr'],
    		'description' => empty($post['desc']) ? null : $post['desc'],
    		'updated' => date('Y-m-d H:i:s')
    	];
    	$this->db->where('supplier_id', $post['supplier_id']);
    	$this->db->update('supplier', $params);
    }

}

/* End of file Supplier_m.php */
/* Location: ./application/models/Supplier_m.php */