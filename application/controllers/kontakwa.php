<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontakwa extends CI_Controller
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
        $table_search = urldecode($this->input->get('table_search', true));
        if ($table_search <> '') {
            $config['base_url'] = base_url() . 'dt_konsumen/index.html?q=' . urlencode($table_search);
            $config['first_url'] = base_url() . 'dt_konsumen/index.html?q=' . urlencode($table_search);
        } else {
            $config['base_url'] = base_url() . 'dt_konsumen/index.html';
            $config['first_url'] = base_url() . 'dt_konsumen/index.html';
        }
        // set data yang akan dikirim ke view
        $kontak = $this->m_kontak->get_filtered($table_search);
        $data = array(
            'kontak' => $kontak,
            'table_search' => $table_search
        );


        // set tampilan yang akan muncul pada halaman kontak wa
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('kontak/V_kontakwa', $data);
        $this->load->view('template/footer');
    }

    //tamabah data
    function tambah_kontak()
    {
        // $id_kontak = $this->input->post('id_kontak');
        $nama_kontak = $this->input->post('nama_kontak');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $nohp = $this->input->post('nomor_kontak');
        if (substr(trim($nohp), 0, 1) == '0') {
            $pengganti = "62";
            $start = 0;
            $length = 1;
            $nomor_kontak = substr_replace($nohp, $pengganti, $start, $length);
        } else if (substr(trim($nohp), 0, 1) == '+') {
            $nomor_kontak = preg_replace("/[^1-9]/", "", $nohp);
        }

        $kelas = $this->input->post('kelas');
        $status = $this->input->post('status');

        $data = array(
            'nama_kontak' => $nama_kontak,
            'nomor_kontak' => $nomor_kontak,
            'tahun_masuk' => $tahun_masuk,
            'kelas' => $kelas,
            'status' => $status
        );
        $this->m_kontak->tambah_kontak($data, 'kontak');

        redirect('kontakwa');
    }

    //edit data
    function edit_kontak()
    {
        $id_kontak = $this->input->post('id_kontak');
        $nama_kontak = $this->input->post('nama_kontak');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $nohp = $this->input->post('nomor_kontak');
        if (substr(trim($nohp), 0, 1) == '0') {
            $pengganti = "62";
            $start = 0;
            $length = 1;
            $nomor_kontak = substr_replace($nohp, $pengganti, $start, $length);
        } else if (substr(trim($nohp), 0, 1) == '+') {
            $nomor_kontak = preg_replace("/[^1-9]/", "", $nohp);
        }
        $kelas = $this->input->post('kelas');
        $status = $this->input->post('status');

        $data = array(
            'nama_kontak' => $nama_kontak,
            'nomor_kontak' => $nomor_kontak,
            'tahun_masuk' => $tahun_masuk,
            'kelas' => $kelas,
            'status' => $status
        );
        $this->m_kontak->edit_kontak($data, 'kontak', $id_kontak);

        redirect('kontakwa');
    }

    //hapus data
    function hapus_kontak()
    {
        // $id_kontak = $this->input->post('id_kontak');
        $id_kontak = $this->input->post('id_kontak');


        $this->m_kontak->hapus_kontak($id_kontak, 'kontak');

        redirect('kontakwa');
    }
}
