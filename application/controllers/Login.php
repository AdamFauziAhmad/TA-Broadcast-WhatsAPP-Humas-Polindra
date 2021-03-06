<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('form_validation');
        $this->load->model('m_login');
        $this->load->helper('form');
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
        // cek session

        if ($this->m_login->logged_id() == true) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            redirect("welcome");
        } else {

            //jika session belum terdaftar
            $this->load->view('login');
        }
    }

    function aksi_login()
    {


        //set form validation
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        //set message form validation
        $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 1px display: block">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus di isi</div></div>');

        //cek validasi
        if ($this->form_validation->run() == true) {

            //get data dari FORM
            $username =  htmlspecialchars($this->input->post("username", TRUE));
            $password = MD5($this->input->post('password', TRUE));

            //checking proses login data via model
            $checking = $this->m_login->check_login('admin', array('username' => $username), array('password' => $password));

            //jika ditemukan, maka create session
            if ($checking != false) {


                foreach ($checking as $apps) {


                    $session_data = array(
                        'id_admin'   => $apps->id_admin,
                        'username' => $apps->username,
                        'nama_admin' => $apps->nama_admin,
                        'role' => $apps->role,
                        'last_login' => $apps->last_login,
                        'status' => "login"
                    );
                    //set session userdata
                    $this->session->set_userdata($session_data);

                    //mengupdate last login pada database
                    date_default_timezone_set("ASIA/JAKARTA");
                    $date = array('last_login' => date('Y-m-d H:i:s'));
                    $id =  $this->session->userdata('id_admin');
                    $this->m_login->last_login('admin', $date, $id);

                    redirect('welcome');
                }
            } else {
                // kirim pesan jika gagal login

                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Username dan password salah !</div>');
                redirect(base_url("login"));
            }
            // }

        } else {

            $this->load->view('login');
        }
    }


    //logout
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
