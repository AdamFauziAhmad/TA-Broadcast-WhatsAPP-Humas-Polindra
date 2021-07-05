<?php

defined('BASEPATH') or exit('No direct script access allowed');
class M_history extends CI_Model
{
    //insert data yang didownload
    function tambah_hostory_file($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function get_filtered_history($q = NULL)
    {

        $this->db->or_like('nama_file', $q);
        $this->db->or_like('waktu', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->order_by('waktu', "desc");

        return $this->db->get('history');
    }
}
