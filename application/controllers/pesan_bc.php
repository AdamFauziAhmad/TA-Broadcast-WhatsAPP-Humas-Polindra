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
        $this->load->model('m_grup');
        $this->load->helper('download');
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
        $grup = $this->input->post('id_grup', true);
        $jenis = $this->input->post('jenis', true);



        if ($kontak != null || $grup != null) {
            if ($jenis == 1) {
                $data['data_kontak'] = $this->m_kontak->get_kontak_by_id($kontak)->result();
                $data['nama_grup'] = null;
                $data['jenis'] = $jenis;
            } else {
                $data['data_kontak'] = $this->m_grup->get_kontak_by_grup($grup)->result();
                $data['nama_grup'] = $this->m_grup->get_grup_by_id($grup)->result();
                $data['jenis'] = $jenis;
            }


            // set data yang akan dikirim ke view
            // $data['pesan_bc'] = $this->m_kontak->get_kontak();


            // set tampilan yang akan muncul pada halaman kontak wa
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('pesan/V_buat_pesan', $data);
            $this->load->view('template/footer');
        } else {
            if ($jenis == 1) {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert" style="padding-top: -30px; padding-bottom: -30px; margin-top: 10px; margin-bottom: 10px;">pilih kontak untuk membuat pesan !</div>');
                redirect('kontakwa');
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert" style="padding-top: -30px; padding-bottom: -30px; margin-top: 10px; margin-bottom: 10px;">pilih grup untuk membuat pesan !</div>');
                redirect('grup');
            }
        }
    }
    public function generate_ahk()
    {
        $jenis_nomor = $this->input->post('jenis', true);
        if ($jenis_nomor == '1') {
            $jenis = " ";
        } else {
            $jenis = "[GRUP]";
        }
        $Id_kontak = $this->input->post('id_kontak', true);
        $nama_file = $this->input->post('nama_file', true);
        $keterangan = $this->input->post('keterangan', true);
        $kode_enter = 13;

        $pesan =   $this->input->post('pesan', true);
        $dt_kontak = $this->m_kontak->get_kontak_by_id($Id_kontak)->result();
        $data =  array(
            'data_kontak' => $dt_kontak,
            'nama_file' => $nama_file,
            'pesan' => $pesan,
            'keterangan' =>   $keterangan,
            'jenis' => $jenis

        );
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('pesan/V_export_ahk', $data);
        $this->load->view('template/footer');
    }
    public function download_AHK()
    {


        $Id_kontak = $this->input->post('id_kontak', true);
        $nama_file = $this->input->post('nama_file', true);
        $keterangan = $this->input->post('keterangan', true);

        $kode_enter = 13;

        $pesan =   $this->input->post('pesan', true);
        $data_kontak = $this->m_kontak->get_kontak_by_id($Id_kontak)->result();


        $nama_file = $nama_file;
        $tanggal = date('d-M-Y-H-i-s');
        $kode_enter = 13; //kode ASCII untuk enter
        $str = chr($kode_enter); //deklarasi variabel kode ASCII 
        //membuat gemerate tamda bca ke AHK
        $pesan_isi = str_replace(array('!', '?', '.', ':', '"', ';', '[', ']', '|', '<', '>'), array('{!}', '{?}',  '{,}', '{:}', '{,}', '{"}', '{;}', '{[}', '{}}', '{|}', '{<}', '{>}'), $pesan);
        $PecahStr = explode($str, $pesan_isi); //mengacak string setiap enter kedalam bentuk array
        $tanggal = date('d-M-Y-H-i-s');
        $myfile = fopen("BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk", "w") or die("Unable to open file!");
        $txt = "MsgBox, Mulai?\n";
        fwrite($myfile, $txt);

        $txt = ";Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA\n";
        // fwrite($myfile, $txt);
        // $txt = 'clipboard :=""' . "\n";



        foreach ($data_kontak as $data) {
            fwrite($myfile, $txt);

            $txt = "Run, https://api.whatsapp.com/send?phone=" . $data->nomor_kontak . "\n";
            // fwrite($myfile, $txt);
            // $txt = "Sleep, 10000\n";
            fwrite($myfile, $txt);
            $txt = "Sleep, 9000\n";
            fwrite($myfile, $txt);
            $txt = "Send, ^v\n";
            fwrite($myfile, $txt);
            $txt = "Sleep," . mt_rand(1000, 10000) . "\n";
            // fwrite($myfile, $txt);
            // $txt = "string =\n(\n" . $pesan_isi . "\n)\n";
            foreach ($PecahStr as $jml => $psn) {
                if ($jml == 0) {
                    fwrite($myfile, $txt);
                    $txt = "string" . $jml . " =\n(\n" . $psn . "\n)\n";
                } else {

                    fwrite($myfile, $txt);
                    $txt = "string" . $jml . " =\n(" . $psn . "\n)\n";
                }
            }

            foreach ($PecahStr as $jml => $data) {
                if ($jml == 0) {
                    fwrite($myfile, $txt);
                    $txt = "Send," . "%string" . $jml . "%+{Enter}";
                } else {
                    fwrite($myfile, $txt);
                    $txt = "%string" . $jml . "%+{Enter}";
                }
            }
            fwrite($myfile, $txt);
            $txt = "\n";
            fwrite($myfile, $txt);
            $txt = "Sleep," . mt_rand(1000, 10000) . "\n";
            fwrite($myfile, $txt);
            $txt = "Send, {Enter}\n";
            fwrite($myfile, $txt);
            $txt =  "Sleep," . mt_rand(1000, 10000) . "\n";
            fwrite($myfile, $txt);
            $txt = "send, !{TAB}\n";
            fwrite($myfile, $txt);
            $txt =  "Sleep," . mt_rand(1000, 10000) . "\n";
            fwrite($myfile, $txt);
            $txt = "send, ^w\n";
            fwrite($myfile, $txt);
            $txt =  "Sleep," . mt_rand(1000, 10000) . "\n";
        }
        fwrite($myfile, $txt);
        $txt = 'clipboard :=""' . "\n";
        fwrite($myfile, $txt);
        $txt = "MsgBox, Selesai!\n";
        fwrite($myfile, $txt);
        $txt = "return\n";
        fwrite($myfile, $txt);
        $txt = "Exit";
        fwrite($myfile, $txt);
        fclose($myfile);
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename("BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk"));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize("BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk"));
        readfile("BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk");
        unlink("BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk");

        // redirect('kontakwa');



        // force_download(base_url() . "BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk",, NULL);
    }
}
