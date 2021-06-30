<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//model 
		$this->load->model('m_login');
		$this->load->model('m_history');
		$this->load->model('m_grup');
		$this->load->model('m_kontak');
		//library
		$this->load->library('form_validation');

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
		$data_kontak = $this->m_kontak->get_filtered()->num_rows();
		$data_grup = $this->m_grup->get_grup()->num_rows();
		$data_history = $this->m_history->get_filtered_history()->num_rows();


		$data = array(
			"data_kontak" => $data_kontak,
			"data_grup" => $data_grup,
			"data_history" => $data_history
		);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}
}
