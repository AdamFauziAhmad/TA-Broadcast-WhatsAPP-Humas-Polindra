<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_coba');
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
        $admin = $this->m_coba->ambil_data()->result();
        $pesan = $this->input->post('pesan', true);
        // $dt_kontak = $this->m_kontak->get_kontak_by_id($Id_kontak)->result();
        $data =  array(
            'admin' => $admin,
            // 'nama_file' => $nama_file,
            'pesan' => $pesan

        );
        $string = "+0987765544Suka*()bumi #$^%&87 Kode ()*(&*^6.";
        $result = preg_replace("/[^1-9]/", "", $string);
        // echo $result;
        // die();

        $this->load->view('template/header');
        $this->load->view('coba', $data);
        $this->load->view('template/footer');
    }
}
