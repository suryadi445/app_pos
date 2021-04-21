<?php
class Auth2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_login2');
    }


    // form login
    public function index()
    {
        sudah_login();
        // var_dump($this->session->userdata('session_lanjutan'));

        $data = [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login2');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tbl_users', ['email' => $email])->row_array();

            if ($user != null) {
                // inputan di isi
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    if ($user['role_id'] == 2) {
                        if ($this->session->userdata('session_user')) {
                            $this->session->set_userdata($data);
                            // $this->session->userdata('id_kasir');
                            redirect('user/index/' . $this->session->userdata("session_user"));
                        } else {
                            $this->session->set_userdata($data);
                            redirect('user/startSession');
                        }
                    } else {
                        $this->session->set_userdata($data);
                        redirect('administrator');
                    }
                } else {
                    $this->session->set_flashdata('flash2', 'Password anda salah!!');
                    redirect('auth2');
                }
            } else {
                $this->session->set_flashdata('flash2', 'Email anda belum terdaftar!!');
                redirect('auth2');
            }
        }
    }

    // awal registration
    public function registration()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $role_id = 2;
        $is_active = 1;
        $data_created = time();

        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[tbl_users.name]', [
            'is_unique' => 'Nama sudah digunakan'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'valid_email' => 'Email harus valid'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password minimal 3 karakter'
        ]);


        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registration Page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registration2');
            $this->load->view('templates/auth_footer');
        } else {
            // upload file
            $config['upload_path'] = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_width']            = 2048;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                if ($error) {
                    $this->session->set_flashdata('flash2', 'Foto gagal diupload, mohon registrasi kembali');
                    redirect('auth2/index');
                }
            } else {
                $upload = ['upload_data' => $this->upload->data()];

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role_id,
                    'is_active' => $is_active,
                    'data_created' => $data_created,
                    'foto' => $upload['upload_data']['file_name'],
                ];
                $this->M_login2->tambah($data);
                $this->session->set_flashdata('flash', 'Selamat! Akun anda sudah dibuat. Silahkan Login ');
                redirect('auth2/registration');
            }
        }
    }
    // akhir registration

    // awal logout
    public function logout()
    {
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();

        redirect('auth2');
    }
    // akhir logout

    public function logoutOnly()
    {
        $this->session->unset_userdata('role_id');

        $kasir = $this->db->get_where('tbl_users', ['role_id' => 2])->result_array();

        $this->db->order_by('id_penjualan', 'desc');
        $user = $this->db->get('tbl_status_transaksi')->row_array();

        $this->session->set_userdata('session_user', $user['no_transaksi']);


        // die;
        if ($kasir) {
            $this->session->set_userdata('session_user', $user['no_transaksi']);
            redirect('auth2');
        }
    }
}
