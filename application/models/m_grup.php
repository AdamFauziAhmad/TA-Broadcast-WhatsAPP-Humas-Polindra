<?php

defined('BASEPATH') or exit('No direct script access allowed');
class M_grup extends CI_Model
{
    //GET kontak BY grup ID
    function get_kontak_by_grup($id)
    {
        $this->db->select('*');
        $this->db->from('kontak');
        $this->db->join('detail_grup', 'id_detail_kontak=id_kontak');
        $this->db->join('grup', 'id_detail_grup=id');
        $this->db->where('id_detail_grup', $id);
        $query = $this->db->get();
        return $query;
    }
    //menampilkan data grup dari database
    //READ
    function get_grup_by_id($id)
    {
        // $query = $this->db->get('grup');
        $this->db->select('grup.*,COUNT(id_kontak) AS item_grup');
        $this->db->from('grup');
        $this->db->join('detail_grup', 'id=id_detail_grup');
        $this->db->join('kontak', 'id_detail_kontak=id_kontak');
        $this->db->group_by('id');
        $this->db->where('id', $id);
        $this->db->order_by('nama_grup', "asc");
        $query = $this->db->get();
        return $query;
    }
    //mengambil data grup dengan menghitung jumlah kontak
    function get_grup()
    {
        // $query = $this->db->get('grup');
        $this->db->select('grup.*,COUNT(id_kontak) AS item_grup');
        $this->db->from('grup');
        $this->db->join('detail_grup', 'id=id_detail_grup');
        $this->db->join('kontak', 'id_detail_kontak=id_kontak');
        $this->db->group_by('id');
        $this->db->order_by('nama_grup', "asc");
        $query = $this->db->get();
        return $query;
    }

    // CREATE
    function create_grup($grup, $kontak)
    {
        $this->db->trans_start();
        //INSERT TO PACKAGE
        // date_default_timezone_set("Asia/Bangkok");
        // $data  = array(
        //     'package_name' => $grup,
        //     'package_created_at' => date('Y-m-d H:i:s') 
        // );
        $this->db->insert('grup', $grup);
        //GET ID PACKAGE
        $id = $this->db->insert_id();
        $result = array();
        foreach ($kontak as $key => $val) {
            $result[] = array(
                'id_detail_grup'   => $id,
                'id_detail_kontak'   => $_POST['kontak'][$key]
            );
        }
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('detail_grup', $result);
        $this->db->trans_complete();
    }

    // UPDATE
    function update_grup($id, $grup, $kontak)
    {
        $this->db->trans_start();
        //UPDATE TO PACKAGE
        // $data  = array(
        //     'nama_grup' => $grup
        // );
        $this->db->where('package_id', $id);
        $this->db->update('grup', $grup);

        //DELETE DETAIL PACKAGE
        $this->db->delete('detail_grup', array('id_detail_grup' => $id));

        $result = array();
        foreach ($kontak as $key => $val) {
            $result[] = array(
                'id_detail_grup'   => $id,
                'id_detail_kontak'   => $_POST['kontak_edit'][$key]
            );
        }
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('detail_grup', $result);
        $this->db->trans_complete();
    }


    // DELETE
    function delete_grup($id)
    {
        $this->db->trans_start();
        $this->db->delete('detail_grup', array('id_detail_grup' => $id));
        $this->db->delete('grup', array('id' => $id));
        $this->db->trans_complete();
    }
}
