<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
    }

    public function index()
    {
        $data['tittle'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    public function role()
    {
        $this->form_validation->set_rules('role', 'role', 'required|trim|is_unique[user_role.role]');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = "Management Role";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->db->get('user_role')->result_array();

            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'role'          => htmlspecialchars($this->input->post('role', true))
            ];

            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil menambahkan Role baru</div>');

            redirect('admin/admin/role');
        }
    }

    public function roleaccess($role_id)
    {
        $data['tittle'] = "Role";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('admin/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $change = $this->db->get_where('user_access_menu', $data);

        if ($change->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akses berhasil diubah</div>');
    }

    public function roleChange($role_id)
    {
        $this->form_validation->set_rules('role', 'role', 'required|trim|is_unique[user_role.role]');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = "Role";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/roleChange', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'role'          => htmlspecialchars($this->input->post('role', true))
            ];

            $this->db->where('id=', $role_id);
            $this->db->update('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Nama role berhasil diubah</div>');

            redirect('admin/admin/role');
        }
    }

    public function roleDelete($role_id)
    {
        $this->db->where('id=', $role_id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Role Berhasil Dihapus</div>');

        redirect('admin/admin/role');
    }

    public function userLevel()
    {
        $data['tittle'] = "Management User";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->db->where('role_id !=', 3);
        $this->load->model('Admin_model');
        $data['userLevel'] = $this->Admin_model->getUser();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/userLevel', $data);
        $this->load->view('admin/footer');
    }

    public function userLevelChange($id)
    {
        $this->form_validation->set_rules('role', 'role', 'required|trim|is_unique[user_role.role]');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = "User Level";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->db->where('id=', $id);
            $data['userLevel'] = $this->db->get('user')->row_array();
            $this->db->where('id !=', 3);
            $data['role'] = $this->db->get('user_role')->result_array();

            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/userLevelChange', $data);
            $this->load->view('admin/footer');
        } else {
            $data = [
                'role_id' => $this->input->post('role', true)
            ];
            $this->db->where('id=', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data User berhasil diubah</div>');

            redirect('admin/admin/userLevel');
        }
    }

    public function userLevelDelete($user_id)
    {
        $this->db->where('id =', $user_id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data User berhasil dihapus</div>');
        redirect('admin/admin/userLevel');
    }

    public function addUser()
    {
        $data['tittle'] = "Tambah User Baru";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('id !=', 3);
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'   =>  'Passsword tidak sama',
            'min_length' =>  'Password terlalu pendek(minmal 3 karakter) '
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]', [
            'matches'   =>  'Passsword tidak sama',
            'min_length' =>  'Password terlalu pendek(minmal 3 karakter) '
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/userAddEmployee', $data);
            $this->load->view('admin/footer');
        } else {
            $email  = $this->input->post('email', true);
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($email),
                'image'         => 'default.png',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => $this->input->post('role'),
                'is_active'     => 1,
                'date_created'  => time()
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil menambahkan user baru</div>');

            redirect('admin/admin/userLevel');
        }
    }
}
