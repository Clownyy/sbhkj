<?php

class Dewan_m extends CI_Model{
    
    public function get($id = null)
    {
    	$this->db->select('dewan.*,anggota.fullname as name');
        $this->db->from('dewan');
        $this->db->join('anggota','anggota.member_id = dewan.member_id');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($data)
    {
    	$this->db->insert('dewan', $data);
    }
    public function edit($data,$where)
	{
		$this->db->where($where);
		$this->db->update('dewan',$data);
	}
	public function del($id)
	{
		$this->db->where('dewan_id', $id);
		$this->db->delete('dewan');
	}
}

?>