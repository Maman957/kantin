<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('session');
    }
    public function index()
    {
        $data['title'] = 'Masuk';
        $this->session->unset_userdata('id_pengguna');
        $this->load->view('login');
    }
    public function daftar()
    {
        $data['title'] = 'Daftar';
        $this->load->view('register');
    }
    public function prosesLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $pengguna = $this->LoginModel->getPengguna($username, $password)->row_array();

        if ($pengguna) {
            if ($pengguna['role'] == 1) {
                $data = [
                    'id_pengguna' => $pengguna['id_pengguna']
                ];
                $this->session->set_userdata($data);
                redirect(base_url('dasbor'));
            } else {
                $data = [
                    'id_pengguna' => $pengguna['id_pengguna']
                ];
                $this->session->set_userdata($data);
                redirect(base_url('katalog'));
            }
        } else {
            $_SESSION["gagal"] = 'Silahkan periksa username dan password anda';
            redirect(base_url());
        }
    }
    public function prosesDaftar()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $pengguna = $this->LoginModel->getPengguna($username, $password)->row_array();
        if ($pengguna) {
            $_SESSION["gagal"] = 'Silahkan masuk';
            redirect(base_url('daftar'));
        } else {
            parse_str(file_get_contents('php://input'), $data);

            $this->LoginModel->prosesDaftar($data);
            $pelanggan = $this->LoginModel->getPengguna($username, $password)->row_array();
            if ($pelanggan) {
                $data = [
                    'id_pengguna' => $pelanggan['id_pengguna']
                ];
                $this->session->set_userdata($data);
                redirect(base_url('katalog'));
            }
        }
    }
}
