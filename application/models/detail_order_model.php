<?php
class Detail_order_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('detail_order', $data);
    }

    public function get_by_order($id_order)
    {
        $this->db->select('detail_order.*, produk.nama_produk, produk.harga');
        $this->db->from('detail_order');
        $this->db->join('produk', 'produk.id_produk = detail_order.id_produk');
        $this->db->where('id_order', $id_order);

        return $this->db->get()->result();
    }
}