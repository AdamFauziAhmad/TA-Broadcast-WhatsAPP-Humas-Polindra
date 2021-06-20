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
        $this->load->library('Excel');
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
        $kontak = $this->m_kontak->get_filtered($table_search);
        $jumlah = $kontak->num_rows();
        // if ($kontak->num_rows() > 0) {
        //     return $jumlah = $kontak->num_rows();
        // } else {
        //     return $jumlah = 0;
        // }


        $data = array(
            'kontak' => $kontak,
            'table_search' => $table_search,
            'junlah_kontak' => $jumlah
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
        } else {
            $nomor_kontak = $nohp;
        }

        $kelas = $this->input->post('kelas');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama_kontak' => $nama_kontak,
            'nomor_kontak' => $nomor_kontak,
            'tahun_masuk' => $tahun_masuk,
            'kelas' => $kelas,
            'keterangan ' => $keterangan
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
        $regex = "/-/";


        if (substr(trim($nohp), 0, 1) == '0' || preg_match_all($regex, trim($nohp)) > 0) {
            $pengganti = "62";
            $start = 0;
            $length = 1;
            $nomor_kontak = substr_replace($nohp, $pengganti, $start, $length);
        } else if (substr(trim($nohp), 0, 1) == '+' || preg_match_all($regex, trim($nohp)) > 0) {
            $nomor_kontak = preg_replace("/[^1-9]/", "", $nohp);
        } else {
            $nomor_kontak = $nohp;
        }

        $kelas = $this->input->post('kelas');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama_kontak' => $nama_kontak,
            'nomor_kontak' => $nomor_kontak,
            'tahun_masuk' => $tahun_masuk,
            'kelas' => $kelas,
            'keterangan' => $keterangan
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

    //input data lewat excel
    public function import_excel()
    {
        $fileName = $_FILES['file']['name'];

        $config['upload_path'] = './assets/file'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
            exit();
        }

        $inputFileName = './assets/file' . $fileName;

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray(
                'A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE
            );
            $no_hp = $rowData[0][0];
            if (substr(trim($no_hp), 0, 1) == '0') {
                $pengganti = "62";
                $start = 0;
                $length = 1;
                $nomor_kontak = substr_replace($no_hp, $pengganti, $start, $length);
            } else if (substr(trim($no_hp), 0, 1) == '+') {
                $nomor_kontak = preg_replace("/[^1-9]/", "", $no_hp);
            } else {
                $nomor_kontak = $no_hp;
            }

            // Sesuaikan key array dengan nama kolom di database                                                         
            $data = array(
                "nomor_kontak" => $nomor_kontak,
                "nama_kontak" => $rowData[0][1]
            );

            $this->m_kontak->tambah_kontak('kontak', $data);
        }
        redirect('kontakwa');
    }
}
