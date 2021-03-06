<?php

defined('BASEPATH') or exit('No direct script access allowed');
class M_kontak extends CI_Model
{
    // get all kontak

    function get_kontak_all()
    {
        // GET ALL kontak
        $this->db->select('*');
        $this->db->order_by('nama_kontak', "asc");
        $query = $this->db->get('kontak');
        return $query;
    }

    //menampilkan data kontak dari database berdasarkan param
    function get_kontak($nomor_kontak = null)
    {

        $this->db->select('*');
        $this->db->where('nomor_kontak', $nomor_kontak);
        $this->db->order_by('nama_kontak', "asc");
        $query = $this->db->get('kontak');
        return $query;
    }


    // get data with limit and search
    function get_filtered($q = NULL)
    {

        $this->db->or_like('nama_kontak', $q);
        $this->db->or_like('nomor_kontak', $q);
        // $this->db->or_like('kelas', $q);
        // $this->db->or_like('tahun_masuk', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->order_by('nama_kontak', "asc");

        return $this->db->get('kontak');
    }
    function get_kontak_by_id($id_kontak)
    {
        // $result = array();
        // foreach ($id_kontak as $key => $val) {
        //     $result[] = array(
        //         'id_kontak'   => $_POST['kontak'][$key]
        //     );
        // }
        // GET kontak by id
        $this->db->select('*');
        $this->db->from('kontak');
        $this->db->where_in('id_kontak', $id_kontak);
        $this->db->order_by('nama_kontak', "asc");
        $query = $this->db->get();

        return $query;
    }
    //menambah data ke db kontak
    function tambah_kontak($data, $table)
    {

        $this->db->insert($table, $data);
    }
    //menambah data ke db kontak

    //edit data ke db kontak
    function edit_kontak($data, $table, $id)
    {
        $this->db->where('id_kontak', $id);
        $this->db->update($table, $data);
    }
    //hapus data ke db kontak
    function hapus_kontak($data, $table)
    {
        $this->db->where('id_kontak', $data);
        $this->db->delete($table);
    }
    function hapus_batch($data, $table)
    {
        foreach ($data as $row) {
            $this->db->where('id_kontak', $row);
            $this->db->delete($table);
        }
    }
}
