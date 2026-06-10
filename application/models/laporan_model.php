<?php
class Laporan_model extends CI_Model {

    public function get_sales_order()
    {
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');

        return $this->db->get()->result();
    }
}