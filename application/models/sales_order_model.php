<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('
            sales_order.*,
            pelanggan.nama_pelanggan,
            sales.nama_sales
        ');

        $this->db->from('sales_order');

        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );

        $this->db->join(
            'sales',
            'sales.id_sales = sales_order.id_sales',
            'left'
        );

        return $this->db->get()->result();
    }

    public function get_pelanggan()
    {
        return $this->db->get('pelanggan')->result();
    }

    public function get_produk()
    {
        return $this->db->get('produk')->result();
    }

    public function get_sales()
    {
        return $this->db->get('sales')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('sales_order', [
            'id_order' => $id
        ])->row();
    }

    public function get_detail($id_order)
    {
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );
        $this->db->where('sales_order.id_order', $id_order);

        return $this->db->get()->row();
    }

    public function get_detail_produk($id_order)
    {
        $this->db->where('id_order', $id_order);
        return $this->db->get('detail_order')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('sales_order', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_order', $id)
                        ->update('sales_order', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_order', $id)
                        ->delete('sales_order');
    }

    public function filter($awal, $akhir)
    {
        $this->db->select('
            sales_order.*,
            pelanggan.nama_pelanggan,
            sales.nama_sales
        ');

        $this->db->from('sales_order');
        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );

        $this->db->join(
            'sales',
            'sales.id_sales = sales_order.id_sales',
            'left'
        );

        $this->db->where('tanggal_order >=', $awal);
        $this->db->where('tanggal_order <=', $akhir);

        return $this->db->get()->result();
    }
}