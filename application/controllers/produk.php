<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['produk'] = $this->produk_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/index', $data);
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

    // ===============================
    // SIMPAN
    // ===============================
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

    public function hapus($id_produk)
    {
        $this->produk_model->delete($id_produk);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('produk');
    }

    public function edit($id_produk)
    {
        $data['produk'] = $this->produk_model->get_by_id($id_produk);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id_produk)
{
    $data = [
        'nama_produk' => $this->input->post('nama_produk'),
        'harga'       => $this->input->post('harga'),
        'stok'        => $this->input->post('stok')
    ];

    $this->produk_model->update($id_produk, $data);

    $this->session->set_flashdata('success', 'Data berhasil diupdate');

    redirect('produk');
}
}