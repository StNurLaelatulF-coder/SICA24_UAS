<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $this->load->model('sales_order_model');

        $role = $this->session->userdata('role');

        if($role != 'admin' && $role != 'sales')
        {
        redirect('dashboard');
}
    }

    public function index()
    {
        $data['order'] = $this->sales_order_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
{
    $data['pelanggan'] = $this->db->get('pelanggan')->result();
    $data['sales']     = $this->db->get('sales')->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('sales_order/tambah',$data);
    $this->load->view('templates/footer');
}

public function simpan()
{
    $data = [
        'id_pelanggan' => $this->input->post('id_pelanggan'),
        'id_sales'     => $this->input->post('id_sales'),
        'tanggal'      => $this->input->post('tanggal'),
        'total'        => $this->input->post('total'),
        'status'       => $this->input->post('status'),
        'stok_terpotong' => 0
    ];

    $this->sales_order_model->insert($data);

    redirect('sales_order');
}

public function edit($id)
{
    $data['order'] = $this->sales_order_model->get_by_id($id);
    $data['pelanggan'] = $this->db->get('pelanggan')->result();
    $data['sales'] = $this->db->get('sales')->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('sales_order/edit',$data);
    $this->load->view('templates/footer');
}

public function update($id)
{
    $order_lama = $this->sales_order_model->get_by_id($id);

    $status_lama = $order_lama->status;
    $status_baru = $this->input->post('status');

    $data = [
        'id_pelanggan' => $this->input->post('id_pelanggan'),
        'id_sales'     => $this->input->post('id_sales'),
        'tanggal'      => $this->input->post('tanggal'),
        'total'        => $this->input->post('total'),
        'status'       => $status_baru
    ];

    $this->sales_order_model->update($id, $data);
    $order_baru = $this->sales_order_model->get_by_id($id);

if (
    ($status_baru == 'dikirim' || $status_baru == 'selesai')
    && $order_baru->stok_terpotong == 0
) {

    $detail = $this->db
        ->where('id_order', $id)
        ->get('detail_order')
        ->result();

    foreach ($detail as $d) {

        $this->db->set('stok', 'stok - '.$d->qty, FALSE);
        $this->db->where('id_produk', $d->id_produk);
        $this->db->update('produk');
    }

    $this->db->where('id_order', $id);
    $this->db->update('sales_order', [
        'stok_terpotong' => 1
    ]);
}
if (
    $status_baru == 'dibatalkan'
    && $order_baru->stok_terpotong == 1
) {

    $detail = $this->db
        ->where('id_order', $id)
        ->get('detail_order')
        ->result();

    foreach ($detail as $d) {

        $this->db->set('stok', 'stok + '.$d->qty, FALSE);
        $this->db->where('id_produk', $d->id_produk);
        $this->db->update('produk');
    }

    $this->db->where('id_order', $id);
    $this->db->update('sales_order', [
        'stok_terpotong' => 0
    ]);
}

    redirect('sales_order');
}

public function hapus($id)
{
    $this->sales_order_model->delete($id);

    redirect('sales_order');
}
}