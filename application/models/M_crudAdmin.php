<?php
class M_crudAdmin extends CI_Model
{
    public function getData()
    {
        $query = $this->db->get('menu');
        return $query->result_array();
    }


    public function insert($data)
    {
        $this->db->insert('menu', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('menu');
    }

    public function getWhere($id)
    {
        return $this->db->get_where('menu', ['id_menu' => $id])->row_array();
    }

    public function update($data)
    {
        $this->db->where('id_menu', $this->input->post('id'));
        $this->db->update('menu', $data);
    }
    public function updateProfile($data, $id)
    {
        $this->db->set('name', $this->input->post('name'));
        $this->db->where('id', $id);
        $this->db->update('tbl_users', $data);
    }
    //     this->db->set('field', 'field+1', FALSE);
    // $this->db->where('id', 2);
    // $this->db->update('mytable');
}
