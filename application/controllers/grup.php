<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //set model yang digunakan
        $this->load->model('m_login');
        $this->load->model('m_grup');
        $this->load->model('m_kontak');
        // set library yang digunakan
        $this->load->library('form_validation');
        //cek sudah login atau belum
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
        //siapkan data yang akan digunakana view
        $data['kontak'] = $this->m_kontak->get_kontak();
        $data['grup'] = $this->m_grup->get_grup();




        //set tampilan yang akan muncul dihalaman
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('grup/V_grup', $data);
        $this->load->view('template/footer');
    }
    //tambah grup
    function tambah_grup()
    {
        $nama_grup = $this->input->post('nama_grup', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $kontak = $this->input->post('kontak', TRUE);

        $grup = array(
            'nama_grup' => $nama_grup,
            'keterangan' => $keterangan

        );
        $this->m_grup->create_grup($grup, $kontak);
        redirect('grup');
    }
    //nenampilkan kontak berdasarkan idnya
    function get_kontak_by_id()
    {
        $id = $this->input->post('id', TRUE);
        if ($id != null) {
            $data = $this->m_kontak->get_kontak_by_id($id)->result();
            echo json_encode($data);
        } else {
            echo json_encode($data = null);
        }
    }

    //Derail Grup
    function detail_grup()
    {

        $id = $this->uri->segment('3');

        $data['data'] = $this->m_grup->get_grup_by_id($id)->result();
        $data['kontak'] = $this->m_grup->get_kontak_by_grup($id)->result();

        // var_dump($data['kontak']);
        // die();


        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('grup/V_grup_detail', $data);
        $this->load->view('template/footer');
    }

    // GET DATA PRODUCT BERDASARKAN Grup ID
    function get_kontak_by_grup()
    {
        $grup_id = $this->input->post('grup_id', true);
        // $grup_id = 4;
        $data = $this->m_grup->get_kontak_by_grup($grup_id)->result();

        foreach ($data as $result) {
            $value[] = $result->id_kontak;
        }
        echo json_encode($value);
    }
    //UPDATE
    function update()
    {
        $id = $this->input->post('grup_id', TRUE);
        $grup = $this->input->post('grup_edit', TRUE);
        $kontak = $this->input->post('kontak_edit', TRUE);
        $this->package_model->update_package($id, $grup, $kontak);
        redirect('grup');
    }

    // DELETE
    function hapus_grup()
    {
        $id = $this->input->post('id', TRUE);
        $this->m_grup->delete_grup($id);
        redirect('grup');
    }
}
