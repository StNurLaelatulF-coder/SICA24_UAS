<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan, sales.nama_sales');

        $this->db->from('sales_order');

        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = sales_order.id_pelanggan'
        );

        $this->db->join(
            'sales',
            'sales.id_sales = sales_order.id_sales'
        );

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('sales_order', $data);
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('id_order', $id)
            ->get('sales_order')
            ->row();
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id_order', $id)
            ->update('sales_order', $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_order', $id)
            ->delete('sales_order');
    }
}