<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
    }

    public function index() {
        // kalau sudah login langsung ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('index.php/dashboard');
        }

        $this->load->view('login');
    }

    public function login_process() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->Auth_model->check_user($username);

    if ($user) {

    if (md5($password) == $user->password) {

        $session = array(
            'id'        => $user->id,
            'username'  => $user->username,
            'role'      => $user->role,
            'logged_in' => true
        );

        $this->session->set_userdata($session);

        redirect('index.php/dashboard');

    } else {
        $this->session->set_flashdata('error', 'Password salah!');
        redirect('index.php/auth');
    }

} else {
    $this->session->set_flashdata('error', 'Username tidak ditemukan!');
    redirect('index.php/auth');
}
}

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}