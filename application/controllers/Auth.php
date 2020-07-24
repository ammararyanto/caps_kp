<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {

        if ($this->session->userdata('role_id') == 1) {
            redirect('admin/admin');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect('admin/admin/user');
        } else if ($this->session->userdata('role_id') == 3) {
            redirect('home');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = "Log-in";
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            //validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/user');
                    } else if ($user['role_id'] == 3) {
                        redirect('home');
                    } else {
                        redirect('admin/user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This email has not been activated.</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email not registered</div>');
            redirect('auth/login');
        }
    }

    public function register()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin/super_admin');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect('admin/admin');
        } else if ($this->session->userdata('role_id') == 3) {
            redirect('home');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'   =>  'Password dont matches',
            'min_length' =>  'Password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['tittle'] = "Register";
            $this->load->view('auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
        } else {
            $email  = $this->input->post('email', true);
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($email),
                'image'         => 'default.png',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 3,
                'is_active'     => 1,
                'date_created'     => time()
            ];

            // token 

            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];

            $this->db->insert('user', $data);
            // $this->db->insert('user_token', $user_token);


            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation your account has been created, Please activate your account </div>');

            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You has been logged out</div>');

        redirect('auth/login');
    }

    public function blocked()
    {
        $data['tittle'] = "Don't Have Permission";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/blocked', $data);
        $this->load->view('admin/footer');
    }
}
