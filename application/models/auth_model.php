<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

<<<<<<< HEAD
    public function cek_login($username, $password)
    {
        return $this->db->get_where('user', [
            'username' => $username,
            'password' => $password
        ])->row();
    }

    public function update_last_login($id_user)
    {
        $this->db->where('id_user', $id_user);

        $this->db->update('user', [
=======
    public function check_user($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    public function update_last_login($id) {
        $this->db->where('id', $id);
        $this->db->update('users', [
>>>>>>> 582864d7e57bfac3d25c26aa04d3a5cc15c7fec3
            'last_login' => date('Y-m-d H:i:s')
        ]);
    }

}