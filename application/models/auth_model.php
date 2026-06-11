<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db
                    ->where('username', $username)
                    ->where('password', $password)
                    ->get('user')
                    ->row();
    }

}