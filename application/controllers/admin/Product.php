<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
    }

    public function index()
    {
        $data['tittle'] = "Product";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->get('product')->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/product', $data);
        $this->load->view('admin/footer');
    }

    public function addProduct()
    {
        $data['tittle'] = "Add Product";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('product', 'Product', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/productAdd', $data);
            $this->load->view('admin/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path']          = './image/product/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->set('product', $this->input->post('product'), true);
                    $this->db->insert('product');
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            product hasn not been added</div>');
                }
            }



            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Produc added</div>');
            redirect('admin/product');
        }
    }

    public function edit($product_id)
    {
        $data['tittle'] = "Edit Product";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->where('id =', $product_id);
        $data['product'] = $this->db->get('product')->row_array();

        $this->form_validation->set_rules('product', 'Product', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/productEdit', $data);
            $this->load->view('admin/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path']          = './image/product/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['product']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'image/product/' . $old_image);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Product has been updated</div>');
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Product hasn not been updated</div>');
                }
            }

            $this->db->set('product', $this->input->post('product'), true);
            $this->db->where('id', $product_id);
            $this->db->update('product');



            redirect('admin/product');
        }
    }

    public function delete($product_id)
    {
        $this->db->where('id =', $product_id);
        $data['product'] = $this->db->get('product')->row_array();
        $delete_image = $data['product']['image'];
        unlink(FCPATH . 'image/product/' . $delete_image);
        $this->db->where('id', $product_id);
        $this->db->delete('product');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Product hasn been deleted</div>');
        redirect('admin/product');
    }

    public function platform()
    {
        $data['tittle'] = "Platform";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Product_model');
        $data['platform'] = $this->Product_model->getPlatform();


        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/platform', $data);
        $this->load->view('admin/footer');
    }

    public function platformAdd()
    {
        $data['tittle'] = "Add Platform";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->get('product')->result_array();

        $this->form_validation->set_rules('platform', 'Platform', 'required|trim');
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim');
        $this->form_validation->set_rules('model', 'Model', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/platformAdd', $data);
            $this->load->view('admin/footer');
        } else {

            $upload_image = $_FILES['image']['name'];
            $new_image = "default.png";
            if ($upload_image) {
                $config['upload_path']          = './image/platform/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Platform hasn not been added</div>');
                }
            }
            $this->db->set('image', $new_image);
            $this->db->set('platform', $this->input->post('platform'), true);
            $this->db->set('product_id', $this->input->post('product_id'), true);
            $this->db->set('model', $this->input->post('model'), true);
            $this->db->insert('product_platform');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Platform added</div>');
            redirect('admin/product/platform');
        }
    }

    public function platformEdit($platform_id)
    {
        $data['tittle'] = "Edit Platform";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->db->where('id =', $platform_id);
        $data['platform'] = $this->db->get('product_platform')->row_array();
        $data['product'] = $this->db->get('product')->result_array();

        $this->form_validation->set_rules('platform', 'Platform', 'required|trim');
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim');
        $this->form_validation->set_rules('model', 'Model', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/platformEdit', $data);
            $this->load->view('admin/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path']          = './image/platform/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['platform']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'image/platform/' . $old_image);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Platform has been updated</div>');
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Platform hasn not been change</div>');
                }
            }

            $this->db->set('product_id', $this->input->post('product_id'), true);
            $this->db->set('platform', $this->input->post('platform'), true);
            $this->db->set('model', $this->input->post('model'), true);
            $this->db->where('id', $platform_id);
            $this->db->update('product_platform');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Platform change</div>');
            redirect('admin/product/platform');
        }
    }

    public function platformDelete($platform_id)
    {
        $this->db->where('id =', $platform_id);
        $data['platform'] = $this->db->get('product_plarform')->row_array();
        $delete_image = $data['platform']['image'];
        unlink(FCPATH . 'image/platform/' . $delete_image);
        $this->db->where('id', $platform_id);
        $this->db->delete('product_platform');
        // DELETE FROM `product_platform` WHERE `product_platform`.`id` = 9
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Platform hasn been deleted</div>');
        redirect('admin/product/platform');
    }



    public function aksesorisAdd()
    {
        $data['tittle'] = "Add Aksesoris";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['product'] = $this->db->get('product')->result_array();
        $data['platform'] = $this->db->get('product_platform')->result_array();

        $this->form_validation->set_rules('id_aksesoris', 'Id Barang', 'required|trim|is_unique[product_accessories.id_aksesoris]');
        $this->form_validation->set_rules('nama_aksesoris', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim');
        $this->form_validation->set_rules('platform_id', 'Platform', 'required|trim');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/aksesorisAdd', $data);
            $this->load->view('admin/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path']          = './image/barang/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Barang tidak ditambahkan</div>');
                }
            }


            $this->db->set('id_aksesoris', $this->input->post('id_aksesoris'), true);
            $this->db->set('nama_aksesoris', $this->input->post('nama_aksesoris'), true);
            $this->db->set('id_product', $this->input->post('product_id'), true);
            $this->db->set('id_platform', $this->input->post('platform_id'), true);
            $this->db->set('harga_beli', $this->input->post('harga_beli'), true);
            $this->db->set('harga_jual', $this->input->post('harga_jual'), true);
            $this->db->set('stok_aksesoris', $this->input->post('stok'), true);
            $this->db->insert('product_accessories');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Stuff added</div>');
            redirect('admin/product/aksesoris');
        }
    }

    public function aksesorisEdit($id_aksesoris)
    {
        $data['tittle'] = "Add Aksesoris";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Product_model');
        $data['aksesoris'] = $this->Product_model->getAksesorisById($id_aksesoris);
        $data['product'] = $this->db->get('product')->result_array();
        $data['platform'] = $this->db->get('product_platform')->result_array();

        $this->form_validation->set_rules('nama_aksesoris', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('product_id', 'Product', 'required|trim');
        $this->form_validation->set_rules('platform_id', 'Platform', 'required|trim');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/aksesorisEdit', $data);
            $this->load->view('admin/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path']          = './image/barang/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Barang tidak ditambahkan</div>');
                }
            }


            $this->db->set('id_aksesoris', $this->input->post('id_aksesoris'), true);
            $this->db->set('nama_aksesoris', $this->input->post('nama_aksesoris'), true);
            $this->db->set('id_product', $this->input->post('product_id'), true);
            $this->db->set('id_platform', $this->input->post('platform_id'), true);
            $this->db->set('harga_beli', $this->input->post('harga_beli'), true);
            $this->db->set('harga_jual', $this->input->post('harga_jual'), true);
            $this->db->where('id_aksesoris', $id_aksesoris);
            $this->db->update('product_accessories');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Stuff added</div>');
            redirect('admin/product/aksesoris');
        }
    }

    public function aksesorisDelete($id_aksesoris)
    {
        $this->db->where('id_aksesoris =', $id_aksesoris);
        $data['aksesoris'] = $this->db->get('product_accessories')->row_array();
        $delete_image = $data['aksesoris']['foto'];
        unlink(FCPATH . 'image/barang/' . $delete_image);
        $this->db->where('id_aksesoris', $id_aksesoris);
        $this->db->delete('product_accessories');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Aksesoris hasn been deleted</div>');
        redirect('admin/product/aksesoris');
    }

    public function aksesorisAddStock()
    {
    }
}
