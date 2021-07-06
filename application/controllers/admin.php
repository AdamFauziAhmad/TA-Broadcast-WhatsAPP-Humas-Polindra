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


        // set tampilan yang akan muncul pada halaman kontak wa
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('user/V_admin', $data);
        $this->load->view('template/footer');
    }

    //tambah admin
    public function tambah_admin()
    {
        $nama = $this->input->post('nama_admin');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
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
        redirect('admin');
    }
    //edit
    public function edit_admin()
    {
        $nama = $this->input->post('nama_admin');
        $id = $this->input->post('id_admin');

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
            'nama_admin' => $nama,
            // 'username' => $username,
            // 'password' => $password,
            'role' => $role

        );
        $this->m_admin->edit_admin($data, 'admin', $id);
        redirect('admin');
    }
    //hapus
    public function hapus_admin()
    {
        $id_admin = $this->input->post('id_admin');


        $this->m_admin->hapus_admin($id_admin, 'admin');

        redirect('admin');
    }
}
