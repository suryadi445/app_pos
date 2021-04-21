<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_crudAdmin');
        // belum_login();
        // if ($this->session->userdata('role_id') == '2') {
        //     redirect('user');
        // }
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

    public function user()
    {
        $data = $this->db->query("SELECT * FROM tbl_users WHERE is_active = '1'")->result();
        if (!empty($data)) {
            $response = array(
                'status' => 200,
                'message' => 'success',
                'data' => $data
            );
        } else {
            $response = array(
                'status' => 400,
                'message' => 'error',
                'data' => 'Data Kosong!'
            );
        }
        echo json_encode($response);
        
                // cara nerima di view
                // if ($response['status'] == 200) {
                //     foreach ($response['data'] as $key => $value) {
                //         print_r($value);
                //     }
                // } else {
                //     $res_status = $response['message'] . '! Gagal Mengambil Data';
                //     print_r($res_status);
                // }
                // // print_r($response);
    }
}
