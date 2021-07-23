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
        $table_daterange = urldecode($this->input->get('dates', true));

        if ($table_daterange == null || $table_daterange == "") {
            $startdate = null;
            $enddate = null;
        } else {
            $explode = explode('-', $table_daterange);
            $start = strtr($explode[0], '/', '-');
            $end = strtr($explode[1], '/', '-');
            $startdate = date('Y-m-d', strtotime($start));
            $enddate = date('Y-m-d', strtotime($end));
        }


        // $filter = urldecode($this->input->get('date', true));


        // set data yang akan dikirim ke view
        $riwayat = $this->m_history->get_filtered_history($table_search, $startdate, $enddate);
        $jumlah = $riwayat->num_rows();

        // die;
        // if ($kontak->num_rows() > 0) {
        //     return $jumlah = $kontak->num_rows();
        // } else {
        //     return $jumlah = 0;
        // }


        $data = array(
            'riwayat' => $riwayat,
            'table_search' => $table_search,
            'table_daterange' => $table_daterange,
            'junlah_kontak' => $jumlah
        );


        // set tampilan yang akan muncul pada halaman kontak wa
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('history/V_history', $data);
        $this->load->view('template/footer');
    }
    public function export_pdf()
    {
        $table_daterange = urldecode($this->input->get('dates_download', true));

        if ($table_daterange == null || $table_daterange == "") {
            $startdate = null;
            $enddate = null;
            $history = $this->m_history->pdf_download($startdate, $enddate);
        } else {
            $explode = explode('-', $table_daterange);
            $start = strtr($explode[0], '/', '-');
            $end = strtr($explode[1], '/', '-');
            $startdate = date('Y/m/d', strtotime($start));
            $enddate = date('Y/m/d', strtotime($end));
            $history = $this->m_history->pdf_download($startdate, $enddate);
            $P_awal =  date('d-m-Y', strtotime($start));
            $P_akhir = date('d-m-Y', strtotime($end));
            $periode = $P_awal . " - " . $P_akhir;
        }
        // echo $startdate;
        // echo $enddate . "</br>";
        // echo $history->num_rows();
        // die;
        $tgl_cetak = date("d/m/Y");
        $mpdf = new \Mpdf\Mpdf();
        // $history = $this->m_history->get_data_all();
        $data_history = array(
            "history" => $history,
            "periode" => $periode
        );
        $nama_file = "Laporan riwayat BCWA_" . $tgl_cetak . ".pdf";
        $data = $this->load->view('history/V_pdf_export', $data_history, true);
        $mpdf->WriteHTML($data);
        $mpdf->Output($nama_file, 'I');
    }
}
