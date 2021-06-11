<?php

defined('BASEPATH') or exit('No direct script access allowed');
class M_coba extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function ambil_data()
    {
        return $this->db->get('admin');
    }
}
