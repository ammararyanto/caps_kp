<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model

{
    public function getUser()
    {
        $query = "SELECT user.name, user.id, user.role_id, user.email,`user_role`.`role`
        FROM `user` JOIN `user_role`
        WHERE `user`.`role_id` = `user_role`.`id` && `user`.`role_id` != 3 
        ";

        return $this->db->query($query)->result_array();
    }

    public function getUserLogin($email_user)
    {
        $this->db->select('id, name, role_id, image');
        $this->db->from('user');
        $this->db->where('email', $email_user);

        return $this->db->get()->row_array();
    }
}
