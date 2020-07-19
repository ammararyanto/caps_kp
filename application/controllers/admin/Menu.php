<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_log_in();
    }

    public function index()
    {
        $data['tittle'] = "Menu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('icons', 'Icons', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/menu', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu'),
                'icons' => $this->input->post('icons')
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu added</div>');

            redirect('admin/menu');
        }
    }

    public function edit($menu_id)
    {
        $data['tittle'] = "Menu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->db->where('id =', $menu_id);
        $data['menu'] = $this->db->get('user_menu')->row_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('icons', 'Icons', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/menuEdit', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu'),
                'icons' => $this->input->post('icons')
            ];
            $this->db->where('id =', $menu_id);
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu has been edited </div>');

            redirect('admin/menu');
        }
    }

    public function delete($menu_id)
    {

        $this->db->where('menu_id =', $menu_id);
        $this->db->delete('user_sub_menu');
        $this->db->where('id =', $menu_id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu has been deleted</div>');
        redirect('admin/menu');
    }

    public function submenu()
    {
        $data['tittle'] = "Submenu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('tittle', 'Tittle', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/menuSubmenu', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'tittle' => $this->input->post('tittle'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu added</div>');

            redirect('admin/menu/submenu');
        }
    }

    public function editSubmenu($submenu_id)
    {
        $data['tittle'] = "Submenu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $this->db->where('id =', $submenu_id);
        $data['subMenu'] = $this->db->get('user_sub_menu')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('tittle', 'Tittle', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/menuSubmenuEdit', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'tittle' => $this->input->post('tittle'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->where('id =', $submenu_id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Submenu has been edited </div>');

            redirect('admin/menu/submenu');
        }
    }

    public function deleteSubmenu($submenu_id)
    {
        $this->db->where('id =', $submenu_id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu has been deleted</div>');
        redirect('admin/menu/submenu');
    }
}
