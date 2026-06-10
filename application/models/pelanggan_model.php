<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('pelanggan')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('pelanggan', ['id_pelanggan' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('pelanggan', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_pelanggan', $id)
                        ->update('pelanggan', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_pelanggan', $id)
                        ->delete('pelanggan');
    }
}