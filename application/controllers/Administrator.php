<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require APPPATH . 'excel\vendor\autoload.php';
// require APPPATH . '\application\controllers\Administrator.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// reference the Dompdf namespace
use Dompdf\Dompdf;

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_crudAdmin');
        belum_login();
        if ($this->session->userdata('role_id') == '2') {
            redirect('user');
        }
    }

    // halaman Administrator
    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = 'Admin Page';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // menampilkan halaman all menu
    public function allData()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['admin'] = $this->M_crudAdmin->getData();
        $data['judul'] = 'All Menu';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/allmenu', $data);
        $this->load->view('templates/footer');
    }

    // fungsi tambah data
    public function insertData()
    {
        $data = [
            'id_menu' => $this->input->post('id'),
            'nama_menu' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'gambar' => $this->input->post('gambar'),
            'data_update' => $this->input->post('data_update')
        ];

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        // $this->form_validation->set_rules('tgl_update', 'tgl_update', 'required');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get('tbl_users')->row_array();

            $data['judul'] = 'Insert Page';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/insert');
            $this->load->view('templates/footer');
        } else {
            $this->M_crudAdmin->insert($data);
            $this->session->set_flashdata('flash', 'Data berhasil ditambah');
            redirect('administrator/allData');
        }
    }

    // untuk menampilkan kategori makanan yang akan diupdate
    public function updateData()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Update Page';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/update_kategori', $data);
        $this->load->view('templates/footer');
    }

    // menampuilkan makanan yang akan diupdate
    public function update_makanan()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Update Page';
        $data['update'] = 'Update Menu';
        $data['admin'] = $this->M_crudAdmin->getData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/update/update_makanan', $data);
        $this->load->view('templates/footer');
    }

    // menampuilkan minuman yang akan diupdate
    public function update_minuman()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Update Page';
        $data['update'] = 'Update Menu';
        $data['admin'] = $this->M_crudAdmin->getData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/update/update_minuman', $data);
        $this->load->view('templates/footer');
    }

    // menampuilkan dessert yang akan diupdate
    public function update_dessert()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Update Page';
        $data['update'] = 'Update Menu';
        $data['admin'] = $this->M_crudAdmin->getData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/update/update_dessert', $data);
        $this->load->view('templates/footer');
    }

    public function prosesUpdate($id)
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Update Page';
        $data['admin'] = $this->M_crudAdmin->getWhere($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/update', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'id_menu' => $this->input->post('id', true),
            'nama_menu' => $this->input->post('nama_menu', true),
            'harga' => $this->input->post('harga', true),
            'gambar' => $this->input->post('gambar', true),
            'data_update' => $this->input->post('data_update', true),
        ];
        // $id = $this->uri->segment(3);
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('harga', 'Harga Menu', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar Menu', 'required');
        $this->form_validation->set_rules('data_update', 'Data Update', 'required');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get('tbl_users')->row_array();

            $data['judul'] = 'Update Page';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_crudAdmin->update($data);
            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
            redirect('administrator/allData');
        }
    }

    // menampilkan kategori makanan yang akan didelete
    public function deleteData()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Delete Page';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/delete');
        $this->load->view('templates/footer');
    }

    // menampilkan isi kategori yg akan didelete
    public function delete_makanan()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Update Page';
        $data['delete'] = 'Delete Menu';
        $data['admin'] = $this->M_crudAdmin->getData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/delete_makanan', $data);
        $this->load->view('templates/footer');
    }

    public function delete_minuman()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'update Page';
        $data['delete'] = 'Delete Menu';
        $data['admin'] = $this->M_crudAdmin->getData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/delete_minuman', $data);
        $this->load->view('templates/footer');
    }

    public function delete_dessert()
    {
        $data['user'] = $this->db->get('tbl_users')->row_array();

        $data['judul'] = 'Update Page';
        $data['delete'] = 'Delete Menu';
        $data['admin'] = $this->M_crudAdmin->getData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/delete_dessert', $data);
        $this->load->view('templates/footer');
    }

    // fungsi delete
    public function hapus($id)
    {
        $this->M_crudAdmin->delete($id);
        $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        redirect('administrator/allData');
    }

    public function report()
    {
        // untuk mendapatkan menu yg terjual
        $this->db->order_by('no_transaksi', 'ACS');
        $data['reports'] = $this->db->get('tbl_transaksi')->result_array();
        // untuk mendapatkan tanggal penjualan
        $data['date'] = $this->db->get('tbl_status_transaksi')->row_array();
        // untuk mendapatkan harga total semua transaksi
        $data['total_harga'] = $this->db->query("SELECT SUM(harga_pesanan) as grand_total FROM tbl_transaksi ")->row_array();

        $data['judul'] = 'Laporan Keuangan';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('templates/footer');
    }

    public function data_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $data = $this->db->get_where('tbl_transaksi', ['tgl_input' => $tanggal])->result_array();

        echo json_encode($data);
    }

    public function sales_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("SELECT SUM(harga_pesanan) as sales FROM tbl_transaksi where tgl_input='$tanggal'")->row_array();
        $data = number_format($query['sales'], 0, '.', '.');

        echo json_encode($data);
    }

    public function print()
    {
        $this->load->view('admin/report');
    }

    public function pdf()
    {
        require APPPATH . 'third_party/vendor/autoload.php';

        $data['transaksi'] = $this->db->get('tbl_transaksi')->result_array();
        $this->load->view('admin/pdf', $data);


        // $this->load->view('admin/pdf', $data);
        $html = $this->output->get_output();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($html, array('Attachment' => 0));
        $dompdf->stream('transaksi penjualan.pdf');
    }

    public function excel()
    {
        $transaksi = $this->db->get('tbl_transaksi')->result_array();
        $this->load->view('admin/report');

        require('excel\vendor\autoload.php');

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Menu')
            ->setCellValue('C1', 'No. Transaksi')
            ->setCellValue('D1', 'Jumlah Terjual')
            ->setCellValue('E1', 'Harga Pesanan');

        $kolom = 2;
        $nomor = 1;
        foreach ($transaksi as $pengguna) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna['nama_menu'])
                ->setCellValue('C' . $kolom, $pengguna['no_transaksi'])
                ->setCellValue('D' . $kolom, $pengguna['qty'])
                ->setCellValue('e' . $kolom, $pengguna['harga_pesanan']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Keuangan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function stock()
    {
        // !belom kelar


        // menampilkan nama menu
        $this->db->select('nama_menu');
        $this->db->distinct();
        $data['menu'] = $this->db->get('menu')->result_array();
        // akhir menampilkan nama menu

        $data['ayam_goreng'] = $this->db->query("SELECT SUM(qty) as jumlah FROM tbl_transaksi Where nama_menu='ayam goreng'")->row_array();
        $data['ayam_bakar'] = $this->db->query("SELECT SUM(qty) as jumlah FROM tbl_transaksi Where nama_menu='ayam bakar'")->row_array();
        $data['bebek_goreng'] = $this->db->query("SELECT SUM(qty) as jumlah FROM tbl_transaksi Where nama_menu='bebek goreng'")->row_array();
        $data['bebek_bakar'] = $this->db->query("SELECT SUM(qty) as jumlah FROM tbl_transaksi Where nama_menu='bebek bakar'")->row_array();

        $data['stocks'] = $this->db->get('tbl_transaksi')->result_array();
        $data['judul'] = 'Stock penjualan';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/stock', $data);
        $this->load->view('templates/footerlogin');
    }

    // awal list user
    public function listUser()
    {
        $this->db->order_by('role_id', 'ASC');
        $data['user'] = $this->db->get('tbl_users')->result_array();

        $data['judul'] = 'List User';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/list_user', $data);
        $this->load->view('templates/footer');
    }
    // akhir list user

    public function updateProfile()
    {
        // var_dump($this->input->post());
        // exit;
        $id = $this->input->post('id', true);
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $role_id = $this->input->post('role_id', true);
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'role_id' => $role_id,
            'password' => $password
        ];

        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('role_id', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get('tbl_users')->result_array();
            $data['judul'] = 'Update Page';
            $this->load->view('templates/header', $data);
            $this->load->view('admin/list_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->where('id', $id);
            $this->db->update('tbl_users', $data);
            //     $this->M_crudAdmin->update($data);
            //     $this->session->set_flashdata('flash', 'Data berhasil diupdate');
            redirect('administrator/listUser');
        }
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_users');
        redirect('Administrator/listUser');
    }

    public function hapus_db()
    {
        // tanggal sekarang
        $tanggal = date('Y-m-d');
        // pengurangan tanggal selama 1 tahun
        $setahun = date('Y-m-d', strtotime('-1 years', strtotime($tanggal)));

        // $this->db->truncate("DELETE FROM tbl_transaksi Where tgl_input between '$setahun' and '$tanggal'");
        // $this->db->query("DELETE FROM tbl_status_transaksi Where tgl_transaksi between '$setahun' and '$tanggal'");


        $this->db->from('tbl_transaksi');
        $this->db->truncate();

        $this->db->from('tbl_status_transaksi');
        $this->db->truncate();


        // if ($this->db->affected_rows() <= 0) {
        //     $this->session->set_flashdata('flash2', 'tidak ada data yang dihapus');
        // } else {
        $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        // }

        redirect('administrator/report');
    }
}
