<?php
class M_login2 extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('tbl_users', $data);
    }
}
