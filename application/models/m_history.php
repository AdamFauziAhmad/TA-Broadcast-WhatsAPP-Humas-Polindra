<?php

defined('BASEPATH') or exit('No direct script access allowed');
class M_history extends CI_Model
{
    //insert data history file AHK yang didownload
    function tambah_hostory_file($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function get_data_all()
    {

        $this->db->select("*");

        return $this->db->get('history');
    }

    //get data for download PDF
    function  pdf_download($s = NULL, $e = NULL)
    {
        if ($s != NULL && $e != NULL) {
            $this->db->where('waktu >=', $s);
            $this->db->where('waktu <=', $e);
            // $this->db->or_like('nama_file', $q);
            // $this->db->or_like('waktu', $q);
            // $this->db->or_like('keterangan', $q);
            $this->db->order_by('waktu', "desc");

            return $this->db->get('history');
        } else {
            $this->db->select('*');

            return $this->db->get('history');
        }
    }

    //get data for search 

    function get_filtered_history($q = NULL, $s = NULL, $e = NULL)
    {

        if ($s != NULL && $e != NULL) {
            $this->db->where('waktu >=', $s);
            $this->db->where('waktu <=', $e);
            // $this->db->or_like('nama_file', $q);
            // $this->db->or_like('waktu', $q);
            // $this->db->or_like('keterangan', $q);
            $this->db->order_by('waktu', "desc");

            return $this->db->get('history');
        } else {
            $this->db->or_like('nama_file', $q);
            $this->db->or_like('waktu', $q);
            $this->db->or_like('keterangan', $q);
            $this->db->order_by('waktu', "desc");

            return $this->db->get('history');
        }
    }
}
