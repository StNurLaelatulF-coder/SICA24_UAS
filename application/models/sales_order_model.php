<?php
<<<<<<< HEAD
class Sales_order_model extends CI_Model {

    public function get_all()
=======
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

    public function simpan_order()
    {
        echo '<pre>';
        print_r($_POST);
        die();

        $id_pelanggan = $this->input->post('id_pelanggan');
        $produk       = $this->input->post('produk'); // array
        $qty          = $this->input->post('qty');    // array

        $id_user = $this->session->userdata('id');

        $data_order = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_sales'     => $this->input->post('id_sales'),
            'tanggal_order'=> date('Y-m-d'),
            'status'       => 'draft',
            'total_harga'  => 0
        ];

        $this->db->insert('sales_order', $data_order);
        $id_order = $this->db->insert_id();

        $total = 0;

        for ($i = 0; $i < count($produk); $i++) {

            $kode_produk = $produk[$i];
            $jumlah      = $qty[$i];

            // ambil data produk
            $p = $this->db->get_where('produk', [
                'kode_produk' => $kode_produk
            ])->row();

            $subtotal = $p->harga * $jumlah;
            $total += $subtotal;

            $data_detail = [
                'id_order'     => $id_order,
                'kode_produk'  => $kode_produk,
                'qty'          => $jumlah,
                'harga'        => $p->harga,
                'subtotal'     => $subtotal
            ];

            $this->db->insert('detail_order', $data_detail);

            // update stok
            $this->db->set('stok', 'stok-'.$jumlah, FALSE);
            $this->db->where('kode_produk', $kode_produk);
            $this->db->update('produk');
        }

        $this->db->where('id_order', $id_order);
        $this->db->update('sales_order', [
            'total_harga' => $total
        ]);
    }

    public function get_detail($id_order)
>>>>>>> 582864d7e57bfac3d25c26aa04d3a5cc15c7fec3
    {
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');
<<<<<<< HEAD
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('sales_order', ['id_order' => $id])->row();
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
}
=======
        $this->db->where('sales_order.id_order', $id_order);
        return $this->db->get()->row();
    }
    public function get_detail_produk($id_order)
{
    $this->db->where('id_order', $id_order);
    return $this->db->get('detail_order')->result();
}
public function filter($awal, $akhir)
{
    $this->db->select('
        sales_order.*,
        pelanggan.nama_pelanggan,
        sales.nama_sales
    ');

    $this->db->from('sales_order');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');
    $this->db->join('sales', 'sales.id_sales = sales_order.id_sales', 'left');

    $this->db->where('tanggal_order >=', $awal);
    $this->db->where('tanggal_order <=', $akhir);

    return $this->db->get()->result();
}
}
>>>>>>> 582864d7e57bfac3d25c26aa04d3a5cc15c7fec3
