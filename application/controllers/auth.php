<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    //method default .memanggil libraries validation formnya
    public function __construct()
    {
        parent::__construct(); //memanggil method construct yg ada di CI_Controller
        // $this->load->library('form_validation');
        $this->load->model('m_login');
    }
    public function index()
    {
        // $this->form_validation->set_rules('USERNAME', 'Username', 'required|trim');
        // $this->form_validation->set_rules('PASSWORD', 'Password', 'required|trim');
        // if ($this->form_validation->run() == false) {
        $data['title'] = 'Login Page';
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
        // } else {
        //     //jika sukses validasinya
        //     $this->aksi_login();
        //     //dikasih _ supaya tidak bisa diakses dikls lain(method nya private)

        // }

    }
    function aksi_login()
    {
        $USERNAME = $this->input->post('USERNAME');
        $PASSWORD = $this->input->post('PASSWORD');
        $where = array(
            'USERNAME' => $USERNAME,
            'PASSWORD' => $PASSWORD
        );
        $cek = $this->m_login->cek_login('admin', $where)->num_rows();
        if ($cek > 0) {

            $data_session = array(
                'USERNAME' => $USERNAME,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("dashboard"));
        } else {
            // echo "Username dan password salah !";
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Password!
          </div>');
            redirect('auth');
        }
    }
    // private function _login()
    // {
    //     $USERNAME = $this->input->post('USERNAME');
    //     $PASSWORD = $this->input->post('PASSWORD');
    //     //cari user yg emailnya sesuai kaya didatabase
    //     $admin = $this->db->get_where('admin', ['USERNAME' => $USERNAME])->row_array(); //select * from table user where username = username

    //     //admin nya ada?
    //     if ($admin) {
    //         //berhasil masuk
    //         if (password_verify($PASSWORD, $admin['PASSWORD'])) {
    //             //kalo benar kita siapin data di session, nanti ada role id admin/member biassa
    //             $data = [
    //                 'USERNAME' => $admin['USERNAME']
    //             ];
    //             //kita arahkan ke view yg kita mau
    //             $this->session->set_userdata($data);
    //             redirect(base_url("penceramah"));
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Wrong Password!
    //       </div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         //muncul pesan error
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Username is not Register!
    //       </div>');
    //         redirect('auth');
    //     }
    // }
    public function registration()
    {
        //memberikan rules tiap isiannya(inputannya)
        $this->form_validation->set_rules('nama_admin', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_telp_admin', 'Telp Number', 'required|trim'); //dari tabel admin, trus  kolomnya
        $this->form_validation->set_rules(
            'USERNAME',
            'Username',
            'required|trim|is_unique[admin.USERNAME]',
            [
                'is_unique' => 'This Username is Already Registered!'
            ]
        );
        $this->form_validation->set_rules(
            'PASSWORD',
            'Password',
            'required|trim|min_length[5]',
            [
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('PASSWORD', 'Password', 'required|trim|matches[PASSWORD]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Admin-Annur Registration";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {

            $data = array(
                // nama tabel                     nama text field
                'ID_ADMIN' => $this->input->post('id_admin'),
                'USERNAME' => $this->input->post('USERNAME'),
                //passw di enkripsi
                'PASSWORD' => password_hash($this->input->post('PASSWORD'), PASSWORD_DEFAULT),
                'NAMA_ADMIN' => $this->input->post('nama_admin'),
                'NO_TELP_ADMIN' => $this->input->post('no_telp_admin')
            );

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your Account has been Created. PLease Login!
          </div>');
            redirect('auth');
        }
    }
    //tugas logout ngebersihin session sama kembali ke halaman login
    public function logout()
    {
        // $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('auth');
    }
}
