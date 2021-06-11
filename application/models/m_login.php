<?php

defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model
{
    function cek_login($table, $where)
    {
        $user = $this->db->get_where($table, $where);
        $this->session->set_userdata(['user_logged' => $user]);
        return $user;
    }

    function isNotLogin()
    {
        if ($this->session->userdata('status') == null) {
            return true;
        }
    }

    //fungsi cek session
    function logged_id()
    {
        if ($this->session->userdata('status') != null) {
            return true;
        }
    }


    function last_login($table, $date, $id)
    {


        $this->db->where('id_admin', $id);
        $this->db->update($table, $date);
    }


    // check username
    public function check_field($table, $name)
    {
        $query = $this->db->get_where($table, array('username' => $name));
        if ($query->row_array() === 0) {
            return false;
        } else {
            return true;
        }
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
}
