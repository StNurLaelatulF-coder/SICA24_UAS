<?php
class Produk_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('produk')->result();
    }

    public function tampil()
    {
        return $this->db->get('produk')->result();
    }

    public function insert($data)
    {
        $this->db->insert('produk', $data);
    }

    public function delete($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }

    public function get_by_id($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        return $this->db->get('produk')->row();
    }

    public function update($id_produk, $data)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
    }

}