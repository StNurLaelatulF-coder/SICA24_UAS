<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelanggan_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {   
        $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');

        if ($this->form_validation->run() == FALSE) {
        $this->tambah();
    } else {
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat'         => $this->input->post('alamat'),
            'telepon'        => $this->input->post('telepon')
        ];

        $this->pelanggan_model->insert($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('pelanggan');
    }}

    public function hapus($id)
    {
        $this->pelanggan_model->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('pelanggan');
    }

    public function edit($id)
    {
        $data['pelanggan'] = $this->pelanggan_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat'         => $this->input->post('alamat'),
            'telepon'        => $this->input->post('telepon')
        ];

        $this->pelanggan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('pelanggan');
    }
}