<?php
class M_kasir extends CI_Model
{
    public function getDataById($id)
    {
        $hsl = $this->db->get_where('tbl_transaksi', ['id' => $id]);
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = [
                    'id' => $data->id,
                    'nama_menu' => $data->nama_menu,
                    'harga' => $data->harga,
                    'stok' => $data->stok
                ];
            }
        }
        return $hasil;
    }


    public function updatestatus($transaksi = '')
    {
        $data_master = array(
            'status' => 'sukses'
        );
        $this->db->where('no_transaksi', $transaksi);
        $this->db->update('tbl_transaksi', $data_master);
    }

    // public function test($no_transaksi = '')
    // {
    //     $data_master = array(
    //         'no_transaksi' => 'sukses'
    //     );
    //     $this->db->where('no_transaksi', $no_transaksi);
    //     $this->db->update('tbl_transaksi', $data_master);
    // }
}
