<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Software extends CI_Controller
{
    public function index()
    {
        $data['tittle'] = "Service Software | Candra Apple";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->get('product')->result_array();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/software', $data);
        $this->load->view('pengunjung/template/footer');
    }


    public function service($product_name)
    {
        $this->load->model('Blog_model');
        $product = urldecode($product_name);
        $data['url'] = $this->uri->segment('1');
        $data['category'] = $this->Blog_model->getCategoryId($data['url']);
        $data['category_id'] = $data['category']['id'];
        $this->db->like('product', $product);
        $data['product'] = $this->db->get('product')->row_array();
        $data['tittle'] = $data['product']['product'] . " Service Software | Candra Apple";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //Pagination Database
        $jumlah_data = $this->Blog_model->getJumlahService($data['product']['id'], $data['category_id']);
        $config['base_url'] = base_url() . 'software/service/' . $data['product']['product'];
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $config["uri_segment"] = 4;
        //styling css for pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<nav aria-label="Page navigation"><ul class="pagination" >';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['content'] = $this->Blog_model->getServiceProduct($data['product']['id'], $data['category_id'], $config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        //recent blog
        $data['blog'] = $this->Blog_model->getBlogRecent();

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/softwareService', $data);
        $this->load->view('pengunjung/template/footer');
    }

    public function service_read()
    {
        $data['blog_id'] = $this->uri->segment('3');
        $this->load->model('Blog_model');
        $data['content'] = $this->Blog_model->getBlogByID($data['blog_id']);
        $data['tittle'] = "Candra Apple";
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/blogShow', $data);
        $this->load->view('pengunjung/template/footer');
    }
}
