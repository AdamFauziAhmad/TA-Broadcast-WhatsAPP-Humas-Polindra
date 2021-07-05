<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //set model yang akan dipakai
        $this->load->model('m_history');
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
        $table_search = urldecode($this->input->get('table_search', true));

        // set data yang akan dikirim ke view
        $riwayat = $this->m_history->get_filtered_history($table_search);
        $jumlah = $riwayat->num_rows();
        // if ($kontak->num_rows() > 0) {
        //     return $jumlah = $kontak->num_rows();
        // } else {
        //     return $jumlah = 0;
        // }


        $data = array(
            'riwayat' => $riwayat,
            'table_search' => $table_search,
            'junlah_kontak' => $jumlah
        );


        // set tampilan yang akan muncul pada halaman kontak wa
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('history/V_history', $data);
        $this->load->view('template/footer');
    }
}
