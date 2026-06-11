<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('produk')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('produk',$data);
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('id_produk',$id)
            ->get('produk')
            ->row();
    }

    public function update($id,$data)
    {
        return $this->db
            ->where('id_produk',$id)
            ->update('produk',$data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_produk',$id)
            ->delete('produk');
    }
}