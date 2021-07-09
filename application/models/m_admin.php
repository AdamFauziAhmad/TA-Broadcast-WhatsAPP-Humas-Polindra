<?php

defined('BASEPATH') or exit('No direct script access allowed');
class M_admin extends CI_Model
{




    // get data with limit and search
    function get_filtered($q = NULL)
    {

        $this->db->or_like('nama_admin', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('role', $q);
        $this->db->or_like('last_login', $q);
        $this->db->order_by('nama_admin', "asc");
        return $this->db->get('admin');
    }
    function get_admin_by_id($id_admin)
    {

        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin', $id_admin);
        $query = $this->db->get();

        return $query;
    }
    //menambah data ke db admin
    function tambah_admin($data, $table)
    {

        $this->db->insert($table, $data);
    }

    //edit data ke db admin
    function edit_admin($data, $table, $id)
    {
        $this->db->where('id_admin', $id);
        $this->db->update($table, $data);
    }
    //hapus data ke db kontak
    function hapus_admin($data, $table)
    {
        $this->db->where('id_admin', $data);
        $this->db->delete($table);
    }
}
