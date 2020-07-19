<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function index()
    {
        $data['tittle'] = "About | Candra Apple Solution";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/about');
        $this->load->view('pengunjung/template/footer');
    }
}
