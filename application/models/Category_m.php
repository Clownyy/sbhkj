<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {
	
    public function get($id = null)
    {
    	$this->db->from('p_category');
    	if ($id != null) {
    		$this->db->where('category_id', $id);
    	}
    	$query = $this->db->get();
    	return $query;
    }
    public function del($id)
    {
    	$this->db->where('category_id', $id);
    	$this->db->delete('p_category');
    }
    public function add($post)
    {
    	$params = [
    		'name' => $post['category_name'],
    	];
    	$this->db->insert('p_category', $params);
    }
    public function jumlahcategory()
    {
    	$query = $this->db->get_where('p_category');
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
    }
    public function edit($post)
    {
    	$params = [
    		'name' => $post['category_name'],
    		'updated' => date('Y-m-d H:i:s')
    	];
    	$this->db->where('category_id', $post['category_id']);
    	$this->db->update('p_category', $params);
    }

}

/* End of file category_m.php */
/* Location: ./application/models/category_m.php */