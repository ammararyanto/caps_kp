<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function index()
    {
        $data['tittle'] = "Blog | Candra Apple Solution";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('category_id', 1);
        $this->db->where('publish', 1);
        $this->db->order_by('id', 'DESC');
        $data['content'] = $this->db->get('blog')->result_array();

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/blog');
        $this->load->view('pengunjung/template/footer');
    }
}
