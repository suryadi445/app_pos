<?php
// !membatasi hak akses ke startSession
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kasir');
        $this->load->library('form_validation');

        belum_login();
    }

    public function index($no_transaksi = '')
    {
        $tgl_sekarang = date('Ymd');

        $data['transaksi'] = $this->uri->segment('3');
        // menampilkan menu
        $data['menu'] = $this->db->get('menu')->result();
        // untuk mendapatkan session
        $data['user'] = $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array();
        // mendapatkan status
        $data['status'] = $this->db->query("SELECT no_transaksi FROM tbl_transaksi WHERE id_kasir = '1'")->row();
        // mendapatkan harga
        $data['totals'] = $this->db->query("SELECT SUM(harga_pesanan) as grand_total FROM tbl_transaksi WHERE no_transaksi = '$no_transaksi' AND tgl_input='$tgl_sekarang'")->row();
        // merubah harga menjadi format mata uang
        $data['total'] = number_format($data['totals']->grand_total, 0, '.', '.');

        $data['judul'] = 'Kasir';
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function startSession()
    {

        $data['user'] = $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['sales_kemarin'] = $this->db->query("SELECT SUM(harga_pesanan) as harga FROM tbl_transaksi")->row_array();
        $data['transaksi_kemarin'] = $this->db->get("tbl_transaksi")->num_rows();
        $data['jumlah_karyawan'] = $this->db->get('tbl_users')->num_rows();
        $data['all'] = $this->db->get('menu')->result_array();

        $data['judul'] = 'Start Session';
        $this->load->view('templates/header', $data);
        $this->load->view('user/startSession', $data);
        $this->load->view('templates/footer');
    }

    public function session($result = '')
    {
        $result = $result + 1;

        $status = 'sukses';
        $data = [
            'no_transaksi' => $result,
            'status' => $status,
            'no_session' => 1,
            'tgl_transaksi' => date('ymd')
        ];
        $this->db->insert('tbl_status_transaksi', $data);

        redirect('user/index/' . $result . '');
    }


    public function datatables_data()
    {
        // sudah_login();
        $where = array(
            'id_kasir' => 1,
            'status' => 'proses'
        );

        $data['data'] = $this->db->get_where('tbl_transaksi', $where)->result();
        echo json_encode($data);
    }

    public function proses_menu()
    {
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $id_kasir = 1;
        $status = 'proses';
        $no_transaksi = $this->input->post('transaksi');
        $tgl_input = date('ymd');

        $menu = $this->db->get_where('menu', array('id_menu' => $id))->row();
        $harga = $menu->{'harga'};
        $harga_pesanan = $qty * $harga;

        $data_master = array(
            'nama_menu' => $menu->nama_menu,
            'harga' => $menu->harga,
            'qty' => $qty,
            'id_kasir' => $id_kasir,
            'harga_pesanan' => $harga_pesanan,
            'status' => $status,
            'no_transaksi' => $no_transaksi,
            'tgl_input' => $tgl_input
        );

        $tgl_sekarang = date('Ymd');

        $query = $this->db->insert('tbl_transaksi', $data_master);

        $result = $this->db->query("SELECT SUM(harga_pesanan) as grand_total FROM tbl_transaksi WHERE no_transaksi = '$no_transaksi' AND tgl_input='$tgl_sekarang'")->row();

        $hasil_number = number_format($result->grand_total, 0, '.', '.');


        echo json_encode($hasil_number);
    }

    public function delete_menu()
    {
        // sudah_login();

        $id = $this->input->post('id');
        $no_transaksi = $this->input->post('no_transaksi');
        $tgl_sekarang = date('Ymd');


        $this->db->where('id', $id);
        $this->db->delete('tbl_transaksi');

        $result = $this->db->query("SELECT SUM(harga_pesanan) as grand_total FROM tbl_transaksi WHERE no_transaksi = '$no_transaksi' AND tgl_input='$tgl_sekarang'")->row();

        $hasil_number = number_format($result->grand_total, 0, '.', '.');

        echo json_encode($hasil_number);
    }

    public function bayar()
    {
        $transaksi = $this->input->post('transaksi');
        $bayar_modal = number_format($this->input->post('bayar'), 0, '.', '.');
        $this->session->set_userdata('bayar', $bayar_modal);

        // mendapatkan kembalian untuk bill
        $number_kembali = $this->input->post('number_kembali');
        $kembali = number_format($number_kembali, 0, '.', '.');
        $this->session->set_userdata('kembali', $kembali);
        // akhir mendapatkan kembalian untuk bill

        $data = $this->M_kasir->updatestatus($transaksi);
        echo json_encode($data);
    }

    public function kembalian()
    {
        $bayar_modal = $this->input->post('qty_modal_number');
        $total_modal = $this->input->post('rupiah_input');

        $data = (int)$bayar_modal - (int)$total_modal;
        $kembali = number_format($data, 0, '.', '.');

        echo json_encode($kembali);
    }

    public function bill($transaksi = '')
    {
        $tgl_sekarang = date('Ymd');
        $tgl_input = date('ymd');

        // awal penambahan no transaksi
        $data['result'] = floatval($transaksi);
        // session untuk menampilkan nama kasir
        $data['user'] = $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array();
        // untuk menampilkan menu yang dibeli dan qty nya
        $data['bill'] = $this->db->get_where('tbl_transaksi', ['no_transaksi' => $transaksi, 'tgl_input' => $tgl_input])->result_array();
        //menampilkan jumlah total/qty pesanan 
        $data['qty'] = $this->db->query("SELECT SUM(qty) as qty FROM tbl_transaksi WHERE no_transaksi = '$transaksi' AND tgl_input='$tgl_sekarang'")->row();
        // var_dump($data['qty']->qty);
        // exit;

        // untuk menampilkan harga pesanan
        $data['totals'] = $this->db->query("SELECT SUM(harga_pesanan) as grand_total FROM tbl_transaksi WHERE no_transaksi = '$transaksi' AND tgl_input='$tgl_sekarang'")->row();
        // membuat format rupiah pda harga pesanan
        $data['total'] = number_format($data['totals']->grand_total, 0, '.', '.');

        // mendapatkan uang yg dibayar customer
        $data['bayar'] = $this->session->userdata('bayar');
        // mendapatkan kembalian
        $data['kembali'] = $this->session->userdata('kembali');
        // 
        $data['judul'] = 'shopping bill';
        $this->load->view('templates/header', $data);
        $this->load->view('user/bill', $data);
        $this->load->view('templates/footer');
    }

    // !belum selesai
    private function _hakAkses()
    {
        $level_user = $this->session->userdata('role_id');
        if ($level_user == 2) {
            redirect($_SERVER['HTTP_REFFERER']);
        } else {
            return true;
        }
    }
}
