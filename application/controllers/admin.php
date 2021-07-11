<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //set model yang akan dipakai
        $this->load->model('m_admin');
        $this->load->model('m_login');
        // menyiapkan library CI
        $this->load->library('form_validation');
        //load helper
        $this->load->helper('download');
        $this->load->helper('url');

        //melakukan pengecekan sudah login atau belum
        if ($this->m_login->isNotLogin() == true) {
            redirect(base_url('login'));
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    public function index()
    {
        $table_search = urldecode($this->input->get('table_search', true));

        // set data yang akan dikirim ke view
        $admin = $this->m_admin->get_filtered($table_search);
        $jumlah = $admin->num_rows();
        // if ($kontak->num_rows() > 0) {
        //     return $jumlah = $kontak->num_rows();
        // } else {
        //     return $jumlah = 0;
        // }


        $data = array(
            'admin' => $admin,
            'table_search' => $table_search,
            'junlah_kontak' => $jumlah
        );


        // set tampilan yang akan muncul pada halaman admin 
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('user/V_admin', $data);
        $this->load->view('template/footer');
    }

    //tambah admin
    public function tambah_admin()
    {
        //set form validation
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
            'is_unique' => '<b><i class="fa fa-exclamation-circle"></i> {field}</b> sudah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        //cek validasi
        if ($this->form_validation->run() == true) {
            $nama = $this->input->post('nama_admin', true);
            $username = $this->input->post('username', true);
            $password = md5($this->input->post('password', true));
            //cek nilai row
            $role_cek = $this->input->post('role');

            # code...

            if ($role_cek != null || $role_cek != "") {
                if ($role_cek == 1) {
                    $role = "superadmin";
                } else {
                    $role = "admin"; //kalau 2
                }
            } else {
                $role = "admin";
            }
            $data = array(
                'id_admin' => uuid_v4(),
                'nama_admin' => $nama,
                'username' => $username,
                'password' => $password,
                'role' => $role

            );

            $this->m_admin->tambah_admin($data, 'admin');
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('admin');
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('user/V_tambah');
            $this->load->view('template/footer');
        }
    }
    //edit
    public function edit_admin()
    {
        //set form validation
        $this->form_validation->set_rules('username_edit', 'Username', 'trim|is_unique[admin.username]', [
            'is_unique' => '<b><i class="fa fa-exclamation-circle"></i> {field}</b> sudah digunakan'
        ]);
        $this->form_validation->set_rules('new_password', 'New_password', 'trim|min_length[6]|max_length[15]|matches[password_confirm]', [
            'matches' => '<b><i class="fa fa-exclamation-circle"></i> Password Baru dan Konfiramsi</b> Tidak sama',
            'min_lengt' => '<b><i class="fa fa-exclamation-circle"></i>minimal Password karakter 6</b>'
        ]);
        $this->form_validation->set_rules('password_confirm', 'Password_confirm', 'trim|matches[new_password]');

        $id = $this->input->post('id_admin');
        //cek validasi
        if ($this->form_validation->run() == true) {
            $nama = $this->input->post('nama_admin');
            $username_awal = $this->input->post('username', true);
            $new_password = md5($this->input->post('new_password', true));

            //cek nilai row
            $role_cek = $this->input->post('role');

            $username_cek =  $this->input->post('username_edit', true);
            //memnetukan userbame
            if ($username_cek == null || $username_cek == "") {
                $username = $username_awal;
            } else {
                $username = $username_cek;
            }

            //cek password
            if ($new_password == null || $new_password == md5("")) {
                $get_password_now = $this->m_admin->get_admin($id)->result();
                foreach ($get_password_now as $row) {
                    $password_now = $row->password;
                    $password = $password_now;
                }
            } else {
                $password = $new_password;
            }
            //memnetukan role

            if ($role_cek != null || $role_cek != "") {
                if ($role_cek == "1") {
                    $role = "superadmin";
                } else {
                    $role = "admin"; //kalau 2
                }
            } else {
                $role = "admin";
            }
            $data = array(
                'nama_admin' => $nama,
                'username' => $username,
                'password' =>  $password,
                'role' => $role

            );
            $this->m_admin->edit_admin($data, 'admin', $id);
            $session_now = $this->session->userdata('id_admin');
            $id = $id;
            if ($session_now == $id) {
                if ($username != $username_awal || $password != $password_now) {
                    $this->session->sess_destroy();
                    redirect(base_url('login'));
                } else {
                    $this->session->set_flashdata('message', 'Diubah');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', 'Diubah');
                redirect('admin');
            }
        } else {
            $admin = $this->m_admin->get_admin_by_id($id)->result();
            $data['data'] = $admin;

            // set tampilan yang akan muncul pada halaman admin 
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('user/V_edit', $data);
            $this->load->view('template/footer');
        }
    }

    public function form_tambah()
    {

        // set tampilan yang akan muncul pada halaman admin 
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('user/V_tambah',);
        $this->load->view('template/footer');
    }
    public function form_edit()
    {
        $id = $this->uri->segment('3');
        $admin = $this->m_admin->get_admin_by_id($id)->result();
        $data['data'] = $admin;

        // set tampilan yang akan muncul pada halaman admin 
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('user/V_edit', $data);
        $this->load->view('template/footer');
    }
    //hapus
    public function hapus_admin()
    {
        $id_admin = $this->input->post('id_admin');


        $this->m_admin->hapus_admin($id_admin, 'admin');
        $this->session->set_flashdata('message', 'Dihapus');

        redirect('admin');
    }
}
