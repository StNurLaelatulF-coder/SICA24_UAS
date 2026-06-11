<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
{
    parent::__construct();

    if(!$this->session->userdata('login'))
    {
        redirect('auth');
    }

    if($this->session->userdata('role') != 'admin')
    {
        redirect('dashboard');
    }

    $this->load->model('produk_model');
}

    public function index()
    {
        $data['produk'] = $this->produk_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah()
{
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('produk/tambah');
    $this->load->view('templates/footer');
}

public function simpan()
{
    $data = [
        'kode_produk' => $this->input->post('kode_produk'),
        'nama_produk' => $this->input->post('nama_produk'),
        'harga'       => $this->input->post('harga'),
        'stok'        => $this->input->post('stok')
    ];

    $this->produk_model->insert($data);

    redirect('produk');
}

public function edit($id)
{
    $data['produk'] = $this->produk_model->get_by_id($id);

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('produk/edit', $data);
    $this->load->view('templates/footer');
}

public function update($id)
{
    $data = [
        'kode_produk' => $this->input->post('kode_produk'),
        'nama_produk' => $this->input->post('nama_produk'),
        'harga'       => $this->input->post('harga'),
        'stok'        => $this->input->post('stok')
    ];

    $this->produk_model->update($id, $data);

    redirect('produk');
}

public function hapus($id)
{
    $this->produk_model->delete($id);

    redirect('produk');
}
}