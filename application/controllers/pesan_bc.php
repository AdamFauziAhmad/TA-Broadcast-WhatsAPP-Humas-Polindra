<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_bc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //set model yang akan dipakai
        $this->load->model('m_kontak');
        $this->load->model('m_login');
        // menyiapkan library CI
        $this->load->library('form_validation');
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
        $kontak = $this->input->post('id_kontak', true);


        if ($kontak != null) {
            $data['data_kontak'] = $this->m_kontak->get_kontak_by_id($kontak);




            // set data yang akan dikirim ke view
            // $data['pesan_bc'] = $this->m_kontak->get_kontak();


            // set tampilan yang akan muncul pada halaman kontak wa
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('V_buat_pesan', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert" style="padding-top: -30px; padding-bottom: -30px; margin-top: 10px; margin-bottom: 10px;">pilih kontak untuk membuat pesan !</div>');
            redirect('kontakwa');
        }
    }
    public function generate_ahk()
    {
        $Id_kontak = $this->input->post('id_kontak', true);
        $nama_file = $this->input->post('nama_file', true);
        $keterangan = $this->input->post('keterangan', true);
        $kode_enter = 13;
        $str = chr($kode_enter);
        $pesan =   $this->input->post('pesan', true);
        $dt_kontak = $this->m_kontak->get_kontak_by_id($Id_kontak)->result();
        $data =  array(
            'data_kontak' => $dt_kontak,
            'nama_file' => $nama_file,
            'pesan' => $pesan

        );
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('V_export_ahk', $data);
        $this->load->view('template/footer');
    }
    public function download_AHK()
    {
    }
}
