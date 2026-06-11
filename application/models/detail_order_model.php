<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_order_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('detail_order.*, produk.nama_produk');
        $this->db->from('detail_order');
        $this->db->join('produk', 'produk.id_produk = detail_order.id_produk');

        return $this->db->get()->result();
    }

    // ✅ INSERT OTOMATIS SUBTOTAL
    public function insert($data)
    {
        $this->db->select('harga');
        $this->db->from('produk');
        $this->db->where('id_produk', $data['id_produk']);
        $produk = $this->db->get()->row();

        $data['subtotal'] = $produk->harga * $data['qty'];

        return $this->db->insert('detail_order', $data);
    }

    public function get_by_id($id)
    {
        return $this->db->where('id_detail', $id)->get('detail_order')->row();
    }

    // ✅ UPDATE OTOMATIS SUBTOTAL
    public function update($id, $data)
    {
        $this->db->select('harga');
        $this->db->from('produk');
        $this->db->where('id_produk', $data['id_produk']);
        $produk = $this->db->get()->row();

        $data['subtotal'] = $produk->harga * $data['qty'];

        return $this->db->where('id_detail', $id)->update('detail_order', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_detail', $id)->delete('detail_order');
    }
}