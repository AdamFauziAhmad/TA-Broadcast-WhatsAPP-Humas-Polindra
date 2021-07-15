<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/spout-master/src/Spout/Autoloader/autoload.php';

use Box\Spout\Common\Entity\Row;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

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
        $jenis = $this->uri->segment('3');

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
            'junlah_kontak' => $jumlah,
            'jenis' => $jenis
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
        //menangkap data dari form
        // $id_kontak = $this->input->post('id_kontak');
        $nama_kontak = $this->input->post('nama_kontak');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $nohp = $this->input->post('nomor_kontak');
        $kelas = $this->input->post('kelas');
        $keterangan = $this->input->post('keterangan');
        $jurusan = $this->input->post('jurusan');
        // membuat format nomor telepon jadi 628xxxxx
        if (substr(trim($nohp), 0, 1) == '0') {
            $pengganti = "62";
            $start = 0;
            $length = 1;
            $nomor_kontak = substr_replace($nohp, $pengganti, $start, $length);
        } else if (substr(trim($nohp), 0, 1) == '+') {
            $nomor_kontak = preg_replace("/[^0-9]/", "", $nohp);
        } else {
            $nomor_kontak = $nohp;
        }
        $cek = $this->m_kontak->get_kontak($nomor_kontak)->num_rows();
        if ($cek == 0) {
            # code...

            //memasukan data dalam array untuk di kirim ke db
            $data = array(
                'id_kontak' => uuid_v4(),
                'nama_kontak' => $nama_kontak,
                'nomor_kontak' => $nomor_kontak,
                'tahun_masuk' => $tahun_masuk,
                'kelas' => $kelas,
                'keterangan ' => $keterangan,
                'jurusan' => $jurusan
            );
            //menjalankan operasi tambah pada model
            $this->m_kontak->tambah_kontak($data, 'kontak');
            $this->session->set_flashdata('message', 'Ditambahkan');
        } else {

            $this->session->set_flashdata('message', 'Sudah Ada');
        }
        redirect('kontakwa');
    }

    //edit data=
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
            $nomor_kontak = preg_replace("/[^0-9]/", "", $nohp);
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
        $this->session->set_flashdata('message', 'Diubah');
        redirect('kontakwa');
    }

    //hapus data
    function hapus_kontak()
    {
        // $id_kontak = $this->input->post('id_kontak');
        $id_kontak = $this->input->post('id_kontak');
        $this->m_kontak->hapus_kontak($id_kontak, 'kontak');
        $this->session->set_flashdata('message', 'Dihapus');

        redirect('kontakwa');
    }

    //input data lewat excel
    public function import_excel()
    {


        $config['upload_path'] = './assets/file'; //path upload

        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        $config['file_name'] = 'doc' . time();  // nama file

        $this->load->library('upload', $config); //meload librari upload


        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('assets/file/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 11;
                foreach ($sheet->getRowIterator() as $row) {


                    // cek kondisi memulai pengambilan data pada baris 3
                    if ($numrow > 11) {

                        //seleksi nomor agar menjadi 628xxxx
                        $kontak_hp = $row->getCellAtIndex(2);
                        $regex = "/-/";
                        if (substr(trim($kontak_hp), 0, 1) == '0' || preg_match_all($regex, trim($kontak_hp)) > 0) {
                            $pengganti = "62";
                            $start = 0;
                            $length = 1;
                            $nomor_kontak = substr_replace($kontak_hp, $pengganti, $start, $length);
                        } else if (substr(trim($kontak_hp), 0, 1) == '+' || preg_match_all($regex, trim($kontak_hp)) > 0) {
                            $nomor_kontak = preg_replace("/[^0-9]/", "", $kontak_hp);
                        } else {
                            $nomor_kontak = $kontak_hp;
                        }
                        $cek_nomer = preg_replace("/[^0-9]/", "", $nomor_kontak);
                        if ($cek_nomer == null || $cek_nomer == "") {
                        } else {

                            // echo $nomor_kontak;

                            $cek = $this->m_kontak->get_kontak($nomor_kontak)->num_rows();
                            // echo '<br>' . $cek;
                            // die;
                            // die();
                            if ($cek == 0) {

                                $keterangan = strtolower($row->getCellAtIndex(3));
                                if ($keterangan == null || $keterangan == "" || $keterangan == 'lainya') {
                                    $ket = "lainnya";
                                } else {
                                    $ket = $keterangan;
                                }
                                // if ( substr(trim($row->getCellAtIndex(5)), 4, 1) == '/[^0-9]/') {
                                //     $kelas =  substr_replace($row->getCellAtIndex(5), "", 4, 1);
                                // }
                                $jurusan = strtolower($row->getCellAtIndex(6));

                                //input data excel kevariabel array
                                $data = array(
                                    'id_kontak' => uuid_v4(),
                                    'nama_kontak' => $row->getCellAtIndex(1),
                                    'nomor_kontak' => $nomor_kontak,
                                    'keterangan' => ucwords($ket),
                                    'tahun_masuk' => $row->getCellAtIndex(4),
                                    'kelas' => strtoupper($row->getCellAtIndex(5)),
                                    'jurusan' => ucwords($jurusan)
                                );



                                //jalan operasi database 
                                $this->m_kontak->tambah_kontak($data, 'kontak');
                            } else {
                            }
                        }
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('assets/file/' . $file['file_name']);
            }
        } else {
            echo "Eror :" . $this->upload->display_errors();
        };

        // unlink('assets/file/' . $file['file_name']);
        $this->session->set_flashdata('message', 'Ditambahkan');
        redirect('kontakwa');
    }
    public function download_format_excel()
    {
        force_download('assets/file/format_excel_import/Fromat Import Excel_BCWA.xlsx', null);
    }
}
