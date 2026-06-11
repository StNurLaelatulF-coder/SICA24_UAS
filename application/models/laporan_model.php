<?php
class Laporan_model extends CI_Model {

    public function get_laporan($id_sales = null, $id_produk = null, $tanggal_awal = null, $tanggal_akhir = null)
    {
        $this->db->select('
            sales_order.tanggal,
            sales_order.total,
            sales_order.status,
            pelanggan.nama_pelanggan,
            sales.nama_sales,
            produk.nama_produk,
            detail_order.qty,
            detail_order.subtotal
        ');

        $this->db->from('detail_order');

        $this->db->join('sales_order', 'sales_order.id_order = detail_order.id_order');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');
        $this->db->join('sales', 'sales.id_sales = sales_order.id_sales');
        $this->db->join('produk', 'produk.id_produk = detail_order.id_produk');

        if ($id_sales) {
            $this->db->where('sales_order.id_sales', $id_sales);
        }

        if ($id_produk) {
            $this->db->where('detail_order.id_produk', $id_produk);
        }

        if ($tanggal_awal) {
            $this->db->where('sales_order.tanggal >=', $tanggal_awal);
        }

        if ($tanggal_akhir) {
            $this->db->where('sales_order.tanggal <=', $tanggal_akhir);
        }

        return $this->db->get()->result();
    }
}