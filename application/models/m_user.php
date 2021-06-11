<?php

class M_user extends CI_Model
{
    private $_table = "admin";

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isAdmin = $user->role == "admin";
            $isSuperAdmin = $user->role == "superadmin";


            // jika password benar dan dia admin
            if ($isPasswordTrue && $isAdmin) {
                // login sukses 
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->id_admin);
                return  redirect(base_url('welcome'));
            } else   if ($isPasswordTrue && $isSuperAdmin) {
                // login sukses 
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->id_admin);
                return  redirect(base_url('welcome'));
            }
        }

        // login gagal
        return false;
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id)
    {
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }
}
