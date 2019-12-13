<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
    public function add($post)
    {
        $params = [
            'name' => $post['unit_name'],
        ];
        $this->db->insert('p_unit', $params);
    }
    public function jumlahunit()
    {
        $query = $this->db->get_where('p_unit');
        if ($query->num_rows()>0) {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['unit_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['unit_id']);
        $this->db->update('p_unit', $params);
    }

}

/* End of file unit_m.php */
/* Location: ./application/models/unit_m.php */