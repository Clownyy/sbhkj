<?php

class Anggota_m extends CI_Model{
    
    public function get($id = null)
    {

    }
    public function add($data)
    {
    	$this->db->insert('anggota', $data);
    }
    public function getByStatus()
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->where('status', 'anggota');
        return $this->db->get();
    }
    public function edit($data,$where)
	{
		$this->db->where($where);
		$this->db->update('anggota',$data);
	}
	public function del($id)
	{
		$this->db->where('member_id', $id);
		$this->db->delete('anggota');
	}
    public function updateStatusToMember($id, $data)
    {
        $this->db->where('member_id', $id);
        $this->db->update('anggota', $data);
    }
    public function updateStatusToDewan($id, $data)
    {
        $this->db->where($id);
        $this->db->update('anggota', $data);
    }
}

?>