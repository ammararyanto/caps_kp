<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();

        $this->load->model('Stok_model');
    }

    public function stok()
    {
        $data['tittle'] = "Stok";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Stok_model');
        $data['stok'] = $this->Stok_model->getStokAll();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/stok', $data);
        $this->load->view('admin/footer');
    }

    public function addNewStuff()
    {
        $data['tittle'] = "Input Stok";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['tipe_penjualan'] = $this->db->get('tipe_penjualan')->result_array();

        $this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim|is_unique[stok.id_barang]');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('tipe_penjualan', 'Tipe Penjualan', 'required|trim');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/stokAddNewStuff', $data);
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


            $this->db->set('id_barang', $this->input->post('id_barang'), true);
            $this->db->set('nama_barang', $this->input->post('nama_barang'), true);
            $this->db->set('id_tipepenjualan', $this->input->post('tipe_penjualan'), true);
            $this->db->set('harga_beli', $this->input->post('harga_beli'), true);
            $this->db->set('harga_jual', $this->input->post('harga_jual'), true);
            $this->db->set('stok_barang', $this->input->post('stok'), true);
            $this->db->insert('stok');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Barang Ditambahkan</div>');
            redirect('admin/gudang/stok');
        }
    }

    public function stuffEdit($id_barang)
    {
        $data['tittle'] = "Edit Stuff";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Stok_model');
        $data['stok'] = $this->Stok_model->getStokByID($id_barang);
        $data['tipe_penjualan'] = $this->db->get('tipe_penjualan')->result_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('tipe_penjualan', 'Tipe Penjualan', 'required|trim');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/stokEditStuff', $data);
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


            $this->db->set('nama_barang', $this->input->post('nama_barang'), true);
            $this->db->set('id_tipepenjualan', $this->input->post('tipe_penjualan'), true);
            $this->db->set('harga_beli', $this->input->post('harga_beli'), true);
            $this->db->set('harga_jual', $this->input->post('harga_jual'), true);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('stok');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Barang telah dirubah</div>');
            redirect('admin/gudang/stok');
        }
    }

    public function addStock($id_barang)
    {
        $data['tittle'] = "Tambah Stok";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Stok_model');
        $data['stok'] = $this->Stok_model->getStokByID($id_barang);

        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/stokAddStok', $data);
            $this->load->view('admin/footer');
        } else {
            $old_stok = $data['stok']['stok_barang'];
            $add_stok =  $this->input->post('stok', true);
            $update_stok = $old_stok + $add_stok;

            $this->db->set('stok_barang', $update_stok);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('stok');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Stok telah ditambahkan</div>');
            redirect('admin/gudang/stok');
        }
    }

    public function product()
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
            $new_image = "default.png";
            if ($upload_image) {
                $config['upload_path']          = './image/product/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            product hasn not been added</div>');
                }
            }

            $this->db->set('image', $new_image);
            $this->db->set('product', $this->input->post('product'), true);
            $this->db->insert('product');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Produc added</div>');
            redirect('admin/gudang/product');
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



            redirect('admin/gudang/product');
        }
    }

    public function checklist($produk_id)
    {
        $data['tittle'] = "Checklist Product";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Gudang_model');
        $data['produk'] = $this->Gudang_model->getProductById($produk_id);
        $data['checklist'] = $this->Gudang_model->getChecklist($produk_id);

        $this->form_validation->set_rules('nama_check', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/productChecklist', $data);
            $this->load->view('admin/footer');
        } else {
            $datainput = [
                "id"            => '',
                "id_product"    => $produk_id,
                "nama_checklist"    => $this->input->post('nama_check')
            ];

            $this->Gudang_model->inputChecklist($datainput);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Checklist ditambahkan</div>');
            redirect('admin/gudang/checklist/' . $produk_id);
        }
    }

    public function delete($product_id)
    {
        $this->db->where('id =', $product_id);
        $data['product'] = $this->db->get('product')->row_array();
        if ($data['product']['image'] != 'default.png') {
            $delete_image = $data['product']['image'];
            unlink(FCPATH . 'image/product/' . $delete_image);
        }
        $this->db->where('id', $product_id);
        $this->db->delete('product');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Product hasn been deleted</div>');
        redirect('admin/gudang/product');
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
            redirect('admin/gudang/platform');
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
            redirect('admin/gudang/platform');
        }
    }

    public function platformDelete($platform_id)
    {
        $this->db->where('id =', $platform_id);
        $data['platform'] = $this->db->get('product_platform')->row_array();
        if ($data['platform']['image'] != 'default.png') {
            $delete_image = $data['platform']['image'];
            unlink(FCPATH . 'image/platform/' . $delete_image);
        }

        $this->db->from('product_platform');
        $this->db->where('id', $platform_id);
        $this->db->delete();
        // DELETE FROM `product_platform` WHERE `product_platform`.`id` = 9
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Platform hasn been deleted</div>');
        redirect('admin/gudang/platform');
    }

    public function reportAksesoris()
    {
        $stokAksesoris = $this->Stok_model->getStokTipe(2);

        $spreadsheet = new Spreadsheet;
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Barang')
            ->setCellValue('C1', 'Nama Barang')
            ->setCellValue('D1', 'Stok');
        $kolom = 2;
        $nomor = 1;
        foreach ($stokAksesoris as $STACC) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $STACC['id_barang'])
                ->setCellValue('C' . $kolom, $STACC['nama_barang'])
                ->setCellValue('D' . $kolom, $STACC['stok_barang']);

            $nomor++;
            $kolom++;
        }
        $writer = new Xlsx($spreadsheet);
        $today = date('d-m-Y', time());
        header('Conten-Type:application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Stok ACC ' . $today . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function reportSparepart()
    {
        $stokAksesoris = $this->Stok_model->getStokTipe(1);

        $spreadsheet = new Spreadsheet;
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Barang')
            ->setCellValue('C1', 'Nama Barang')
            ->setCellValue('D1', 'Stok');
        $kolom = 2;
        $nomor = 1;
        foreach ($stokAksesoris as $STACC) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $STACC['id_barang'])
                ->setCellValue('C' . $kolom, $STACC['nama_barang'])
                ->setCellValue('D' . $kolom, $STACC['stok_barang']);

            $nomor++;
            $kolom++;
        }
        $writer = new Xlsx($spreadsheet);

        $today = date('d-m-Y', time());
        header('Conten-Type:application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Stok Sparepart' . $today . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
